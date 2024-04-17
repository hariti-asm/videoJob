<?php

namespace App\Http\Controllers;

use App\Mail\SendJob;
use Illuminate\Http\Request;
use App\Mail\AcceptedCondidate;
use App\Mail\RejectedCondidate;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function send(Request $request){

        $this->validate($request, [
            'your_name' => 'required|string',
            'your_email' => 'required|email',
            'friend_name' => 'required|string',
            'friend_email' => 'required|email',
          
        ]);


        $homeUrl = url('/');

        $jobId = $request->get('job_id');
        $jobSlug = $request->get('job_slug');
        $jobUrl = $homeUrl.'/'.'job/'.$jobId.'/'.$jobSlug;

        $data = array(
            'your_name'=>$request->get('your_name'),
            'your_email'=>$request->get('your_email'),
            'friend_name'=>$request->get('friend_name'),
            'title'=>$request->get('title'),
            'cname'=>$request->get('cname'),
            'position'=>$request->get('position'),
            'jobUrl'=>$jobUrl
           
        );

        $emailTo = $request->get('friend_email');

        try{
    
            Mail::to($emailTo)->send(new SendJob($data));
            return redirect()->back()->with('jobmsg', 'Job sent Successfully!');

        }catch(\Exception $e){
            return redirect()->back()->with('error_msg', 'Something went wrong. Please try again later.');
        }
    }
    


    public function confirm(Request $request){
      
        $data = array(
            'your_name' => $request->get('name'),
            'your_email' => $request->get('email'),
            'job' => $request->get('job'),
        );
        
        $emailTo = $request->get('email');
        
           Mail::to($emailTo)->send(new AcceptedCondidate($data));
            return redirect()->back()->with('jobmsg', 'Job sent Successfully!');
        } 
    
        public function reject(Request $request){
      
            $data = array(
                'your_name' => $request->get('name'),
                'your_email' => $request->get('email'),
                'job' => $request->get('job'),
            );
            
            $emailTo = $request->get('email');
            
               Mail::to($emailTo)->send(new RejectedCondidate($data));
                return redirect()->back()->with('jobmsg', 'Job sent Successfully!');
            } 
    
}
