<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Video;
use Illuminate\View\View;
use App\Mail\RegisterMail;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\RegisterRequest;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\ProfileUpdateRequest;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
  

     public function store(Request $request): RedirectResponse
     { 
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique(User::class)->ignore(auth()->id())],
            'address' => ['required', 'string'],
            'job' => ['required', 'string'],

            'gender' => ['required', 'string', Rule::in(['male', 'female'])],
            'dob' => ['required', 'date'],
            'experience' => ['required', 'string'],
            'phone' => ['required', 'string'],
            'bio' => ['required', 'string'],
            'status' => ['required'],
            'cover_letter' => ['required'],
            'resume' => ['required'],
            'avatar' => ['required'],
        ]);
         
        $fileNameToStoreAvatar = null;
        $resumeName = null;
        $fileNameToStoreCoverLetter = null;
    
        if ($request->hasFile('avatar')) { 
            $avatar = $request->file('avatar');
            $fileNameToStoreAvatar = time() . '_' . $avatar->getClientOriginalName();
            $avatar->storeAs('public/avatars', $fileNameToStoreAvatar);
        }
    
        if ($request->hasFile('resume')) {
            $resume = $request->file('resume');
            $resumeName = time() . '_' . $resume->getClientOriginalName();
            $resume->storeAs('public/resumes', $resumeName);
        }
    
        if ($request->hasFile('cover_letter')) {
            $coverLetter = $request->file('cover_letter');
            $fileNameToStoreCoverLetter = time() . '_' . $coverLetter->getClientOriginalName();
            $coverLetter->storeAs('public/cover_letters', $fileNameToStoreCoverLetter);
        }
         $user =  User::create([
             'name' => $request->input('name'),
             'email' => $request->input('email'),
             'password' => Hash::make($request->input('password')),
             'user_type' => $request->input('user_type'),
             'gender' => $request->input('gender'),
             'address' => $request->input('address'),
             'job' => $request->input('job'),
             'dob' => $request->input('dob'),
             'experience' => $request->input('experience'),
             'phone' => $request->input('phone'),
             'bio' => $request->input('bio'),
             'avatar' => $fileNameToStoreAvatar,
             'resume' => 'public/resumes/asmaa hariti.pdf',
             'cover_letter' => $fileNameToStoreCoverLetter,
             'status' => $request->input('status'),
         ]);
         
         event(new Registered($user));
         Auth::login($user);
         Mail::to(Auth::user()->email)->send(new RegisterMail($user));
     
         return redirect()->route('alljobs');
     }
     
     private function uploadFileAndGetFileName($file, $path)
     {
         if ($file) {
             $filenameWithExt = $file->getClientOriginalName();
             $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
             $extension = $file->getClientOriginalExtension();
             $fileNameToStore = $filename.'_'.time().'.'.$extension;
             $file->storeAs($path, $fileNameToStore);
             return $fileNameToStore;
         }
     }
     
     

 }

    

