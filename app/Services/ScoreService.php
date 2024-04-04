<?php

namespace App\Services;

use App\Models\Video;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\JsonResponse;

class ScoreService
{
    public function __construct()
    {

    }

    public function score(Video $video)
    {
        $summaryContent = $video->summary['content'] ?? '';
    
        $criteriaWeights = [
            'full_name' => 0.2,
            'age' => 0.2,
            'sex' => 0.1,
            'education' => 0.3,
            'professional_experience' => 0.2,
        ];
    
        $score = 0;
        $totalWeight = 0;
    
        foreach ($criteriaWeights as $criterion => $weight) {
            if (strpos(strtolower($summaryContent), $criterion) !== false) {
                $score += $weight;
            }
            $totalWeight += $weight;
        }
    
        $percentageScore = ($totalWeight > 0) ? ($score / $totalWeight) * 100 : 0;
    
        // dd([
        //     'Summary Content' => $summaryContent,
        //     'Score' => $score,
        //     'Total Weight' => $totalWeight,
        //     'Percentage Score' => $percentageScore,
        // ]);
    
        // Assign score to video and save
        $video->score = $percentageScore;
        $video->save();
    
        return $percentageScore;
    }
    
}