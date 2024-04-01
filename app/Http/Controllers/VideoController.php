<?php

namespace App\Http\Controllers;

use App\Models\rc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Video; 
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

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
            'file' => 'required|file|mimes:mp3', 
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
    
    


    public function convertMP4toMP3($inputFilePath, $outputDirectory = null) {
        // Check if the input file exists
        if (!file_exists($inputFilePath)) {
            throw new \Exception("Input file does not exist: " . $inputFilePath);
        }
    
     
    
        // Set the output directory if not provided
        if ($outputDirectory === null) {
            $outputDirectory = sys_get_temp_dir();
        }
    
        // Generate a unique filename for the output MP3 file
        $outputFileName = uniqid() . '.mp3';
    
        // Build the output file path
        $outputFilePath = rtrim($outputDirectory, '/') . '/' . $outputFileName;
    
        // Execute ffmpeg command to convert MP4 to MP3
        $ffmpegCommand = "ffmpeg -i {$inputFilePath} -vn -acodec libmp3lame -q:a 2 {$outputFilePath}";
        exec($ffmpegCommand, $output, $returnCode);
    
        // Check if ffmpeg command executed successfully
        if ($returnCode !== 0 || !file_exists($outputFilePath)) {
            throw new \Exception("Failed to convert MP4 to MP3.");
        }
    
        return $outputFilePath;
    }
public function is_ffmpeg_installed() {
        // Check if ffmpeg is installed
        exec("ffmpeg -version", $output, $returnCode);
        return $returnCode === 0;
    }

    public function transcribe(Video $video) {
        $api = config('app.open_ai_api_key');
        
        try {
            // Get the audio file contents
            // $fileContents = file_get_contents(public_path() . $video->path);
            $videoFilePath = public_path() .'/'. $video->path;
            $audioFilePath= $this->convertMP4toMP3($videoFilePath,null);
            // dd($audioFilePath);
            $curl = curl_init();
            
            // Set CURL options
            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://api.openai.com/v1/audio/transcriptions',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => array(
                    'file' => new \CURLFile($audioFilePath),
                    'model' => 'whisper-1'
                ),
                CURLOPT_HTTPHEADER => array(
                    'Authorization: Bearer ' . config('app.open_ai_api_key'),
                    'Content-Type: multipart/form-data'
                )
            ));
            
            // Execute CURL request
            $response = curl_exec($curl);
        
            $error = curl_error($curl);
            if ($error) {
                throw new \Exception("CURL error: " . $error);
            }
            
            curl_close($curl);
            
            // Log the response for debugging
            Log::info("Transcription API Response: " . $response);
            
            // Decode the response
            $responseData = json_decode($response, true);
            dd($responseData);
            if (!isset($responseData['text'])) {
                throw new \Exception("Transcription not found in response");
            }
            
            return response()->json(['transcript' => $responseData['text']]);
            
        } catch (\Exception $e) {
            $statusCode = 500;
            $body = $e->getMessage();
            return response()->json(['status_code' => $statusCode, 'body' => $body]);
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
