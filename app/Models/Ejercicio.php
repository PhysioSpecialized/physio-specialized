<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ejercicio extends Model
{
    use HasFactory;

    protected $table = 'ejercicios';

    protected $primaryKey = 'id_ejercicio';

    protected $fillable = [
        'nombre',
        'descripcion',
        'id_categoria',
    ];


    public function categoria()
	{
		return $this->belongsTo(Categoria::class, 'id_categoria');
	}

    public function archivos()
    {
    return $this->hasMany(ContenidoEjercicio::class, 'id_ejercicio');
    }

    public function getTotalArchivos()
    {
    return $this->archivos->count();
    }

}
