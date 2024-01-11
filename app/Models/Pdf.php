<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pdf extends Model
{
    use HasFactory;

    protected $fillable = ['post_id', 'nombre_archivo', 'url'];

    // Relación con la tabla posts
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
