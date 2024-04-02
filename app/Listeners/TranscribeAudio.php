<?php

namespace App\Listeners;

use App\Events\UploadProcessed;
use App\Services\TranscribeService;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class TranscribeAudio
{
    /**
     * Create the event listener.
     */
    public function __construct(public TranscribeService  $transcribeService)
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(UploadProcessed $event): void
    {
        $this->transcribeService->transcribe($event->video);
    }
}
