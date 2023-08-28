<?php
namespace AnouarTouati\AlgerianCitiesLaravel;

use Illuminate\Support\ServiceProvider;

class AlgerianCitiesServiceProvider extends ServiceProvider{

    public function boot(){
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->loadRoutesFrom(__DIR__.'/../routes/api.php');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'algerian-citites-laravel');
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'algerian-citites-laravel');
        $this->publishes([
            __DIR__.'/../resources/lang' => $this->app->langPath('vendor/algerian-citites-laravel'),
        ], 'algerian-cities-laravel-localization');
      
    }

    public function register(){
        $this->app->bind(AlgerianCities::class,function(){
            return new AlgerianCities();
        });
        
    }
}
