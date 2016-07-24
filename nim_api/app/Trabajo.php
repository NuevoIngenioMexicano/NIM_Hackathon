<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trabajo extends Model {
    protected $table = 'nim_trabajos';
    public $timestamps = false;

    protected $fillable = ['nim_clientes_id', 'fecha_publicacion', 'fecha_expiracion', 'status'];
}