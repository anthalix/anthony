<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    protected $table = 'animals';

    protected $fillable =
    [
        'description',
        'status',
        'thumbnail',
        'child',
        'cat',
        'dog'
    ];

    protected $appends = ['thumbnail_url'];

    public function getThumbnailUrlAttribute()
    {
        // Si l’animal n’a pas de thumbnail → image par défaut
        if (!$this->thumbnail) {
            return asset('assets/default.jpg');
        }

        // Si c’est déjà une URL complète, on la renvoie telle quelle
        if (str_starts_with($this->thumbnail, 'http')) {
            return $this->thumbnail;
        }

        // Sinon on construit l’URL complète
        return asset('assets/' . $this->thumbnail);
    }



    public function species()
    {


        return $this->belongsTo(Specie::class, 'species_id');
    }

    public function breeds()
    {
        return $this->belongsToMany(Breed::class, 'animals_breeds', 'animals_id', 'breeds_id');
    }
    public function images()
    {
        return $this->hasMany(AnimalImage::class)->orderBy('order');
    }
}
