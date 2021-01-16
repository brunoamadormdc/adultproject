<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class fotosmodelos extends Model
{
    protected $table = 'fotosmodelos';
    protected $primaryKey = 'id_foto';
    public $incrementing = true;
    public $timestamps = true;
    protected $collection = 'fotosmodelos';


    public function getByid() 
    {
        return $this->where('id_modelo',session()->get('acompanhante')->id_modelo)->get();
    }
    
       public function excluirfoto($req) {
     
        $deletefoto= $this->where('id_foto',$req->id_foto);
        $deletefoto->delete();
        if($deletefoto) {
            
                $foto_path = public_path().$req->caminho;
                unlink($foto_path);
                return true;
        }
        else {
            return false;
        }
    }
    public function getFotos($id) {
        
        return $this->where('id_modelo',$id)->get();
        
    }

    public function salvarfoto($req) {
        $image = $req->file('fotogaleria');
        // Make a image name based on user name and current timestamp
        $name = Str::slug($req->nome).'_'.time().'_'.$req->id_modelo.'.'.$image->getClientOriginalExtension();
        // Define folder path
        $folder = '/fotos_galeria/';
        // Make a file path where image will be stored [ folder path + file name + file extension]
        $filePath = $folder . $name;
        // Upload image
    
        $upload = $image->storeAs($folder, $name, 'public');
        // Set user profile image path in database to filePath
        if($upload) {
            $salva = new fotosmodelos();
            $salva->caminho = $filePath;
            $salva->nome = $req->nome;
            $salva->id_modelo = $req->id_modelo;
            $salva->save();
            if($salva) {
             
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
}
