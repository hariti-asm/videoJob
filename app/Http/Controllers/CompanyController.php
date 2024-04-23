<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CompanyRequest;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{

    public function __construct()
    {
        $this->middleware(['employer'], ['except'=> array('index', 'company')]);
    }


    /**
     * Display a listing of the resource.
     */
    public function index($id, Company $company)
    {   $jobs = Job::where('user_id', $id)->get();

        return view('frontend.company.index', compact('company'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('frontend.company.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CompanyRequest $request)
    {
        $user_id = auth()->user()->id;

        $request->validated();


        Company::where('user_id', $user_id)->update([
            'address'=> request('address'),
            'phone'=> request('phone'),
            'website'=> request('website'),
            'slogan'=> request('slogan'),
            'description'=> request('description'),
          
        ]);


        return redirect()->back()->with('success', 'Company Info Successfully Updated.');
    }

    public function logo(Request $request)
    {
        $user_id = auth()->user()->id;
    
        $request->validate([
            'logo' => 'required|mimes:jpeg,jpg,png|max:1024',
        ]);
    
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $fileName = $this->uploadFileAndGetFileName($file, 'public/logos');
    
            // Retrieve the old logo filename
            $oldLogo = Company::where('user_id', $user_id)->value('logo');
    
            // Delete the old logo file
            if (!is_null($oldLogo)) {
                Storage::delete('public/logos/' . $oldLogo);
            }
    
            // Update the user's logo
            Company::where('user_id', $user_id)->update([
                'logo' => $fileName
            ]);
    
            return redirect()->back()->with('logo', 'Logo updated...');
        }
    }
    public function banner(Request $request)
    {
        $user_id = auth()->user()->id;
    
        $request->validate([
            'banner' => 'required|mimes:jpeg,jpg,png|max:2048',
        ]);
    
        if ($request->hasFile('banner')) {
            $file = $request->file('banner');
            $fileName = $this->uploadFileAndGetFileName($file, 'public/banners');
    
            // Retrieve the old banner filename
            $oldBanner = Company::where('user_id', $user_id)->value('banner');
    
            // Delete the old banner file
            if (!is_null($oldBanner)) {
                Storage::delete('public/banners/' . $oldBanner);
            }
    
            // Update the user's banner
            Company::where('user_id', $user_id)->update([
                'banner' => $fileName
            ]);
    
            return redirect()->back()->with('banner', 'Banner updated...');
        }
    }
        
    /**
     * Compnay metod
     */
    public function company()
    {
        $companies = Company::latest()->paginate(12);
        return view('frontend.company.company', compact('companies'));
    }

    public function show(Company $company)
    {

                return view('frontend.company.index', compact('company'));
    }
    private function uploadFileAndGetFileName($file, $path)
{
    $filenameWithExt = $file->getClientOriginalName();
    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
    $extension = $file->getClientOriginalExtension();
    $fileNameToStore = $filename . '_' . time() . '.' . $extension;
    $file->storeAs($path, $fileNameToStore);
    return $fileNameToStore;
}
}
