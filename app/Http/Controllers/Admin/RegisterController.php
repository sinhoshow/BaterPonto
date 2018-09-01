<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Employed;
use App\Http\Requests\RegisterFormRequest;

class RegisterController extends Controller
{
    public function index(){
        return view('painel.register.index');
    }

    public function register(RegisterFormRequest $request){
        $employed = new Employed();
        $response = $employed->create([
            'name' => $request->name
        ]);
        if ($response){
             return redirect()
                        ->back()
                        ->with('success', 'Cadastro realizado com sucesso');
        }        
    }
}
