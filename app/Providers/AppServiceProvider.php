<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Gate;

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
        Gate::define('isAdmin', function($user) {
            return $user->job == 'Admin';
        });

        Gate::define('isGuru', function($user) {
            return $user->job == 'Guru'; 
        });

        Gate::define('isSiswa', function($user) {
            return $user->job == 'Siswa';
        });
        Schema::defaultStringLength(191);
    }
}
