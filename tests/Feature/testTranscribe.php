<?php

namespace Tests\Feature;

use Tests\TestCase;
use GuzzleHttp\Client;
use Smalot\PdfParser\Parser;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TranscribeTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function pdf(){
 
        $filePath = storage_path('app/public/resumes/hariti_resume (1)_1713177454.pdf');
        
        $parser = new Parser();
        
        // Parse the PDF file 
        $pdf = $parser->parseFile($filePath);
        $text = $pdf->getText();
        dd($text);
        }
        
}
