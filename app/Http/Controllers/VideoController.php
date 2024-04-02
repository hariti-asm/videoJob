<?php

namespace App\Http\Controllers;

use App\Events\UploadProcessed;
use App\Models\rc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Video; 
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\JsonResponse;
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
        $search = "how to get a job";
  
        $data = Http::withHeaders([
                    'Content-Type' => 'application/json',
                    'Authorization' => 'Bearer '.env('OPENAI_API_KEY'),
                  ])
                  ->post("https://api.openai.com/v1/chat/completions", [
                    "model" => "gpt-3.5-turbo",
                    'messages' => [
                        [
                           "role" => "user",
                           "content" => $search
                       ]
                    ],
                    'temperature' => 0.5,
                    "max_tokens" => 200,
                    "top_p" => 1.0,
                    "frequency_penalty" => 0.52,
                    "presence_penalty" => 0.5,
                    "stop" => ["11."],
                  ])
                  ->json();
  
        return response()->json($data['choices'][0]['message'], 200, array(), JSON_PRETTY_PRINT);
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:mp4', 
        ]);
    
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
            ]);
            
            Session::flash('success', 'File uploaded successfully!');
          UploadProcessed::dispatch($video);
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
