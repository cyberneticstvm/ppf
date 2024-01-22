<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Logo;
use App\Models\Official;
use App\Models\Profession;
use App\Models\Qualification;
use App\Models\Region;
use App\Models\Slider;
use App\Models\Specialization;
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
            'logo' => 'sometimes|required|mimes:jpg,jpeg,png,webp|max:1024',
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

    public function iindex()
    {
        $industries = Specialization::all();
        return view('admin.misc.industry.index', compact('industries'));
    }

    public function icreate()
    {
        return view('admin.misc.industry.create');
    }

    public function istore(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:specializations,name',
        ]);
        Specialization::insert([
            'name' => $request->name,
        ]);
        return redirect()->route('industry')->with("success", "Industry / Specialization created successfully!");
    }

    public function iedit(string $id)
    {
        $industry = Specialization::findOrFail(decrypt($id));
        return view('admin.misc.industry.edit', compact('industry'));
    }

    public function iupdate(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required|unique:specializations,name,' . $id,
        ]);
        Specialization::where('id', $id)->update(['name' => $request->name]);
        return redirect()->route('industry')->with("success", "Industry / Specialization updated successfully!");
    }

    public function idestroy(string $id)
    {
        Specialization::findOrFail(decrypt($id))->delete();
        return redirect()->route('industry')->with("success", "Industry / Specialization deleted successfully!");
    }

    public function pindex()
    {
        $profession = Profession::all();
        return view('admin.misc.profession.index', compact('profession'));
    }

    public function pcreate()
    {
        return view('admin.misc.profession.create');
    }

    public function pstore(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:professions,name',
        ]);
        Profession::insert([
            'name' => $request->name,
        ]);
        return redirect()->route('profession')->with("success", "Profession created successfully!");
    }

    public function pedit(string $id)
    {
        $profession = Profession::findOrFail(decrypt($id));
        return view('admin.misc.profession.edit', compact('profession'));
    }

    public function pupdate(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required|unique:professions,name,' . $id,
        ]);
        Profession::where('id', $id)->update(['name' => $request->name]);
        return redirect()->route('profession')->with("success", "Profession updated successfully!");
    }

    public function pdestroy(string $id)
    {
        Profession::findOrFail(decrypt($id))->delete();
        return redirect()->route('profession')->with("success", "Profession deleted successfully!");
    }

    public function qindex()
    {
        $qualifications = Qualification::all();
        return view('admin.misc.qualification.index', compact('qualifications'));
    }

    public function qcreate()
    {
        return view('admin.misc.qualification.create');
    }

    public function qstore(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:qualifications,name',
        ]);
        Qualification::insert([
            'name' => $request->name,
        ]);
        return redirect()->route('qualification')->with("success", "Qualification created successfully!");
    }

    public function qedit(string $id)
    {
        $qualification = Qualification::findOrFail(decrypt($id));
        return view('admin.misc.qualification.edit', compact('qualification'));
    }

    public function qupdate(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required|unique:qualifications,name,' . $id,
        ]);
        Qualification::where('id', $id)->update(['name' => $request->name]);
        return redirect()->route('qualification')->with("success", "Qualification updated successfully!");
    }

    public function qdestroy(string $id)
    {
        Qualification::findOrFail(decrypt($id))->delete();
        return redirect()->route('qualification')->with("success", "Qualification deleted successfully!");
    }

    public function region()
    {
        $regions = Region::withTrashed()->latest()->get();
        return view('admin.region.index', compact('regions'));
    }

    public function regionCreate()
    {
        return view('admin.region.create');
    }

    public function regionStore(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'panel' => 'required',
            'region' => 'required',
            'image' => 'sometimes|required|mimes:jpg,jpeg,png,webp|max:1024',
        ]);
        $input = $request->all();
        if ($request->file('image')) :
            $url = uploadFile($request->file('image'), $path = 'ppf-kuwait/website/region');
            $input['image'] = $url;
        endif;
        Region::create($input);
        return redirect()->route('region')->with("success", "Official saved successfully!");
    }

    public function regionEdit(string $id)
    {
        $region = Region::findOrFail(decrypt($id));
        return view('admin.region.edit', compact('region'));
    }

    public function regionUpdate(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'panel' => 'required',
            'region' => 'required',
            'image' => 'sometimes|required|mimes:jpg,jpeg,png,webp|max:1024',
        ]);
        $input = $request->all();
        if ($request->file('image')) :
            $url = uploadFile($request->file('image'), $path = 'ppf-kuwait/website/region');
            $input['image'] = $url;
        endif;
        Region::findOrFail($id)->update($input);
        return redirect()->route('region')->with("success", "Official updated successfully!");
    }

    public function regionDestroy(string $id)
    {
        Region::findOrFail(decrypt($id))->delete();
        return redirect()->route('region')->with("success", "Official deleted successfully!");
    }
}
