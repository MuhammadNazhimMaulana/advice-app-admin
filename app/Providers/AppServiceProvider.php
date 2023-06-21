<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\EmployeeEvaluation;
use App\Observers\EmployeeEvaluationObserver;
use Illuminate\Pagination\Paginator;

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
    }
}
