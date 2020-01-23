<?php

namespace App\Providers;

use App\Repositories\Auth\authRepository;
use App\Repositories\Auth\authService;
use App\Repositories\Lipid\lipidRepository;
use App\Repositories\Lipid\lipidService;
use App\Repositories\Patient\patientRepository;
use App\Repositories\Patient\patientService;
use Illuminate\Support\Facades\Schema;
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
        $this->app->singleton(authRepository::class, authService::class);
        $this->app->singleton(patientRepository::class, patientService::class);
        $this->app->singleton(lipidRepository::class, lipidService::class);

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }
}
