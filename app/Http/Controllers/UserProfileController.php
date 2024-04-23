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
        $this->middleware(['seeker']);
        // , 'verified'
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
            'bio'=> 'required|min:20|max:450',
        ]);


   User::where('id', $user_id)->update([
            'address'=> request('address'),
            'phone'=> request('phone'),
            'experience'=> request('experience'),
            'bio'=> request('bio'),
          
        ]);


        return redirect()->back()->with('success', 'Profile Info Successfully Updated.');
    }

    public function coverletter(Request $request)
    {
        $user_id = auth()->user()->id;
    
        $request->validate([
            'cover_letter' => 'required|mimes:pdf|max:1024',
        ]);
    
        try {
            $oldCoverLetter = User::where('id', $user_id)->value('cover_letter');
    
            if ($oldCoverLetter) {
                Storage::delete($oldCoverLetter);
            }
    
            $coverLetterFileName = $this->uploadFileAndGetFileName($request->file('cover_letter'), 'public/files');
    
            User::where('id', $user_id)->update([
                'cover_letter' => $coverLetterFileName
            ]);
    
            return redirect()->back()->with('success', 'Cover Letter Successfully Updated.');
        } catch (\Exception $e) {
            return redirect()->back()->with('errors', 'Something goes wrong while uploading file!');
        }
    }
    
    public function resume(Request $request)
    {
        $user_id = auth()->user()->id;
    
        $request->validate([
            'resume' => 'required|mimes:pdf|max:1024',
        ]);
    
        try {
            $oldResume = User::where('id', $user_id)->value('resume');
    
            if ($oldResume) {
                Storage::delete($oldResume);
            }
    
            $resumeFileName = $this->uploadFileAndGetFileName($request->file('resume'), 'public/files');
    
            User::where('id', $user_id)->update([
                'resume' => $resumeFileName
            ]);
    
            return redirect()->back()->with('success', 'Resume Successfully Updated.');
        } catch (\Exception $e) {
            return redirect()->back()->with('errors', 'Something goes wrong while uploading file!');
        }
    }
    
    public function avatar(Request $request)
    {
        $user_id = auth()->user()->id;
    
        $request->validate([
            'avatar' => 'required|mimes:jpeg,jpg,png|max:1024',
        ]);
    
        if ($request->hasFile('avatar')) {
            $fileNameToStoreAvatar = $this->uploadFileAndGetFileName($request->file('avatar'), 'public/avatars');
    
            $oldAvatar = User::where('id', $user_id)->value('avatar');
    
            if(is_file(storage_path('avatars/' . $oldAvatar))){
                unlink(storage_path('avatars/' . $oldAvatar));
            }
                User::where('id', $user_id)->update([
                'avatar' => $fileNameToStoreAvatar
            ]);
    
            return redirect()->back()->with('success', 'Avatar updated...');
        }
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
