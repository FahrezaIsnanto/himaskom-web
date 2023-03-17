<?php

namespace App\Providers;

use App\Services\DivisionService;
use App\Services\Impl\DivisionServiceImpl;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class DivisionServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public $singletons = [
        DivisionService::class => DivisionServiceImpl::class
    ];

    public function provides()
    {
        return [DivisionService::class];
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
