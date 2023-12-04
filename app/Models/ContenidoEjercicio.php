<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContenidoEjercicio extends Model
{
    use HasFactory;


    protected $table = 'contenido_ejercicio';

    protected $primaryKey = 'id_contenido';

    protected $fillable = [
        'contenido_path',
        'tipo_contenido',
        'id_ejercicio',
    ];


    public function ejercicio()
	{
		return $this->belongsTo(Ejercicio::class, 'id_ejercicio');
	}
}
