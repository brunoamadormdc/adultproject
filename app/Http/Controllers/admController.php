<?php

namespace App\Http\Controllers;
use \Torann\GeoIP\Facades\GeoIP;
use App\acompanhantes;
use App\categoriamodelo;
use App\videosmodelos;
use App\fotosmodelos;
use App\usuario;
use App\restrict;
use App\videoscomprados;
use App\videos;
use App\Http\auxiliar\auxiliares;
use Illuminate\Http\Request;


class admController extends Controller
{
        public function retornaSessao() {
        
        
        return session()->get('restrict');
    
    
}

public function getNovovideo() {
    return view('adminrestrict.salvarvideos');
}
public function salvarVideo(Request $request, videos $videos) {
    if ($videos->salvarVideo($request)) {
        return redirect()->back()->with('success','Novo video inserido com sucesso');
    }
    else {
        return redirect()->back()->with('error', 'Erro ao salvar novo video');
    }
}



public function editarVideo(Request $request, videos $videos) {
      if($videos->editarVideo($request)) {
        return redirect()->back()->with('success', 'Vídeo editado com sucesso');
    }
    else {
        return redirect()->back()->with('error', 'Erro ao editar o vídeo');
    }
}
public function excluirVideo(Request $request, videos $videos) {
    if($videos->excluirVideo($request)) {
        return redirect()->back()->with('success', 'Vídeo excluído com sucesso');
    }
    else {
        return redirect()->back()->with('error', 'Erro ao excluir o video');
    }
}

public function getAdmin() {
    return view('adminrestrict.home');
}

public function getVideos(videos $videos) {
    $vid = $videos->getAllAdmin();
    
    return view('adminrestrict.videos')->with('videos',$vid);
    
} 

public function dadoscadastrais() {
    return view('adminrestrict.dadoscadastrais')->with('usuario',$this->retornaSessao());
}
public function salvardados(Request $request,restrict $restrict) {
    $validatedData = $request->validate([
        'nome' => 'required',
        'email' => 'required',
        
        
        
        
    ]);
   
    if($restrict->salvardados($request)) {
        return redirect()->route('dadoscadastraisrestrict')->with('success','Dados Salvos');
    }
  
    else  {
        return redirect()->route('dadoscadastraisrestrict')->with('error','Ocorreu um erro ao salvar os dados');
    }
}


public function loginPage() {
    return view('loginrestrict.login');
}
public function registerPage() {
    return view('loginrestrict.register');
}

public function validatoken () {
    return view('loginrestrict.validatoken');
}
public function saveregister(Request $request, restrict $restrict) {
    if (!$restrict->register($request)) {
        
        return redirect()->back()->with('error','Email já cadastrado');
    }
    else {
        
        
        return redirect()->route('validatokenrestrict');
    }
}





public function validartokenregistro(Request $request, restrict $restrict) {
    if($restrict->validarToken($request)) {
       
       return redirect()->route('adminrestrict');
    }
    else {
        return redirect()->back()->with('error','A informação do token está incorreta');
    }
}
public function logout() {
    request()->session()->flush();
    return redirect()->route('loginusuario')->with('warning','Sessão encerrada');
}
public function fazerlogin(Request $request, restrict $restrict) {
    $validarlogin = $restrict->loginrestrict($request);
    if($validarlogin) {
        
        return redirect()->route('adminrestrict');
    }
    else {
        return redirect()->back()->with('error','Informações incorretas');
    }
}
}
