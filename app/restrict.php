<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class restrict extends Model
{
    protected $table = 'restrito';
    protected $primaryKey = 'id_restrict';
    public $incrementing = true;
    public $timestamps = true;
    protected $collection = 'restrito';

    public function register($req) {
      
        $check = $this->where('email', $req->email)->first();
        
        if($check == null) {
            $this->nome = $req->nome;
            $this->senha = Hash::make($req->senha);
            $this->email = $req->email;
            $this->token = Str::random(100);
            $this->validado = false;
            $this->save();
            request()->session()->put('emailrestrict', $req->email);
            request()->session()->put('senharestrict', $req->senha);
            return true;
        }
        else 
        {
            return false;
        }
        
         
 
     }
     /*
     public function getByCity($cidade) {
        
         return $this->where('cidade','LIKE', '%' . $cidade . '%')->get();
     }
 
    
     public function getDetalhe($id) {
         return $this->where('idusuario',$id)->first();
     }
     */
     public function salvardados($req) {
         if (isset($req->email)){
             $validaemail = $this
             ->where('email',$req->email)
             ->where('id_restrict','!=',$req->id_restrict)
             ->first();
            
             if ($validaemail == null) {
                 $savedata = $this->findOrfail($req->id_restrict);
                 $savedata->nome = $req->nome;
                 $savedata->email = $req->email;
                 
                 
                 $savedata->update();
             }
             else {
                 
                 return false;
             }
         }
         else {
             
             $savedata = $this->findOrfail($req->id_restrict);
             $savedata->nome = $req->nome;
             $savedata->email = $req->email;
             $savedata->update();
         }
         
         
        
 
         if($savedata) {
             $usuario = $this->where('id_restrict',$req->id_restrict)->first();
             session()->put('restrict',$usuario);
             return true;
         }
         else {
             return false;
         }
 
     } 
    
    
 
     public function loginrestrict($req) {
         $valida = $this->
         where('email',$req->email)
         ->first();
         if ($valida != null) {
             $senhavalid = Hash::check($req->senha, $valida->senha);
             if ($senhavalid) {
 
                 if($valida->validado == 1) {
                     request()->session()->put('restrict',$valida);
                     request()->session()->put('emailrestrict', $valida->email);
                     request()->session()->put('id_restrict', $valida->id_restrict);
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
            $valida = $this->findOrfail($acomp->id_restrict);
            $valida->validado = 1;
            $valida->update();
            
            request()->session()->put('restrict', $acomp);
            request()->session()->put('emailrestrict', $acomp->email);
            request()->session()->put('id_restrict',$acomp->id_restrict);
            
            return true;
        }
        else {
            return false;
        }
     
     }
}
