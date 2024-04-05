<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Number;
use Illuminate\Support\ServiceProvider;

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
        // $rupiah = Number::currency(1000, in:'IDR', locale: 'id' );
        Blade::directive('rupiah', function($expression){
            return "Rp. <?php echo number_format($expression,0,',','.'); ?>";
        });
    }
}
