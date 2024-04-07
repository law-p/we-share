<?php

namespace App\Providers;

use App\Models\User;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
       
        $TopUser = Cache::remember('TopUser', 60 * 2, function(){

            return User::withCount('shares')->orderBy('shares_count', 'DESC')->limit(10)->get();
            
        });

        Paginator::useBootstrapFive();

        View::share('TopUser', $TopUser);
    }
}
