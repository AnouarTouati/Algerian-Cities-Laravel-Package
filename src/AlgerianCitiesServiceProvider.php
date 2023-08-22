<?php
namespace AnouarTouati\AlgerianCities;
use Illuminate\Support\ServiceProvider;

class AlgerianCitiesServiceProvider extends ServiceProvider{

    public function boot(){
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->loadRoutesFrom(__DIR__.'/../routes/api.php');
    }

    public function register(){

    }
}
