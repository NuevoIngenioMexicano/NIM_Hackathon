<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oficio extends Model {
    protected $table = 'nim_oficios';
    public $timestamps = false;

    protected $fillable = ['oficio', 'nim_trabajadores_id'];
}