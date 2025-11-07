<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Breed extends Model
{
    public $timestamps = false; // ✅ empêche Eloquent d'utiliser created_at / updated_at
    use HasFactory;


    public function animals()
    {
        return $this->belongsToMany(Animal::class, 'animals_breeds', 'breeds_id', 'animals_id');
    }
}
