<?php

namespace App\Http\Controllers;

use App\Models\Career;
use Illuminate\Support\Facades\Storage;

class CareerController extends Controller
{
    public function index()
    {
        return view('careers.index', ['title' => 'Careers - PPF Kuwait', 'careers' => Career::published()->latest()->paginate(12)]);
    }

    public function show(string $id)
    {
        $career = Career::published()->find($id);
        abort_unless($career, 404);

        return view('careers.show', ['title' => $career->title.' - Careers - PPF Kuwait', 'career' => $career]);
    }

    public function poster(string $id)
    {
        $career = Career::published()->find($id);
        abort_unless($career && $career->poster_path && Storage::disk('public')->exists($career->poster_path), 404);

        return Storage::disk('public')->response($career->poster_path, null, ['X-Content-Type-Options' => 'nosniff']);
    }
}
