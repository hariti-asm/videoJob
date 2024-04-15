<?php

namespace App\Http\Controllers;

use App\Models\rc;
use App\Models\Video; 
use App\Models\Job; 

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Events\ApplyProcessed;
use App\Events\UploadProcessed;
use App\Events\SummaryProcessed;
use App\Events\SuccessCriteriaProcessed;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     $videos = Video::all();
    //     return view("videos", compact('videos'));
    // }
    

    

    
    public function index(): JsonResponse
    {
        $videos = Video::all();
         $search="make the summary of each transcript";
        $transcriptsWithSummaries = [];
            foreach ($videos as $video) {
            $transcript = $video->transcript;
    
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . env('OPENAI_API_KEY'),
            ])->post("https://api.openai.com/v1/chat/completions", [
                "model" => "gpt-3.5-turbo",
                'messages' => [
                    [
                        "role" => "user",
                        "content" =>"make the summary of each the given transcript including full name,experience,age,educations,profesional history,speaking , at the end tell me about his/her speaking skills". $transcript
                    ]
                ],
                'temperature' => 0.5,
                "max_tokens" => 200,
                "top_p" => 1.0,
                "frequency_penalty" => 0.52,
                "presence_penalty" => 0.5,
                "stop" => ["11."],
            ]);
    
            if ($response->successful()) {
                $responseData = $response->json();
                if (isset($responseData['choices'])) {
                    $summary = $responseData['choices'][0]['message'];
                } else {
                    \Log::error('Unexpected response format: ' . json_encode($responseData));
                    continue; 
                }
    
                $transcriptsWithSummaries[] = [
                    'transcript' => $transcript,
                    'summary' => $summary,
                ];
            } else {
                \Log::error('API request failed: ' . $response->status());
            }
        }
    
        return response()->json($transcriptsWithSummaries, 200, [], JSON_PRETTY_PRINT);
    }
    

    public function store(Request $request , Job $job)
    {  
        $request->validate([
            'file' => 'required|file|mimes:mp4', 
            'job_id'=>['required'],
        ]);
        // $data['job_id']=$job->id;
    
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = $file->getClientOriginalName();
            $path = '/uploads/';
    
            if (!file_exists(public_path($path))) {
                mkdir(public_path($path), 0755, true);
            }
    
            $file->move(public_path($path), $filename);
            
            $video = Video::create([
                'title' => $filename,
                'path' => $path . $filename, 
                'user_id' => auth()->id(), 
                'job_id'=>$request->job_id,
            ]);
            
            Session::flash('success', 'File uploaded successfully!');
            UploadProcessed::dispatch($video);
            SummaryProcessed::dispatch($video);
            SuccessCriteriaProcessed::dispatch($video);
            ApplyProcessed::dispatch($video->job);

            return redirect()->back();
        } else {
            Session::flash('error', 'No file uploaded!');
            
            return redirect()->back()->withInput();
        }
    }
    
    



    
    
    
    
    
    
    

    /**
     * Display the specified resource.
     */
    public function show(Video $video)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(rc $rc)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, rc $rc)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(rc $rc)
    {
        //
    }

     
}
