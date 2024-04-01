<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use GuzzleHttp\Client;

class TranscribeTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testTranscribe(): void
    {
        // Replace 'YOUR_VIDEO_PATH' with the actual path to your video file
        $videoFilePath = '/uploads/audio.mp3';

        // Initialize Guzzle client
        $client = new Client();

        try {
            // Send a request to the API endpoint
            $response = $client->request('POST', 'https://api.openai.com/v1/audio/transcriptions', [
                'headers' => [
                    'Authorization' => 'Bearer ' . config('app.open_ai_api_key'),
                    'Content-Type' => 'multipart/form-data',
                ],
                'multipart' => [
                    [
                        'name' => 'file',
                        'contents' => fopen($videoFilePath, 'r'),
                    ],
                    [
                        'name' => 'model',
                        'contents' => 'whisper-1',
                    ],
                ],
            ]);

            // Get response status code
            $statusCode = $response->getStatusCode();

            // Decode JSON response body
            $body = json_decode($response->getBody()->getContents(), true);

            // Assert that the status code is 200
            $this->assertEquals(200, $statusCode);

            // Output the response (optional)
            echo "Status Code: $statusCode\n";
            echo "Response Body: " . json_encode($body, JSON_PRETTY_PRINT) . "\n";

        } catch (\GuzzleHttp\Exception\RequestException $e) {
            // Handle request exceptions
            $statusCode = $e->getResponse() ? $e->getResponse()->getStatusCode() : 500;
            $body = $e->getResponse() ? json_decode($e->getResponse()->getBody()->getContents(), true) : $e->getMessage();
            
            // Output the error (optional)
            echo "Error Status Code: $statusCode\n";
            echo "Error Response Body: " . json_encode($body, JSON_PRETTY_PRINT) . "\n";

            // Fail the test
            $this->fail("Failed to transcribe audio: $statusCode - $body");

        } catch (\Exception $e) {
            // Handle other exceptions
            $this->fail("An unexpected error occurred: " . $e->getMessage());
        }
    }
}
