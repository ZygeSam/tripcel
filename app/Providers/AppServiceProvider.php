<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

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
        Blade::directive('convertToGig', function ($bytes) {
            return "<?php echo $bytes ?>";
        });

        Blade::directive('formatDateWithoutTime', function ($expression) {
            return "<?php echo date('Y-m-d', strtotime($expression)); ?>";
        });
    }
}
