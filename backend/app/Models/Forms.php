<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forms extends Model
{
    use HasFactory;

    protected $table = 'forms';


    public static function supprimerDonnéesExpirées()
    {

        $periodeConservation = 365;
        $dateLimite = now()->subDays($periodeConservation);

        forms::where('created_at', '<', $dateLimite)-> delete();
    }
}
