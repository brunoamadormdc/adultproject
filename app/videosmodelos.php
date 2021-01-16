<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class videosmodelos extends Model
{
    protected $table = 'videosmodelos';
    protected $primaryKey = 'id_videomodelo';
    public $incrementing = true;
    public $timestamps = true;
    protected $collection = 'videosmodelos';

    public function getByid() 
    {
        return $this->where('id_modelo',session()->get('acompanhante')->id_modelo)->get();
    }
    
    public function excluirvideo($req) {
     
        $deletevideo = $this->where('id_videomodelo',$req->id_videomodelo);
        $deletevideo->delete();
        if($deletevideo) {
                
                if ($req->fotocapa != null) {
                    $foto_path = public_path().$req->fotocapa;
                    unlink($foto_path);
                }
                $video_path = public_path().$req->caminho;
                unlink($video_path);
                return true;
        }
        else {
            return false;
        }
    }
    public function getVideos($id) {
        
        return $this->where('id_modelo',$id)->get();
        
    }
    public function salvarvideo($req) {
        $image = $req->file('video');
        // Make a image name based on user name and current timestamp
        $name = Str::slug($req->nome).'_'.time().'_'.$req->id_modelo.'.'.$image->getClientOriginalExtension();
        // Define folder path
        $folder = '/videos_galeria/';
        // Make a file path where image will be stored [ folder path + file name + file extension]
        $filePath = $folder . $name;
        // Upload image
    
        $upload = $image->storeAs($folder, $name, 'public');
        if($req->file('fotocapa') != null) {
        $fotocapa = $req->file('fotocapa');
        $namecapa = Str::slug($req->nome).'_'.time().'_'.$req->id_modelo.'.'.$fotocapa->getClientOriginalExtension(); 
        $foldercapa = '/capas_videos/';
        $filePathcapa = $foldercapa . $namecapa;
        $uploadcapa = $fotocapa->storeAs($foldercapa, $namecapa, 'public');
        }
        else {
            $filePathcapa = null;
        }
      
       
        // Set user profile image path in database to filePath
        if($upload) {
            $salva = new videosmodelos();
            $salva->caminho = $filePath;
            $salva->fotocapa = $filePathcapa;
            $salva->nome = $req->nome;
            if($req->creditos == 0 || $req->creditos == null) {
                $salva->creditos = 0;
            }
            else {
                $salva->creditos = $req->creditos;
            }
            $salva->creditos = $req->creditos;
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
