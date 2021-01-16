<?php


namespace App\Http\Controllers;
use \Torann\GeoIP\Facades\GeoIP;
use App\acompanhantes;
use App\categoriamodelo;
use App\videosmodelos;
use App\fotosmodelos;
use App\usuario;
use App\videoscomprados;
use App\Http\auxiliar\auxiliares;
use Illuminate\Http\Request;



class usuariocontroller extends Controller
{
    public function retornaSessao() {
        
        
        return session()->get('usuario');
    
    
}

public function getAdmin() {
    return view('adminusuario.home');
}
public function checkoutcreditos() {
    return view('adminusuario.checkoutcreditos');
}

public function dadoscadastrais() {
    return view('adminusuario.dadoscadastrais')->with('usuario',$this->retornaSessao());
}
public function salvardados(Request $request,usuario $usuario) {
    $validatedData = $request->validate([
        'nome' => 'required',
        'email' => 'required',
        
        'cidade'=> 'required',
        
        
    ]);
   
    if($usuario->salvardados($request)) {
        return redirect()->route('dadoscadastraisusuario')->with('success','Dados Salvos');
    }
  
    else  {
        return redirect()->route('dadoscadastraisusuario')->with('error','Ocorreu um erro ao salvar os dados');
    }
}


public function loginPage() {
    return view('loginusuario.login');
}
public function registerPage() {
    return view('loginusuario.register');
}

public function validatoken () {
    return view('loginusuario.validatoken');
}
public function saveregister(Request $request, usuario $usuario) {
    if (!$usuario->register($request)) {
        
        return redirect()->back()->with('error','Email já cadastrado');
    }
    else {
        
        
        return redirect()->route('validatokenusuario');
    }
}





public function validartokenregistro(Request $request, usuario $usuario) {
    if($usuario->validarToken($request)) {
       
       return redirect()->route('adminusuario');
    }
    else {
        return redirect()->back()->with('error','A informação do token está incorreta');
    }
}
public function logout() {
    request()->session()->flush();
    return redirect()->route('loginusuario')->with('warning','Sessão encerrada');
}
public function fazerlogin(Request $request, usuario $usuario) {
    $validarlogin = $usuario->loginusuario($request);
    if($validarlogin) {
        
        return redirect()->route('adminusuario');
    }
    else {
        return redirect()->back()->with('error','Informações incorretas');
    }
} 
}
