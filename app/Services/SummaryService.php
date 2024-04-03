<?php

namespace App\Services;

use App\Models\Video;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\JsonResponse;

class SummaryService
{
    public function __construct()
    {

    }

    public function summary(Video $video)
    {
        $transcript = $video->transcript;

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . env('OPENAI_API_KEY'),
        ])->post("https://api.openai.com/v1/chat/completions", [
            "model" => "gpt-3.5-turbo",
            'messages' => [
                [
                    "role" => "user",
                    "content" => "Make a summary of the transcript for this transcript including , full name,age,sex,education, professional experience  " . $transcript
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
                $video->summary =$summary;
                $video->save();

            } else {
                \Log::error('Unexpected response format: ' . json_encode($responseData));
                return null;
            }

            return $summary;
        } else {
            \Log::error('API request failed: ' . $response->status());
            return null;
        }
    }
}
