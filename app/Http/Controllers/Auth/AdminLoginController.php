<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AdminLoginController extends Controller //Controler de login para o administrador do sistema
{
    public function __construct()
    {
        $this->middleware('guest:admin', ['except' => 'logout']);
    }

    //
    public function showLoginForm(){
        return view('auth.admin-login');
    }

    public function login(Request $request){
        //Validar o formulario
            $this->validate($request, [
                'email' => 'required|email',
                'password' => 'required|min:6'
            ]);
        //Executar o login de usuário
        if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)){
            //se tiver sucesso, ele sera direcionado para a home de ADM
            return redirect()->intended(route('admin.home'));
        }

        //Se nao tiver sucesso, vamos mater o usuário no formulário
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/');
    }

}
