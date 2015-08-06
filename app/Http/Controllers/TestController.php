<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TestController extends Controller
{
    public function getExemplo(){
        return 'oi';
    }

    public function getLogin(){

        $data = [
            'email' => 'yurick@gmail.com',
            'password' => 'vinicius'
        ];

        /*
        if(Auth::attempt($data)) /// logar
            return 'logou';

        if(Auth::check()){ /// checka se esta logado
            return 'logado';
        }
        */

        //dd(Auth::user());
        //dd(Auth::user()->password);
        return Auth::user();

        return 'falhou';

    }

    public function getLogout(){
        Auth::logout();

        if(Auth::check()){ /// checka se esta logado
            return 'logado';
        }

        return 'not are logged';
    }
}
