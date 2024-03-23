<?php

namespace App\Providers;

use App\Models\Bicycle;
use App\Models\Rental;
use App\Models\User;
use Gate;
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
        Paginator::defaultView('pagination::default');

        Gate::define('destroy-bicycle', function (User $user, Bicycle $bicycle) {
            return $user->is_admin OR $bicycle->location == null;
        });
    }
}
