<?php

namespace App\Listeners;

use App\Services\ScoreService;
use App\Events\SuccessCriteriaProcessed;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CalculateScore
{
    /**
     * Create the event listener.
     */
    public function __construct(public ScoreService  $scoreService)
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(SuccessCriteriaProcessed $event): void
    {
        $this->scoreService->score($event->video);
    }
}
