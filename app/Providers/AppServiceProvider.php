<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\EmployeeEvaluation;
use App\Observers\EmployeeEvaluationObserver;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\URL; 

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        EmployeeEvaluation::observe(EmployeeEvaluationObserver::class);
        Paginator::useBootstrap();

        // Check ENV
        if(config('app.env') === 'production') {
            URL::forceScheme('https');
        }
    }
}
