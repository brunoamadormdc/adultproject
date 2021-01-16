<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class assinaturausuario extends Model
{
    protected $table = 'assinaturausuario';
    protected $primaryKey = 'id_assinatura';
    public $incrementing = true;
    public $timestamps = true;
    protected $collection = 'assinaturausuario';
}
