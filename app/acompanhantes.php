<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
class acompanhantes extends Model
{
    protected $table = 'acompanhantes';
    protected $primaryKey = 'id_modelo';
    public $incrementing = true;
    public $timestamps = true;
    protected $collection = 'acompanhantes';

    public function register($req) {
       
       $check = $this->where('email', $req->email)->first();
       
       if($check == null) {
           $this->nome = $req->nome;
           $this->senha = Hash::make($req->senha);
           $this->email = $req->email;
           $this->token = Str::random(100);
           $this->id_plano = 1;
           $this->validado = false;
           $this->save();
           request()->session()->put('email', $req->email);
           request()->session()->put('senha', $req->senha);
           return true;
       }
       else 
       {
           return false;
       }
       
        

    }
    
    public function getByid($id) {
       return $this->findorfail($id);
    }
    
    public function getByCity($cidade) {
       
        return $this->where('cidade','LIKE', '%' . $cidade . '%')->get();
    }

    public function uploadofotoperfil(Request $request) {

    }
    public function getDetalhe($id) {
        return $this->where('id_modelo',$id)->first();
    }
    
    public function salvardados($req) {
        if (isset($req->email)){
            $validaemail = $this
            ->where('email',$req->email)
            ->where('id_modelo','!=',$req->id_modelo)
            ->first();
           
            if ($validaemail == null) {
                $savedata = $this->findOrfail($req->id_modelo);
                $savedata->nome = $req->nome;
                $savedata->email = $req->email;
                $savedata->endereco = $req->endereco;
                $savedata->numero = $req->numero;
                $savedata->estado = $req->estado;
                $savedata->cidade = $req->cidade;
                $savedata->bairro = $req->bairro;
                $savedata->titulo = $req->titulo;
                $savedata->whatsapp = $req->whatsapp;
                $savedata->descricao = $req->descricao;
                $savedata->id_categoriamodelo = $req->id_categoriamodelo;
                $savedata->update();
            }
            else {
                
                return false;
            }
        }
        else {
            $savedata = $this->findOrfail($req->id_modelo);
                $savedata->nome = $req->nome;
                $savedata->email = $req->email;
                $savedata->endereco = $req->endereco;
                $savedata->numero = $req->numero;
                $savedata->estado = $req->estado;
                $savedata->cidade = $req->cidade;
                $savedata->bairro = $req->bairro;
                $savedata->titulo = $req->titulo;
                $savedata->whatsapp = $req->whatsapp;
                $savedata->descricao = $req->descricao;
                $savedata->id_categoriamodelo = $req->id_categoriamodelo;
                $savedata->update();
        }
        
        
       

        if($savedata) {
            $modelo = $this->where('id_modelo',$req->id_modelo)->first();
            session()->put('acompanhante',$modelo);
            return true;
        }
        else {
            return false;
        }

    }
    public function salvarinfospessoais($req) {
       
           
            
                $savedata = $this->findOrfail($req->id_modelo);
                $savedata->aparencia = $req->aparencia;
                $savedata->olhos = $req->olhos;
                $savedata->peso = $req->peso;
                $savedata->pes = $req->pes;
                $savedata->idade = $req->idade;
                $savedata->manequim = $req->manequim;
                $savedata->busto = $req->busto;
                $savedata->cintura = $req->cintura;
                $savedata->quadril = $req->quadril;
                $savedata->idiomas = $req->idiomas;
                $savedata->bjoboca = $req->bjoboca;
                $savedata->oral = $req->oral;
                $savedata->atendecasais = $req->atendecasais;
                $savedata->fetiches = $req->fetiches;
                $savedata->localproprio = $req->localproprio;
                $savedata->silicone = $req->silicone;
                $savedata->ativa = $req->ativa;
                $savedata->passiva = $req->passiva;
                $savedata->suruba = $req->suruba;
                $savedata->anal = $req->anal;
                $savedata->observacoes = $req->observacoes;
                $savedata->sado = $req->sado;
                $savedata->update();
           
            
        
        
       

        if($savedata) {
            $modelo = $this->where('id_modelo',$req->id_modelo)->first();
            session()->put('acompanhante',$modelo);
            return true;
        }
        else {
            return false;
        }

    }
    public function salvarfotoperfil($req) {
            if(isset($req->foto) && $req->foto != null) {
                $image_path = public_path().$req->foto;
                unlink($image_path);
            } 
            $image = $req->file('fotoperfil');
            // Make a image name based on user name and current timestamp
            $name = Str::slug($req->nome).'_'.time().'_'.$req->id_modelo.'.'.$image->getClientOriginalExtension();
            // Define folder path
            $folder = '/imagensperfil/';
            // Make a file path where image will be stored [ folder path + file name + file extension]
            $filePath = $folder . $name;
            // Upload image
        
            $upload = $image->storeAs($folder, $name, 'public');
            // Set user profile image path in database to filePath
            if($upload) {
                $salva = $this->findOrfail($req->id_modelo);
                $salva->foto = $filePath;
                $salva->update();
                if($salva) {
                    $modelo = $this->where('id_modelo',$req->id_modelo)->first();
                    session()->put('acompanhante',$modelo);
                    return true;
                }
                else {
                    return false;
                }
            }
            else {
                return false;
            }
            
       
    }

    public function salvarfotocapa($req) {
        if(isset($req->foto) && $req->foto != null) {
            $image_path = public_path().$req->foto;
            unlink($image_path);
        } 
        $image = $req->file('fotocapa');
        // Make a image name based on user name and current timestamp
        $name = Str::slug($req->nome).'_'.time().'_'.$req->id_modelo.'.'.$image->getClientOriginalExtension();
        // Define folder path
        $folder = '/imagenscapa/';
        // Make a file path where image will be stored [ folder path + file name + file extension]
        $filePath = $folder . $name;
        // Upload image
    
        $upload = $image->storeAs($folder, $name, 'public');
        // Set user profile image path in database to filePath
        if($upload) {
            $salva = $this->findOrfail($req->id_modelo);
            $salva->fotocapa = $filePath;
            $salva->update();
            if($salva) {
                $modelo = $this->where('id_modelo',$req->id_modelo)->first();
                session()->put('acompanhante',$modelo);
                return true;
            }
            else {
                return false;
            }
        }
        else {
            return false;
        }
        
   
}
    public function loginacompanhante($req) {
        $valida = $this->
        where('email',$req->email)
        ->first();
        if ($valida != null) {
            $senhavalid = Hash::check($req->senha, $valida->senha);
            if ($senhavalid) {

                if($valida->validado == 1) {
                    request()->session()->put('acompanhante',$valida);
                    request()->session()->put('email', $valida->email);
                    request()->session()->put('id_modelo', $valida->id_modelo);
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
           $valida = $this->findOrfail($acomp->id_modelo);
           $valida->validado = 1;
           $valida->update();
           request()->session()->put('acompanhante', $acomp);
           request()->session()->put('email', $acomp->email);
           request()->session()->put('id_modelo',$acomp->id_modelo);
           return true;
       }
       else {
           return false;
       }
    
    }
}
