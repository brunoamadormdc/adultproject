<?php

namespace App\Http\Controllers;
use \Torann\GeoIP\Facades\GeoIP;
use App\acompanhantes;
use App\categoriamodelo;
use App\videosmodelos;
use App\fotosmodelos;
use App\Http\auxiliar\auxiliares;
use Illuminate\Http\Request;

class adminController extends Controller
{   
    
    public function retornaSessao() {
        
        
            return session()->get('acompanhante');
        
        
    }
    
    public function getAdmin() {
        return view('admin.home');
    }
    public function dadoscadastrais(categoriamodelo $categoriamodelo) {
        $categoria = $categoriamodelo->getAll();
        
        return view('admin.dadoscadastrais')->with('acompanhante',$this->retornaSessao())->with('categoria',$categoria);
    }
    public function infospessoais() {
        return view('admin.infospessoais')->with('acompanhante',$this->retornaSessao());
    }
    public function aparencia() {
        return view('admin.aparencia');
    }
    public function fotos(fotosmodelos $fotosmodelos) {
        $fotos = $fotosmodelos->getByid();
        return view('admin.fotos')->with('fotos',$fotos);
    }
    public function videos(videosmodelos $videosmodelos) {
        $videos = $videosmodelos->getByid();
        return view('admin.videos')->with('videos',$videos);
    }
    public function audios() {
        return view('admin.audios');
    }
    public function loginPage() {
        return view('login.login');
    }
    public function registerPage() {
        return view('login.register');
    }

    public function validatoken () {
        return view('login.validatoken');
    }
    public function saveregister(Request $request, acompanhantes $acompanhantes) {
        if (!$acompanhantes->register($request)) {
            
            return redirect()->back()->with('error','Email já cadastrado');
        }
        else {
            
            
            return redirect()->route('validatoken');
        }
    }

    public function salvarinfospessoais(Request $request, acompanhantes $acompanhantes) {
        if($acompanhantes->salvarinfospessoais($request)) {
            return redirect('admin/infospessoais')->with('success','Dados Salvos');
        }
      
        else  {
            return redirect('admin/infospessoais')->with('error','Ocorreu um erro ao salvar os dados');
        }
    }
    public function salvardados(Request $request,acompanhantes $acompanhantes) {
        $validatedData = $request->validate([
            'nome' => 'required',
            'email' => 'required',
            'estado' => 'required',
            'cidade'=> 'required',
            'whatsapp' => 'required'
            
        ]);
       
        if($acompanhantes->salvardados($request)) {
            return redirect('admin/dadoscadastrais')->with('success','Dados Salvos');
        }
      
        else  {
            return redirect('admin/dadoscadastrais')->with('error','Ocorreu um erro ao salvar os dados');
        }
    }
    
    
    public function salvarfotoperfil(Request $request, acompanhantes $acompanhantes, auxiliares $aux) {
        $foto = $request->file('fotoperfil');
        $valida = $aux->testimage($foto);
        if ($valida == 'extensao') {
           
            return redirect()->back()-with('error','Aceitas somente as extensões .JPG e .PNG');
        }
        else if($valida == 'tamanho') {
           
            return redirect()->back()-with('error','Tamanho máximo permitido de 5MB');
        }
        else {
            if($acompanhantes->salvarfotoperfil($request)) {
                return redirect('admin/dadoscadastrais')->with('success','Dados Salvos');
             }
             else {
                return redirect('admin/dadoscadastrais')->with('error','Ocorreu um erro ao salvar a foto');
             }
        }
       
        
    }
    public function salvarfotocapa(Request $request, acompanhantes $acompanhantes, auxiliares $aux) {
        
        $foto = $request->file('fotocapa');
        $valida = $aux->testimage($foto);
        if ($valida == 'extensao') {
            
            return redirect()->back()-with('error','Aceitas somente as extensões .JPG e .PNG');
        }
        else if($valida == 'tamanho') {
           
            return redirect()->back()-with('error','Tamanho máximo permitido de 5MB');
        }
        else {
            if($acompanhantes->salvarfotocapa($request)) {
                return redirect('admin/dadoscadastrais')->with('success','Dados Salvos');
             }
             else {
                return redirect('admin/dadoscadastrais')->with('error','Ocorreu um erro ao salvar a foto');
             }
        }
       
        
    }
    public function salvarfotogaleria(Request $request, fotosmodelos $fotosmodelos, auxiliares $aux) {
        $foto = $request->file('fotogaleria');
        $valida = $aux->testimage($foto);
        if ($valida == 'extensao') {
            
            return redirect()->back()->with('error','Aceitas somente as extensões .JPG e .PNG');
        }
        else if($valida == 'tamanho') {
            
            return redirect()->back()->with('error','Tamanho máximo permitido de 5MB');
        }
        else {
            if($fotosmodelos->salvarfoto($request)) {
                return redirect('admin/fotos')->with('success','Dados Salvos');
             }
             else {
                return redirect('admin/fotos')->with('error','Ocorreu um erro ao salvar a foto');
             }
        }
       
        
    }

    public function excluirvideo(Request $request, videosmodelos $videosmodelos) {
        $excludevideos = $videosmodelos->excluirvideo($request);
        if($excludevideos) {
            return redirect('admin/videos')->with('success','Video excluido com sucesso');
        }
        else {
            return redirect('admin/videos')->with('error','Ocorreu um erro ao excluir o video');
        }
    }

    public function excluirfoto(Request $request, fotosmodelos $fotosmodelos) {
        $excludefotos = $fotosmodelos->excluirfoto($request);
        if($excludefotos) {
            return redirect('admin/fotos')->with('success','Foto excluída com sucesso');
        }
        else {
            return redirect('admin/fotos')->with('error','Ocorreu um erro ao excluir a foto');
        }
    }

    public function salvarvideo(Request $request, videosmodelos $videosmodelos, auxiliares $aux) {
        $video = $request->file('video');
        
        $valida = $aux->testvideo($video);
        if ($valida == 'extensao') {
            
            return redirect()->back()->with('error','Aceito somente vídeos');
        }
        else if($valida == 'tamanho') {
            
            return redirect()->back()->with('error','Tamanho máximo permitido de 20MB');
        }
        else {
            if($videosmodelos->salvarvideo($request)) {
                return redirect('admin/videos')->with('success','Dados Salvos');
             }
             
        }
       
        
    }

    public function validartokenregistro(Request $request, acompanhantes $acompanhantes) {
        if($acompanhantes->validarToken($request)) {
           return redirect()->route('admin');
        }
        else {
            return redirect()->back()->with('error','A informação do token está incorreta');
        }
    }
    public function logout() {
        request()->session()->flush();
        return redirect()->route('login')->with('warning','Sessão encerrada');
    }
    public function fazerlogin(Request $request, acompanhantes $acompanhantes) {
        $validarlogin = $acompanhantes->loginacompanhante($request);
        if($validarlogin) {
            
            return redirect('admin');
        }
        else {
            return redirect()->back()->with('error','Informações incorretas');
        }
    } 
}
