<?php

namespace App\Providers;

use App\Services\Impl\NewsServiceImpl;
use App\Services\NewsService;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class NewsServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public $singletons = [
        NewsService::class => NewsServiceImpl::class
    ];

    public function provides()
    {
        return [NewsService::class];
    }
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
        //
    }
}
