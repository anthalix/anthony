<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Specie extends Model

{
    public $timestamps = false; // ✅ empêche Eloquent d'utiliser created_at / updated_at

    protected $fillable = ['name'];
    public function animals()
    {
        return $this->hasMany(Animal::class);
    }
}
