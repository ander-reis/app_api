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

/**
 * versão 1
 */
ApiRoute::version('v1', function(){
    ApiRoute::group(['namespace' => 'App\Http\Controllers\Api\V1', 'as' => 'api'], function(){
        //rota acess_token
        ApiRoute::post('/access_token', [
            'uses' => 'AuthController@accessToken',
            'middleware' => 'api.throttle',
            'limit' => 10,
            'expires'=> 1
        ])->name('.access_token');

        //rota refresh_token
        ApiRoute::post('/refresh_token', [
            'uses' => 'AuthController@refreshToken',
            'middleware' => 'api.throttle',
            'limit' => 10,
            'expires'=> 1
        ])->name('.refresh_token');

        //cadastrar user
        ApiRoute::post('/user', 'ProfessorCadastroController@store');

        //grupo de rotas que precisarão de autenticação
        ApiRoute::group([
            'middleware' => ['api.throttle', 'api.auth'],
            'limit' => 100,
            'expires'=> 3
        ], function(){
            //rota logout
            ApiRoute::post('/logout', 'AuthController@logout');

            //rota para teste
            ApiRoute::get('/test', function (){
                return 'Autenticado';
            });
        });
    });


    //ver
//    ApiRoute::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
//    ApiRoute::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
//    ApiRoute::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
//    ApiRoute::post('password/reset', 'Auth\ResetPasswordController@reset');

});

/**
 * teste versão 2
 */
ApiRoute::version('v2', function(){
    ApiRoute::get('/test', function(){
       echo 'rota teste v2';
    });
});