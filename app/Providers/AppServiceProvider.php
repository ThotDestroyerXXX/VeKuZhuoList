<?php

namespace App\Providers;

use App\Models\Genre;
use App\Models\Season;
use App\Models\Studio;
use Illuminate\Pagination\Paginator;
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
        view()->composer('components.header', function ($view) {
            $view->with([
                'genres' => Genre::all(),
                'seasons' => Season::getSortedSeasons(),
                'studios' => Studio::all()
            ]);
        });
        Paginator::useBootstrapFive();
    }
}
