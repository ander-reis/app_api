<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Método responsavel por retornar o token e logar user
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function accessToken(Request $request)
    {
        //dd($request);
        //valida login (email, password)
        $this->validateLogin($request);

        //metodo para pegar somente email e password
        $credentials = $this->credentials($request);

        //verifica se recebe token e retorna sucesso
        if($token = \Auth::guard('api')->attempt($credentials)){
            return $this->sendLoginResponse($request, $token);
        }

        //retorna erro se falhar login
        return $this->sendFailedLoginResponse($request);
    }

    /**
     * Método responsável pelo refresh token
     * @param Request $request
     * @return mixed
     */
    public function refreshToken(Request $request)
    {
        $token = \Auth::guard('api')->refresh();
        return $this->sendLoginResponse($request, $token);
    }

    /**
     * Sobrescreve o método sendLoginResponse para retornar o token
     * @param Request $request
     * @param $token
     * @return mixed
     */
    protected function sendLoginResponse(Request $request, $token)
    {
        return response()->json([
            'token' => $token
        ]);
    }

    /**
     * Método responsável por retornar erro do login
     * @param Request $request
     * @return mixed
     */
    protected function sendFailedLoginResponse(Request $request)
    {
        return response()->json([
            'error' => \Lang::get('auth.failed')
        ], 400);
    }

    /**
     * Metódo responsável por logout e invalida token
     * @param Request $request
     */
    public function logout(Request $request)
    {
        \Auth::guard('api')->logout();

        return response()->json([], 204);
    }

    //sobreescrevendo credentials
    protected function credentials(Request $request)
    {
        $data = $request->only($this->username(), 'password');
        $usernameKey = $this->usernameKey();
        if($usernameKey != $this->username()){
            $data[$this->usernameKey()] = $data[$this->username()];
            unset($data[$this->username()]);
        }
        return $data;
    }

    //para fazer login com dois campos
    protected function usernameKey()
    {
        $email = \Request::get('email');

        $validator = \Validator::make([
            'email' => $email
        ], ['email' => 'ds_cpf']);

        if(!$validator->fails()){
            return 'ds_cpf';
        }

        return 'email';
    }
}
