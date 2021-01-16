<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categoriamodelo extends Model
{
    protected $table = 'categoriamodelo';
    protected $primaryKey = 'id_categoriamodelo';
    public $incrementing = true;
    public $timestamps = true;
    protected $collection = 'categoriamodelo';

    public function getAll() {
        return $this->get();
    }
}
