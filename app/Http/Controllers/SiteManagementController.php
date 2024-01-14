<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Logo;
use App\Models\Official;
use App\Models\Slider;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SiteManagementController extends Controller
{
    public function logo()
    {
        $logo = Logo::findOrFail(1);
        return view('admin.logo.index', compact('logo'));
    }

    public function logoUpdate(Request $request)
    {
        $this->validate($request, [
            'logo' => 'nullable|mimes:jpg,jpeg,png,webp|max:1024',
            'alt_text' => 'nullable',
            'mobile' => 'nullable',
            'email' => 'nullable|email',
        ]);
        $input = $request->all();
        $input['logo'] = logo()->logo;
        if ($request->file('logo')) :
            $url = uploadFile($request->file('logo'), $path = 'ppf-kuwait/website/logo');
            $input['logo'] = $url;
        endif;
        Logo::findOrFail(decrypt($request->logo_id))->update(['logo' => $input['logo'], 'alt_text' => $input['alt_text'], 'mobile' => $request->mobile, 'email' => $request->email, 'updated_at' => Carbon::now()]);
        return redirect()->route('logo')->with("success", "Logo and header updated successfully");
    }

    public function slider()
    {
        $sliders = Slider::withTrashed()->latest()->get();
        return view('admin.slider.index', compact('sliders'));
    }

    public function sliderCreate()
    {
        return view('admin.slider.create');
    }

    public function sliderStore(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|mimes:jpg,jpeg,png,webp|max:1024',
            'display_order' => 'required|numeric',
            'status' => 'required',
        ]);
        $input = $request->all();
        $url = uploadFile($request->file('image'), $path = 'ppf-kuwait/website/slider');
        $input['image'] = $url;
        Slider::create($input);
        return redirect()->route('slider')->with("success", "Salider image saved successfully!");
    }

    public function sliderEdit(string $id)
    {
        $slider = Slider::findOrFail(decrypt($id));
        return view('admin.slider.edit', compact('slider'));
    }

    public function sliderUpdate(Request $request, string $id)
    {
        $this->validate($request, [
            'image' => 'sometimes|required|mimes:jpg,jpeg,png,webp|max:1024',
            'display_order' => 'required|numeric',
            'status' => 'required',
        ]);
        $input = $request->all();
        if ($request->file('image')) :
            $url = uploadFile($request->file('image'), $path = 'ppf-kuwait/website/slider');
            $input['image'] = $url;
        endif;
        Slider::findOrFail($id)->update($input);
        return redirect()->route('slider')->with("success", "Slider image updated successfully!");
    }

    public function sliderDestroy(string $id)
    {
        Slider::findOrFail(decrypt($id))->update(['status' => 'draft']);
        Slider::findOrFail(decrypt($id))->delete();
        return redirect()->route('slider')->with("success", "Slider image deleted successfully!");
    }

    public function about()
    {
        $about = About::findOrFail(1);
        return view('admin.about.index', compact('about'));
    }

    public function aboutUpdate(Request $request)
    {
        $this->validate($request, [
            'description' => 'required',
            'mission' => 'required',
            'vision' => 'required',
        ]);
        $input = $request->all();
        About::findOrFail(decrypt($request->about_id))->update(['description' => $input['description'], 'mission' => $input['mission'], 'vision' => $input['vision'], 'updated_at' => Carbon::now()]);
        return redirect()->route('about')->with("success", "About Us updated successfully");
    }

    public function official()
    {
        $officials = Official::withTrashed()->latest()->get();
        return view('admin.official.index', compact('officials'));
    }

    public function officialCreate()
    {
        return view('admin.official.create');
    }

    public function officialStore(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'panel' => 'required',
            'contact_number' => 'required',
            'email' => 'nullable|email:rfs,dns',
            'image' => 'required|mimes:jpg,jpeg,png,webp|max:1024',
        ]);
        $input = $request->all();
        $url = uploadFile($request->file('image'), $path = 'ppf-kuwait/website/officials');
        $input['image'] = $url;
        Official::create($input);
        return redirect()->route('official')->with("success", "Official saved successfully!");
    }

    public function officialEdit(string $id)
    {
        $official = Official::findOrFail(decrypt($id));
        return view('admin.official.edit', compact('official'));
    }

    public function officialUpdate(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'panel' => 'required',
            'contact_number' => 'required',
            'email' => 'nullable|email:rfs,dns',
            'image' => 'sometimes|required|mimes:jpg,jpeg,png,webp|max:1024',
        ]);
        $input = $request->all();
        if ($request->file('image')) :
            $url = uploadFile($request->file('image'), $path = 'ppf-kuwait/website/officials');
            $input['image'] = $url;
        endif;
        Official::findOrFail($id)->update($input);
        return redirect()->route('official')->with("success", "Official updated successfully!");
    }

    public function officialDestroy(string $id)
    {
        Official::findOrFail(decrypt($id))->delete();
        return redirect()->route('official')->with("success", "Official deleted successfully!");
    }
}
