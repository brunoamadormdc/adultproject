<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class videoscomprados extends Model
{
    protected $table = 'videoscomprados';
    protected $primaryKey = 'id_videocomprado';
    public $incrementing = true;
    public $timestamps = true;
    protected $collection = 'videoscomprados';
    
    public function getByUser($iduser,$idmodelo) {
    return $this
           ->where('id_usuario',$iduser)
           ->where('id_modelo',$idmodelo)
           ->get(); 
}
    
    
}


