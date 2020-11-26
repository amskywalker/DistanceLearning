<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(\App\Contracts\BaseInterface::class, \App\Repositories\AbstractRepository::class);
        $this->app->bind(\App\Contracts\DisciplinesInterface::class, \App\Repositories\DisciplinesRepository::class);
        $this->app->bind(\App\Contracts\ActivitiesInterface::class, \App\Repositories\ActivitiesRepository::class);
    }
}