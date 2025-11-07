<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnimalImage extends Model
{
    protected $fillable = ['animal_id', 'filename', 'order'];

    public function animal()
    {
        return $this->belongsTo(Animal::class);
    }

    // Pour récupérer l’URL complète de l’image
    public function getUrlAttribute()
    {
        return asset('assets/' . $this->filename);
    }
}
