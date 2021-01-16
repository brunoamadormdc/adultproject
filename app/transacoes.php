<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class transacoes extends Model
{
    protected $table = 'transacoes';
    protected $primaryKey = 'id_transacao';
    public $incrementing = true;
    public $timestamps = true;
    protected $collection = 'transacoes';
}
