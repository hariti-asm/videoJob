<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class UserProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware(['seeker', 'verified']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('frontend.profile.index');
    }

 

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user_id = auth()->user()->id;

        $request->validate([
            'address' => 'required|min:20|max:255',
            'phone'=> 'required',
            'experience'=> 'required|integer',
            'bio'=> 'required|min:30|max:450',
        ]);


   User::where('id', $user_id)->update([
            'address'=> request('address'),
            'phone'=> request('phone'),
            'experience'=> request('experience'),
            'bio'=> request('bio'),
          
        ]);


        return redirect()->back()->with('success', 'Profile Info Successfully Updated.');
    }

    public function coverletter(Request $request){
        $user_id = auth()->user()->id;

        $request->validate([
            'cover_letter'=>'required|mimes:pdf|max:1024',
        ]);

        try{

            // Retrieve the old Cv filename
            $oldCv = User::where('user_id', $user_id)->value('cover_letter');
    
            // Delete the old Cv file
            if ($oldCv) {
                Storage::delete($oldCv);
            }



            $cover = $request->file('cover_letter')->store('public/files');
       User::where('id', $user_id)->update([ 
                'cover_letter'=>$cover
            ]);
    
            return redirect()->back()->with('success', 'Cover Letter Successfully Updated.');
        }catch(\Exception $e){
            return redirect()->back()->with('errors','Something goes wrong while uploading file!');
        }



    }
    public function resume(Request $request){
        $user_id = auth()->user()->id;
        
        $request->validate([
            'resume'=>'required|mimes:pdf|max:1024',
        ]);

        try{

            // Retrieve the old resume filename
            $oldResume = User::where('user_id', $user_id)->value('resume');
    
            // Delete the old resume file
            if ($oldResume) {
                Storage::delete($oldResume);
            }


            $resume = $request->file('resume')->store('public/files');
            User::where('user_id', $user_id)->update([ 
                'resume'=>$resume
            ]);
    
            return redirect()->back()->with('success', 'Resume Successfully Updated.');
        }catch(\Exception $e){
            return redirect()->back()->with('errors','Something goes wrong while uploading file!');
        }




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
            $oldAvatar = User::where('user_id', $user_id)->value('avatar');
      

            // Delete the old avatar file
            if(is_file(public_path('uploads/avatar/' . $oldAvatar))){
                unlink(public_path('uploads/avatar/' . $oldAvatar));
                
            }
    
            $file->move('uploads/avatar/', $filename);
    
            User::where('user_id', $user_id)->update([
                'avatar' => $filename
            ]);
    
            return redirect()->back()->with('success', 'Avatar updated...');
        }
    }


}
