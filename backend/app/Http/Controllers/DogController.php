<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Animal;

class DogController extends Controller
 {
 public function list()
    {

        $breedInfo = DB::table('animals')
        ->join('animal_breed', 'animal_breed.animal_id', '=', 'animals.id')
        ->join('breeds', 'animal_breed.breed_id', '=', 'breeds.id')
        ->select('animals.*', 'breeds.name AS breed_name')
        ->where('specie_id', '1')

        ->whereIn('status', ['Adoptable','SOS Urgent'])
        ->get();

        return response()->json($breedInfo);
    }



 }
