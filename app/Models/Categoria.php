<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $table = 'categorias'; // Nombre de la tabla en la base de datos

    protected $primaryKey = 'id_categoria'; // Nombre de la clave primaria en la tabla

    protected $fillable = [
        'nombre_categoria',
        'color_encabezado',
        'img_path',
    ];

    // Si no quieres que se guarden las marcas de tiempo `created_at` y `updated_at`
    public $timestamps = true;
}
