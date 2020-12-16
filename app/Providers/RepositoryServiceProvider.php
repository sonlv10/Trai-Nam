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
        $this->app->bind(\App\Repositories\PostRepository::class, \App\Repositories\PostRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ProductsRepository::class, \App\Repositories\ProductsRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\EmailRepository::class, \App\Repositories\EmailRepositoryEloquent::class);
        //:end-bindings:
    }
}
