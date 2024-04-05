<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
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
    
   

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
 
    
 
     
     public function index(): Renderable|RedirectResponse
     {
         $adminRole = Auth::user()->roles()->pluck('name');
         if ($adminRole->contains('admin')) {
             return redirect()->route('dashboard')->with('success', 'Admin Logged in Successfully.');
         }
         
         if (Auth::user()->user_type == 'employer') {
             return redirect()->route('company.create');
         }
     
         $jobs = Auth::user()->favorites;
         return view('frontend.jobs.savedJobs', compact('jobs'));
     }
     
      
    public function appliedJobs() {
        $jobs = Auth::user()->applications;
            return view('frontend.jobs.appliedJobs', compact('jobs'));
    }
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
   
}