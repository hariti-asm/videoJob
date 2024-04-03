<?php

namespace App\Listeners;

use App\Events\SummaryProcessed;
use App\Services\SummaryService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class TranscriptSummary
{
    /**
     * Create the event listener.
     */
    public function __construct(public SummaryService  $summaryService)
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(SummaryProcessed $event): void
    {
        $this->summaryService->summary($event->video);    }
}
