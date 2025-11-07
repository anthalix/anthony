<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Animal;

class DogController extends Controller
{
    public function list()
    {
        $dogs = DB::table('animals')
            ->join('animals_breeds', 'animals_breeds.animals_id', '=', 'animals.id')
            ->join('breeds', 'animals_breeds.breeds_id', '=', 'breeds.id')
            ->select('animals.*', 'breeds.name AS breed_name')
            ->where('specie_id', 1)
            ->whereIn('status', ['disponible', 'urgent'])
            ->orderByRaw("FIELD(animals.status, 'urgent', 'disponible')")
            ->get()
            ->map(function ($dog) {
                // 🔹 On récupère la première image associée à cet animal
                $firstImage = DB::table('animal_images')
                    ->where('animal_id', $dog->id)
                    ->orderBy('order')
                    ->first();

                // 🔹 Si une image existe → on ajoute son URL complète
                if ($firstImage) {
                    $dog->thumbnail = asset('assets/' . $firstImage->filename);
                } else {
                    // 🔹 Sinon → image par défaut
                    $dog->thumbnail = asset('assets/default.jpg');
                }

                return $dog;
            });

        return response()->json($dogs);
    }
}
