<?php

namespace App\Services;

use App\Models\Video;

class TranscribeService
{
    public function __construct(public Video $video)
    {

    }

    public function convertMP4toMP3($inputFilePath, $outputDirectory = null)
    {
        if (!file_exists($inputFilePath)) {
            throw new \Exception("Input file does not exist: " . $inputFilePath);
        }
        // Set the output directory(uploads)
        if ($outputDirectory === null) {
            $outputDirectory = sys_get_temp_dir();
        }

        //  unique filename for the output MP3 file
        $outputFileName = uniqid() . '.mp3';

        //  output file path
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
 

    public function transcribe(Video $video)
    {
        try {
            $videoFilePath = public_path() . '/' . $video->path;
            $audioFilePath = $this->convertMP4toMP3($videoFilePath, null);
            // dd($audioFilePath);
            $curl = curl_init();

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
            )
            );

            $response = curl_exec($curl);

            $error = curl_error($curl);
            if ($error) {
                throw new \Exception("CURL error: " . $error);
            }

            curl_close($curl);


            $responseData = json_decode($response, true);
            // dd($responseData);
            if (!isset($responseData['text'])) {
                throw new \Exception("Transcription not found in response");
            }
            $video->transcript = $responseData['text'];
            $video->status = "done";

            $video->save();
    
            return response()->json(['transcript' => $video->transcript]);

        } catch (\Exception $e) {
            $statusCode = 500;
            $body = $e->getMessage();
            return response()->json(['status_code' => $statusCode, 'body' => $body]);
        }
    }

}