<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Interfaces\ProductCategoryRepositoryInterface;
use App\Interfaces\ProductRepositoryInterface;

use App\Repositories\ProductCategoryRepository;
use App\Repositories\ProductRepository;



class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Interfaces\ProductCategoryRepositoryInterface','App\Repositories\ProductCategoryRepository');
        $this->app->bind('App\Interfaces\ProductRepositoryInterface','App\Repositories\ProductRepository');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
