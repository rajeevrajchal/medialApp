<?php

namespace App\Providers;

use App\Repositories\Auth\authRepository;
use App\Repositories\Auth\authService;
use App\Repositories\Biochemistry\biochemistryRepository;
use App\Repositories\Biochemistry\biochemistryService;
use App\Repositories\Hematology\hematologyRepository;
use App\Repositories\Hematology\hematologyService;
use App\Repositories\Lipid\lipidRepository;
use App\Repositories\Lipid\lipidService;
use App\Repositories\Patient\patientRepository;
use App\Repositories\Patient\patientService;
use App\Repositories\Serology\serologyRepository;
use App\Repositories\Serology\serologyService;
use App\Repositories\Urine\urineRepository;
use App\Repositories\Urine\urineService;
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
        $this->app->singleton(serologyRepository::class, serologyService::class);
        $this->app->singleton(urineRepository::class, urineService::class);
        $this->app->singleton(hematologyRepository::class, hematologyService::class);
        $this->app->singleton(biochemistryRepository::class, biochemistryService::class);

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
