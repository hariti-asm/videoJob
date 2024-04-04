<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
    public function userHome()
    {
        return view('home',["msg"=>"Hello! I am user"]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function editorHome()
    {
        return view('home',["msg"=>"Hello! I am editor"]);
    }

    
    public function index()
    {
        $adminRole = Auth::user()->roles()->pluck('name');
        if ($adminRole->contains('admin')) {
            return redirect()->to('/dashboard')->with('success', 'Admin Logged in Successfully.');
           
      
        }

        if (auth::user()->user_type=='employer') {
            return redirect()->to('/company/create');
        }


        $jobs = Auth::user()->favorites;
        return view('frontend.jobs.savedJobs', compact('jobs'));
    }  
    public function appliedJobs() {
        $user_id = Auth::user()->id;
    
        $jobs = Job::where('status', 1)
                    ->where('user_id', $user_id)
                    ->get();
        return view('frontend.jobs.appliedJobs', compact('jobs'));
    }
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {
        return view('home',["msg"=>"Hello! I am admin"]);
    }
}