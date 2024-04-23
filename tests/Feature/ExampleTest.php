<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Smalot\PdfParser\Parser;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
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
