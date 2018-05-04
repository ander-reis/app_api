<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

ApiRoute::version('v1', function(){
    ApiRoute::get('/test', function (){
       echo 'rota teste v1';
    });
});

ApiRoute::version('v2', function(){
    ApiRoute::get('/test', function(){
       echo 'rota teste v2';
    });
});