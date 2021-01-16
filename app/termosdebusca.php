<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class termosdebusca extends Model
{
    protected $table = 'termosdebusca';
    protected $primaryKey = 'id_termo';
    public $incrementing = true;
    public $timestamps = true;
    protected $collection = 'termosdebusca';
}
