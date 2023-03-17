<?php

namespace App\Providers;

use App\Services\AdminService;
use App\Services\Impl\AdminServiceImpl;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class AdminServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public $singletons = [
        AdminService::class => AdminServiceImpl::class
    ];

    public function provides()
    {
        return [AdminService::class];
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
