<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class usuario extends Model
{
    protected $table = 'usuario';
    protected $primaryKey = 'id_usuario';
    public $incrementing = true;
    public $timestamps = true;
    protected $collection = 'usuario';

    public function register($req) {
       
        $check = $this->where('email', $req->email)->first();
        
        if($check == null) {
            $this->nome = $req->nome;
            $this->senha = Hash::make($req->senha);
            $this->email = $req->email;
            $this->creditos = 0;
            $this->token = Str::random(100);
            $this->validado = false;
            $this->save();
            request()->session()->put('emailusuario', $req->email);
            request()->session()->put('senhausuario', $req->senha);
            return true;
        }
        else 
        {
            return false;
        }
        
         
 
     }
     
     public function getByCity($cidade) {
        
         return $this->where('cidade','LIKE', '%' . $cidade . '%')->get();
     }
 
    
     public function getDetalhe($id) {
         return $this->where('idusuario',$id)->first();
     }
     
     public function salvardados($req) {
         if (isset($req->email)){
             $validaemail = $this
             ->where('email',$req->email)
             ->where('id_usuario','!=',$req->id_usuario)
             ->first();
            
             if ($validaemail == null) {
                 $savedata = $this->findOrfail($req->id_usuario);
                 $savedata->nome = $req->nome;
                 $savedata->email = $req->email;
                 $savedata->cidade = $req->cidade;
                 
                 $savedata->update();
             }
             else {
                 
                 return false;
             }
         }
         else {
             
             $savedata = $this->findOrfail($req->id_usuario);
             $savedata->nome = $req->nome;
             $savedata->email = $req->email;
             $savedata->cidade = $req->cidade;
                 $savedata->update();
         }
         
         
        
 
         if($savedata) {
             $usuario = $this->where('id_usuario',$req->id_usuario)->first();
             session()->put('usuario',$usuario);
             return true;
         }
         else {
             return false;
         }
 
     }
    
 
     public function loginusuario($req) {
         $valida = $this->
         where('email',$req->email)
         ->first();
         if ($valida != null) {
             $senhavalid = Hash::check($req->senha, $valida->senha);
             if ($senhavalid) {
 
                 if($valida->validado == 1) {
                     request()->session()->put('usuario',$valida);
                     request()->session()->put('emailusuario', $valida->email);
                     request()->session()->put('id_usuario', $valida->id_usuario);
                     return true;
                 }
                 else {
                     return redirect()->back()->with('error','Seu usuário não está validado');
                 }
             }
             else {
                 return false;
             }
         }
         else {
             return false;
         }
     }
 
   
     public function validarToken($req) {
         $acomp = $this
         ->where('token',$req->token)
         ->first();
        if ($acomp != null) {
            $valida = $this->findOrfail($acomp->id_usuario);
            $valida->validado = 1;
            $valida->update();
            
            request()->session()->put('usuario', $acomp);
            request()->session()->put('emailusuario', $acomp->email);
            request()->session()->put('id_usuario',$acomp->id_usuario);
            
            return true;
        }
        else {
            return false;
        }
     
     }
}
