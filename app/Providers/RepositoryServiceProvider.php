<?php

namespace App\Providers;

use App\Commude\Contracts\CrudInterface;
use App\Commude\Repositories\EloquentRepository;
use App\Commude\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(CrudInterface::class, UserRepository::class); // --> base crud
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
