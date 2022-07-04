<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Interfaces\ProductCategoryRepositoryInterface;
use App\Interfaces\ProductRepositoryInterface;
use App\Interfaces\CartItemRepositoryInterface;

use App\Repositories\ProductCategoryRepository;
use App\Repositories\ProductRepository;
use App\Repositories\CartItemRepository;



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
        $this->app->bind('App\Interfaces\CartItemRepositoryInterface','App\Repositories\CartItemRepository');
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
