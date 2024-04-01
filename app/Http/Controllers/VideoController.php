<?php

namespace App\Http\Controllers;

use App\Models\rc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Video; 
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;
class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $videos = Video::all();
        return view("videos", compact('videos'));
    }
    
    

    public function store(Request $request)
    {
        // Validate the incoming request
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
    
            // Redirect to the index page or show a success message
            return redirect()->back();
        } else {
            // Flash error message if no file was uploaded
            Session::flash('error', 'No file uploaded!');
            
            // Redirect back to the form with an error message
            return redirect()->back()->withInput();
        }
    }
    
    
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }


    public function transcribe(Video $video) {
   
        $api = config('app.open_ai_api_key');
          
        $client = new Client();
        try {
      $fileContents = base64_encode(file_get_contents(public_path() . '/' . $video->path));
    
            $response = $client->request('POST', 'https://api.openai.com/v1/audio/transcriptions', [
                'headers' => [
                    'Authorization' => 'Bearer ' . config('app.open_ai_api_key'),
                    'Content-Type' => 'multipart/form-data',
                ],
                    
                'multipart' => [
                    [
                        'name' => 'file',
                        'contents' => $fileContents,
                    ],
                    [
                        'name' => 'model',
                        'contents' => 'whispexr-1',
                    ],
                ],
            ]);
            
            dd($response);
    
            $statusCode = $response->getStatusCode();
    
            $body = json_decode($response->getBody()->getContents(), true); 
                
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            $statusCode = $e->getResponse() ? $e->getResponse()->getStatusCode() : 500;
            $body = $e->getResponse() ? json_decode($e->getResponse()->getBody()->getContents(), true) : $e->getMessage();
        } catch (\Exception $e) {
            $statusCode = 500;
            $body = $e->getMessage();
        }
        
        return response()->json(['status_code' => $statusCode, 'body' => $body]);
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
