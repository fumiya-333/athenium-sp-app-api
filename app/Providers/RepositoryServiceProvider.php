<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    private $models = ['MMember'];

    public function register()
    {
        foreach ($this->models as $model) {
            $this->app->bind(
                "App\Interfaces\Repositories\\{$model}RepositoryInterface",
                "App\Repositories\\{$model}Repository"
            );
        }
    }

    public function boot()
    {
    }
}
