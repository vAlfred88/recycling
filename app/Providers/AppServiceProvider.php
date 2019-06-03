<?php

namespace App\Providers;

use Faker\Factory;
use Faker\Generator;
use Illuminate\Http\Resources\Json\Resource;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        Resource::withoutWrapping();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Generator::class, function () {
            return Factory::create('ru_RU');
        });

        if($this->app->isLocal()){
            $this->app->register(\Barryvdh\Debugbar\ServiceProvider::class);
        }

        $this->app['view']->addNamespace('company', base_path() . '/resources/views/company');
    }
}
