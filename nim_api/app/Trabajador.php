<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trabajador extends Model {
    protected $table = 'nim_trabajadores';
    public $timestamps = false;

    protected $fillable = ['nombre', 'telefono', 'direccion', 'documento', 'experiencia'];

    public function trabajos()
    {
        return $this->hasMany('App\Review');
    }
}