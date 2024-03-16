<?php

namespace App\Providers;

use App\Commude\Contracts\CarInterface;
use App\Commude\Contracts\UserInterface;
use App\Commude\Repositories\CarRepository;
use App\Commude\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(UserInterface::class, UserRepository::class);
        $this->app->bind(CarInterface::class, CarRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
