<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class planos extends Model
{
    protected $table = 'planos';
    protected $primaryKey = 'id_plano';
    public $incrementing = true;
    public $timestamps = true;
    protected $collection = 'planos';
}
