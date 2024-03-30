<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\RegisterRequest;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Validation\Rule;

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
         
         if ($request->hasFile('avatar')) { 
             $fileNameToStoreAvatar = $this->uploadFileAndGetFileName($request->file('avatar'), 'public/avatars');
         }
     
         if ($request->hasFile('resume')) {
             $fileNameToStoreResume = $this->uploadFileAndGetFileName($request->file('resume'), 'public/resumes');
            }
     
         if ($request->hasFile('cover_letter')) {
             $fileNameToStoreCoverLetter = $this->uploadFileAndGetFileName($request->file('cover_letter'), 'public/cover_letters');
         }
     
         $user =  User::create([
             'name' => $request->input('name'),
             'email' => $request->input('email'),
             'password' => Hash::make($request->input('password')),
             'user_type' => $request->input('user_type'),
             'gender' => $request->input('gender'),
             'address' => $request->input('address'),
             'dob' => $request->input('dob'),
             'experience' => $request->input('experience'),
             'phone' => $request->input('phone'),
             'bio' => $request->input('bio'),
             'avatar' => $fileNameToStoreAvatar ?? null,
             'resume' => $fileNameToStoreResume ?? null,
             'cover_letter' => $fileNameToStoreCoverLetter ?? null,
             'status' => $request->input('status'),
         ]);
     
         event(new Registered($user));
     
         Auth::login($user);
     
         return redirect()->route('alljobs');
     }
     
     private function uploadFileAndGetFileName($file, $path)
     {
         $filenameWithExt = $file->getClientOriginalName();
         $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
         $extension = $file->getClientOriginalExtension();
         $fileNameToStore = $filename.'_'.time().'.'.$extension;
         $file->storeAs($path, $fileNameToStore);
         return $fileNameToStore;
     }
     
     

 }

    

