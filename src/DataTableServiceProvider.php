<?php

namespace DatatableService;

use Illuminate\Support\ServiceProvider;

class DataTableServiceProvider extends ServiceProvider
{
    public function register()
    {
        // Register the service
        $this->app->singleton(DataTableService::class);
    }

    public function boot()
    {

    }
}
