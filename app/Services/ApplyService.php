<?php

namespace App\Services;

use App\Models\Job;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class ApplyService
{
    public function __construct()
    {

    }


    public function apply( Job $job){
        $jobId = Job::find($job->id);
        $jobId->users()->attach(Auth::user()->id);
    
        return redirect()->back()->with('message', 'Job applied Successfully.');
    }
}