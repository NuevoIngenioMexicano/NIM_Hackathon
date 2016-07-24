<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model {
    protected $table = 'nim_trabajador_trabajos';
    public $timestamps = false;

    protected $fillable = ['nim_trabajadores_id', 'nim_trabajos_id', 'comentario', 'calificacion'];

    public function trabajador()
    {
        return $this->belongsTo('App\Trabajador', 'nim_trabajadores_id');
    }
}
