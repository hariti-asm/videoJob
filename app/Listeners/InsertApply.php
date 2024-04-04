<?php

namespace App\Listeners;

use App\Events\ApplyProcessed;
use App\Services\ApplyService;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class InsertApply
{
    /**
     * Create the event listener.
     */
    public function __construct(public ApplyService  $applyService)
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ApplyProcessed $event): void
    {
        $this->applyService->apply($event->job);
    }
}
