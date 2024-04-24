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
use Illuminate\Support\Facades\Mail;
use App\Mail\RegisterMail;
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
  

     public function store(RegisterRequest $request): RedirectResponse
     { 
        $data = $request->validated();

         
         if ($request->hasFile('avatar')) { 
            $data['avatar']  = $this->uploadFileAndGetFileName($request->file('avatar'), 'public/avatars');
         }
     
         if ($request->hasFile('resume')) {
            $data['resume'] = $this->uploadFileAndGetFileName($request->file('resume'), 'public/resumes');
            }
     
         if ($request->hasFile('cover_letter')) {
            $data['cover_letter'] = $this->uploadFileAndGetFileName($request->file('cover_letter'), 'public/cover_letters');
         }  
         $request->merge(['password' => Hash::make($request->input('password'))]);
         $user = User::create($data);

         event(new Registered($user));
         Auth::login($user);
         Mail::to(Auth::user()->email)->send(new RegisterMail($user));
     
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

    