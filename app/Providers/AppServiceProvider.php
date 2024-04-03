<?php 


namespace App\Providers;

use App\Events\SummaryProcessed;
use App\Events\UploadProcessed;
use App\Listeners\TranscribeAudio;
use App\Listeners\TranscriptSummary;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Event;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Event::listen(
            UploadProcessed::class,
            TranscribeAudio::class
        );

        Event::listen(
            SummaryProcessed::class,
            TranscriptSummary::class
        );
    }
}
