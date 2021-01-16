<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
class videos extends Model
{
    
    protected $table = 'videos';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = true;
    protected $collection = 'restaurantes';
   

    public function getCategories() {
        return  DB::table('videos')->select('categoria')->groupBy('categoria')->distinct()->take(40)->get();
    }

    public function getAll() {
        
        return  DB::table('videos')->select('thumbnail','id','titulo')->orderBy('created_at','DESC')->take(27)->get();
    }
    
    public function getAllAdmin() {
        return $this->orderBy('categoria','ASC')->paginate(20)->appends(request()->query());
    }

    public function getTen($campo,$campo2) {
        return  DB::table('videos')->where($campo,$campo2)->take(10);
    }
    public function getDetalhe($id) {
        return $this->where('id',$id)->first();
    }
    public function excluirVideo($req) {
        $video = $this->findorfail($req->id);
        $deletar = $video->delete();
        if($deletar) {
            return true;
        }
        else {
            return false;
        }
        
    }
    
    public function editarVideo($req) {
        
        $video = $this->findorfail($req->id);
        $video->link = $req->link;
         $video->titulo = $req->titulo;
        $video->tags = $req->tags;
        $video->iframe = $req->iframe;
        $update = $video->update();
        if($update) {
            return true;
        }
        else {
            return false;
        }
        
    }
    public function getPorcategoria($nomecategoria) {
        return DB::table('videos')->where('categoria',$nomecategoria)
        ->orWhere('tags','LIKE', '%' . $nomecategoria . '%')
        ->orWhere('categoria','LIKE', '%' . $nomecategoria . '%')
        ->paginate(18)->appends(request()->query());
        ;
    }

    public function salvarVideo($req) {
        $image = $req->file('thumbnail');
        // Make a image name based on user name and current timestamp
        $name = Str::slug($req->nome).'_'.time().'_'.$req->id.'.'.$image->getClientOriginalExtension();
        // Define folder path
        $folder = '/thumbvideos/';
        // Make a file path where image will be stored [ folder path + file name + file extension]
        $filePath = $folder . $name;
        // Upload image
    
        $upload = $image->storeAs($folder, $name, 'public');
       
        // Set user profile image path in database to filePath
        if($upload) {
            $salva = new videos();
            $salva->link = $req->link;
            $salva->iframe = $req->iframe;
            $salva->thumbnail = $filePath;
            $salva->titulo = $req->titulo;
            $salva->tempo = $req->tempo;
            $salva->tags = $req->tags;
            $salva->tags2 = $req->tags;
            $salva->categoria = $req->categoria;
            $salva->id_site = 'videoproprio';
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
    
    public function getBusca($termo) {
        return  DB::table('videos')
        ->where('titulo','LIKE', '%' . $termo . '%')
        ->orWhere('tags','LIKE', '%' . $termo . '%')
        ->orWhere('categoria','LIKE', '%' . $termo . '%')
        ->paginate(18);
        
    }
}
