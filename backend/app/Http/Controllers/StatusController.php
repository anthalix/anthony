<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class StatusController extends Controller
{
    public function list()
    {
        // récupérer toutes les tâches en BDD
        $breedInfo = DB::table('animals')
        ->join('animal_breed', 'animal_breed.animal_id', '=', 'animals.id')
        ->join('breeds', 'animal_breed.breed_id', '=', 'breeds.id')
        ->select('animals.*', 'breeds.name AS breed_name')

        ->where('status', 'Adopté')
        ->get();

        return response()->json($breedInfo);
        // retourner cette liste d'animaux déjà adoptés au format JSON
        //* Laravel, quand il voit qu'on retourne un tableau dans une méthode de contrôleur va comprendre qu'on cherche à faire une API, et va automatiquement convertir le tableau en JSON.
    }

    public function adoptAnimal($id)
    {
        // Trouver l'animal par son ID
        $animal = Animal::find($id);

        if ($animal) {
            // Mettre à jour le statut de l'animal
            $animal->status = 'Adopté';
            $animal->save();
        }
    }


    public function show($id)
    {
    // Utilisation du Query Builder pour récupérer l'animal avec le filtre 'status' égal à 'adopted'
    $animal = DB::table('animals')
        ->where('id', $id)
        ->where('specie_id', 1) // Assurez-vous que vous avez toujours besoin de ce filtre
        ->where('status', 'Adopté')
        ->first();

    // si l'animal n'a pas été trouvé, $animal sera null
    if (is_null($animal)) {
        // le chien n'a pas été trouvé ou n'est pas 'adopted', on renvoie une 404
        return Response("Aucun animal n'a été trouvé ou n'est pas 'Adopté'", 404);
    }

    // Retour automatique au format JSON
    return $animal;
    }

}

