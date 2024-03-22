<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('frontend.profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
    public function avatar(Request $request)
    {
        $user_id = auth()->user()->id;
    
        $request->validate([
            'avatar' => 'required|mimes:jpeg,jpg,png|max:1024',
        ]);
    
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
    
            // Retrieve the old avatar filename
            $oldAvatar = Profile::where('user_id', $user_id)->value('avatar');
      

            // Delete the old avatar file
            if(is_file(public_path('uploads/avatar/' . $oldAvatar))){
                unlink(public_path('uploads/avatar/' . $oldAvatar));
                
            }
    
            $file->move('uploads/avatar/', $filename);
    
            Profile::where('user_id', $user_id)->update([
                'avatar' => $filename
            ]);
    
            return redirect()->back()->with('success', 'Avatar updated...');
        }
    }
    public function resume(Request $request){
        $user_id = auth()->user()->id;
        
        $request->validate([
            'resume'=>'required|mimes:pdf|max:1024',
        ]);

        try{

            // Retrieve the old resume filename
            $oldResume = Profile::where('user_id', $user_id)->value('resume');
    
            // Delete the old resume file
            if ($oldResume) {
                Storage::delete($oldResume);
            }


            $resume = $request->file('resume')->store('public/files');
            Profile::where('user_id', $user_id)->update([ 
                'resume'=>$resume
            ]);
    
            return redirect()->back()->with('success', 'Resume Successfully Updated.');
        }catch(\Exception $e){
            return redirect()->back()->with('errors','Something goes wrong while uploading file!');
        }

    }
        public function coverletter(Request $request){
            $user_id = auth()->user()->id;
    
            $request->validate([
                'cover_letter'=>'required|mimes:pdf|max:1024',
            ]);
    
            try{
    
                // Retrieve the old Cv filename
                $oldCv = Profile::where('user_id', $user_id)->value('cover_letter');
        
                // Delete the old Cv file
                if ($oldCv) {
                    Storage::delete($oldCv);
                }
    
    
    
                $cover = $request->file('cover_letter')->store('public/files');
                Profile::where('user_id', $user_id)->update([ 
                    'cover_letter'=>$cover
                ]);
        
                return redirect()->back()->with('success', 'Cover Letter Successfully Updated.');
            }catch(\Exception $e){
                return redirect()->back()->with('errors','Something goes wrong while uploading file!');
            }
    
    
    
        }

    
    public function store(Request $request)
    {
        $user_id = auth()->user()->id;

        $request->validate([
            'address' => 'required|min:20|max:255',
            'phone'=> 'required|digits:11',
            'experience'=> 'required|min:10|max:255',
            'bio'=> 'required|min:30|max:450',
        ]);


        Profile::where('user_id', $user_id)->update([
            'address'=> request('address'),
            'phone'=> request('phone'),
            'experience'=> request('experience'),
            'bio'=> request('bio'),
          
        ]);


        return redirect()->back()->with('success', 'Profile Info Successfully Updated.');
    }
    public function index()
    {
        return view('frontend.profile.index');
    }
}
