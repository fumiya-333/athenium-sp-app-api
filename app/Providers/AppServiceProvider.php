<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    private $services = ['MMember'];

    public function register()
    {
        foreach ($this->services as $service) {
            $this->app->bind("App\Interfaces\Services\\{$service}ServiceInterface", "App\Services\\{$service}Service");
        }
    }

    public function boot()
    {
    }
}
