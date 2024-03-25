<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    protected $table = 'animals';

protected $fillable = ['pictures'];


    public function species()
    {
        return $this->belongsTo(Specie::class, 'species_id');

    }

    public function breeds()
    {
        return $this->belongsToMany(Breed::class, 'animal_breed');
    }
}


