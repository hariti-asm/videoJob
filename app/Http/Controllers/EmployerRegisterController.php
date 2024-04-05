<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Company;
use App\Models\Profile;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterCompanyRequest;


class EmployerRegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // use Illuminate\Support\Facades\Route;


public function employerRegister(RegisterCompanyRequest $request)
{
    // Create a new user
    $user = User::create([
         'name'=> $request->cname,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'user_type' => $request->user_type,
    ]);

    // Upload logo if provided
    $logoPath = null;
    if ($request->hasFile('logo')) {
        $logoPath = $request->file('logo')->store('public/logos');
    }

    // Upload banner if provided
    $bannerPath = null;
    if ($request->hasFile('banner')) {
        $bannerPath = $request->file('banner')->store('public/banners');
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
    
    


}
