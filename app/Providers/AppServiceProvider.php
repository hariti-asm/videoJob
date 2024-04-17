<?php 


namespace App\Providers;

use App\Events\ApplyProcessed;
use App\Listeners\InsertApply;
use App\Events\UploadProcessed;
use App\Events\SummaryProcessed;
use App\Listeners\CalculateScore;
use App\Services\CategoryService;
use App\Listeners\TranscribeAudio;
use App\Listeners\TranscriptSummary;
use App\Repository\CategoryInterface;
use Illuminate\Support\Facades\Event;
use App\Repository\CategoryRepository;
use Illuminate\Support\ServiceProvider;
use App\Events\SuccessCriteriaProcessed;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        $this->app->bind(CategoryInterface::class, CategoryRepository::class);
        $this->app->bind(CategoryService::class, function ($app) {
            return new CategoryService($app->make(CategoryInterface::class));
        });
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
        Event::listen(
            SuccessCriteriaProcessed::class,
            CalculateScore::class
        );
        Event::listen(
            ApplyProcessed::class,
            InsertApply::class
        );
    }
}
