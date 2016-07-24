<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model {
    protected $table = 'nim_clientes';
    public $timestamps = false;

    protected $fillable = ['nombre', 'email', 'password', 'telefono', 'direccion', 'documento'];
}