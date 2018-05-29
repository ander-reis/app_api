<?php

namespace App\Providers;

use Code\Validator\Cpf;
use Dingo\Api\Exception\Handler;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\ValidationException;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \Validator::extend('ds_cpf', function($attribute, $value, $parameters, $validator){
            return (new Cpf())->isValid($value);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() !== 'production') {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }

        //classe que trata a exception do dingo api
        $handler = app(Handler::class);
        $handler->register(function(AuthenticationException $exception){
            return response()->json(['error' => 'Unauthenticated', 'message' => 'Nâo autorizado'], 401);
        });
        $handler->register(function(ValidationException $exception){
            return response()->json([
                'error' => $exception->getMessage(),
                'validation_error' => $exception->validator->getMessageBag()->toArray(),
                'status_code:' => 422,
            ], 422);
        });
    }
}
