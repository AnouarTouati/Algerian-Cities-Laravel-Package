<?php

use AnouarTouati\AlgerianCitiesLaravel\AlgerianCitiesApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::prefix('api/algeriancities')->middleware('throttle')->group(function(){
   Route::get('/wilayas', [AlgerianCitiesApiController::class,'wilayas']);
   Route::get('/dairas/{wilaya}', [AlgerianCitiesApiController::class,'dairas']);
   Route::get('/communes/{daira}', [AlgerianCitiesApiController::class,'communes']);
   Route::get('/postoffices/{commune}', [AlgerianCitiesApiController::class,'postoffices']);
});
