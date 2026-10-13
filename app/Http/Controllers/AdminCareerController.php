<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveCareerRequest;
use App\Models\Career;
use App\Services\CareerDescription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RuntimeException;
use Throwable;

class AdminCareerController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            abort_unless($request->user()?->type === 'admin', 403);

            return $next($request);
        });
    }

    public function index(Request $request)
    {
        $filters = $request->validate(['search' => 'nullable|string|max:255', 'status' => 'nullable|in:published,draft']);
        $careers = Career::query()
            ->when($filters['search'] ?? null, fn ($query, $search) => $query->where('title', 'like', '%'.$search.'%'))
            ->when($filters['status'] ?? null, fn ($query, $status) => $query->where('status', $status))
            ->latest()->get();

        return view('admin.careers.index', compact('careers'));
    }

    public function create()
    {
        return view('admin.careers.form', ['career' => new Career]);
    }

    public function edit(Career $career)
    {
        return view('admin.careers.form', compact('career'));
    }

    public function poster(Career $career)
    {
        abort_unless($career->poster_path && Storage::disk('public')->exists($career->poster_path), 404);

        return Storage::disk('public')->response($career->poster_path, null, ['X-Content-Type-Options' => 'nosniff']);
    }

    public function store(SaveCareerRequest $request)
    {
        $this->save($request, new Career);

        return redirect()->route('admin.careers.index')->with('success', 'Career post saved successfully. Published posts are now available on the Careers page.');
    }

    public function update(SaveCareerRequest $request, Career $career)
    {
        $this->save($request, $career);

        return redirect()->route('admin.careers.index')->with('success', 'Career post updated successfully.');
    }

    private function save(SaveCareerRequest $request, Career $career): void
    {
        $data = $request->safe()->except(['poster', 'remove_poster']);
        $data['description'] = app(CareerDescription::class)->clean($data['description'] ?? '');
        $data['updated_by'] = $request->user()->id;
        if (! $career->exists) {
            $data['created_by'] = $request->user()->id;
        }
        $oldPoster = $career->poster_path;
        $newPoster = null;
        if ($request->hasFile('poster')) {
            $newPoster = $request->file('poster')->store('careers/posters', 'public');
            if (! $newPoster) {
                throw new RuntimeException('The job poster could not be saved.');
            }
            $data['poster_path'] = $newPoster;
        } elseif ($request->boolean('remove_poster')) {
            $data['poster_path'] = null;
        }
        try {
            $career->fill($data)->save();
        } catch (Throwable $exception) {
            if ($newPoster) {
                Storage::disk('public')->delete($newPoster);
            }
            throw $exception;
        }
        if ($oldPoster && ($newPoster || $request->boolean('remove_poster'))) {
            Storage::disk('public')->delete($oldPoster);
        }
    }

    public function destroy(Career $career)
    {
        $career->delete();

        return redirect()->route('admin.careers.index')->with('success', 'Career post removed.');
    }
}
