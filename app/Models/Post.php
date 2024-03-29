<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['titulo', 'contenido', 'categoria', 'descripcion'];

    public function pdfs()
    {
        return $this->hasMany(Pdf::class);
    }
}
