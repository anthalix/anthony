<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Animal;

class CatController extends Controller
{
  public function list()
  {

    $cats = DB::table('animals')
      ->join('animals_breeds', 'animals_breeds.animals_id', '=', 'animals.id')
      ->join('breeds', 'animals_breeds.breeds_id', '=', 'breeds.id')
      ->select('animals.*', 'breeds.name AS breed_name')
      ->where('specie_id', '2')

      ->whereIn('status', ['disponible', 'urgent'])
      ->orderByRaw("FIELD(animals.status, 'urgent', 'disponible')")
      ->get()
      ->map(function ($cat) {
        // 🔹 On récupère la première image associée à cet animal
        $firstImage = DB::table('animal_images')
          ->where('animal_id', $cat->id)
          ->orderBy('order')
          ->first();

        // 🔹 Si une image existe → on ajoute son URL complète
        if ($firstImage) {
          $cat->thumbnail = asset('assets/' . $firstImage->filename);
        } else {
          // 🔹 Sinon → image par défaut
          $cat->thumbnail = asset('assets/default.jpg');
        }

        return $cat;
      });




    return response()->json($cats);
  }
}
