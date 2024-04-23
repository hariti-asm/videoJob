<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Company;
use App\Models\Profile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Events\SummaryProcessed;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Events\SuccessCriteriaProcessed;
use App\Http\Requests\RegisterCompanyRequest;
use Smalot\PdfParser\Parser;


class EmployerRegisterController extends Controller
{
 

    public function employerRegister(RegisterCompanyRequest $request)
    {
        $user = User::create([
            'name' => $request->cname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'user_type' => $request->user_type,
        ]);
    
      
    
        $logoPath = null;
        if ($request->hasFile('logo')) {
            $logoPath = $this->uploadFileAndGetFileName($request->file('logo'), 'public/logos');
        }
    
        $bannerPath = null;
        if ($request->hasFile('banner')) {
            $bannerPath = $this->uploadFileAndGetFileName($request->file('banner'), 'public/banners');
        }
    
        $company = Company::create([
            'user_id' => $user->id,
            'cname' => $request->cname,
            'slug' => Str::slug($request->cname),
            'address' => $request->address,
            'phone' => $request->phone,
            'website' => $request->website,
            'logo' => $logoPath,
            'banner' => $bannerPath,
            'slogan' => $request->slogan,
            'description' => $request->description,
        ]);
    
        Auth::login($user);
    
        return redirect()->route('company.index', ['id' => $company->id, 'company' => $company])
            ->with('message', 'A verification link is sent to your email. Please follow the link to verify it.');
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
