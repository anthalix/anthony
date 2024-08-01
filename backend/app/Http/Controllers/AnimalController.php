<?php

namespace App\Http\Controllers;

use App\Models\Breed;
use App\Models\Animal;
use App\Models\Specie;
use Illuminate\Http\Request;
use Illuminate\Support\Str; 
use Illuminate\Support\Facades\DB;

class AnimalController extends Controller
 {

   public function list()
    {
        $animals = DB::table('animals')
            ->join('species', 'animals.specie_id', '=', 'species.id')
            ->join('animal_breed', 'animal_breed.animal_id', '=', 'animals.id')
            ->join('breeds', 'animal_breed.breed_id', '=', 'breeds.id')
            ->select('animals.*', 'species.name as specie_name', 'breeds.name as breed_name')
            ->orderBy('animals.id')
            ->get();

        //return($animals);
        return view('animaux.list', ['animaux' => $animals]);
    }
   public function showAddForm()
    {
        return view('animaux.add');
    }
   public function add(Request $request)
    {
        $animal = new Animal();
        $animal->name = $request->input('name');
        $animal->specie_id = $request->input('specie_id');
        $animal->age = $request->input('age');
        $animal->sex = $request->input('sex');
        $animal->size = $request->input('size');
        $animal->description = $request->input('description');
        $animal->status = $request->input('status');
        $animal->ok_cat = $request->input('ok_cat');
        $animal->ok_dog = $request->input('ok_dog');
        $animal->ok_kid = $request->input('ok_kid');
        $animal->name_of_adopter = $request->input('name_of_adopter');

        

        if ($request->hasFile('pictures')) {
           
            $file = $request->file('pictures');
            $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();
            $filename = $originalName . '-' . Str::random(0)  . '.' . $extension;
            $filePath = 'assets/' . $filename;


            $file->move(public_path('assets'), $filename);

            $animal->pictures = $filePath;
            }
            if ($request->hasFile('pictures2')) {
           
                $file = $request->file('pictures2');
                $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                $extension = $file->getClientOriginalExtension();
                $filename = $originalName . '-' . Str::random(0)  . '.' . $extension;
                $filePath = 'assets/' . $filename;
    
    
                $file->move(public_path('assets'), $filename);
    
                $animal->pictures2 = $filePath;
            }
            if ($request->hasFile('pictures3')) {
           
                $file = $request->file('pictures3');
                $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                $extension = $file->getClientOriginalExtension();
                $filename = $originalName . '-' . Str::random(0)  . '.' . $extension;
                $filePath = 'assets/' . $filename;
    
    
                $file->move(public_path('assets'), $filename);
    
                $animal->pictures3 = $filePath;
            }

            $new_specie_name = $request->input('new_specie');

            // Vérifier et créer l'espèce si elle n'existe pas
            $specie = Specie::where('name', $new_specie_name)->first();
            if (!$specie) {
                $specie = new Specie();
                $specie->name = $new_specie_name;
                $specie->save();
            }
        
            // Assigner l'ID de l'espèce à l'animal
            $animal->specie_id = $specie->id;

        $animal->save();


        $breed_name = $request->input('breed_name');
        $breed = Breed::where('name', $breed_name)->first();
        if (!$breed) {
            $breed = new Breed();
            $breed->name = $breed_name;
            $breed->save();
        }
        $animal->breeds()->attach($breed->id);
        return redirect()->route('animaux.list')->with('success', "L'animal {$animal->name} a bien été créé.");

    }
   public function edit($id)
    {
        $animal = DB::table('animals')
            ->join('species', 'animals.specie_id', '=', 'species.id')
            ->select('animals.*', 'species.name as specie_name')
            ->where('animals.id', '=', $id)
            ->first();
        return view('animaux.edit', ['animal' => $animal]);
    }
   public function update(Request $request, $id)
    {
        $animal = Animal::findOrFail($id);
        $age = $request->input('age');
        $size = $request->input('size');
        $description = $request->input('description');
        $status = $request->input('status');
        $ok_cat = $request->has('ok_cat') ? true : false;
        $ok_dog = $request->has('ok_dog') ? true : false;
        $ok_kid = $request->has('ok_kid') ? true : false;
        $name_of_adopter = $request->input('name_of_adopter');

        $animal->age = $age;
        $animal->size = $size;
        $animal->description = $description;
        $animal->status = $status;
        $animal->ok_cat = $ok_cat;
        $animal->ok_dog = $ok_dog;
        $animal->ok_kid = $ok_kid;
        $animal->name_of_adopter = $name_of_adopter;
        if ($request->hasFile('pictures')) {
            // Supprimer l'ancienne image si elle existe
            if ($animal->pictures && file_exists(public_path($animal->pictures))) {
                unlink(public_path($animal->pictures));
            }

            
            $file = $request->file('pictures');
            $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();
            $filename = $originalName . '-' . Str::random(0)  . '.' . $extension;
            $filePath = 'assets/' . $filename;

            // Déplacer le fichier vers le répertoire public/assets
            $file->move(public_path('assets'), $filename);
            $animal->pictures = $filePath;

        }
        if ($request->hasFile('pictures2')) {
            // Supprimer l'ancienne image si elle existe
            if ($animal->pictures && file_exists(public_path($animal->pictures))) {
                unlink(public_path($animal->pictures));
            }

            
            $file = $request->file('pictures2');
            $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();
            $filename = $originalName . '-' . Str::random(0)  . '.' . $extension;
            $filePath = 'assets/' . $filename;

            // Déplacer le fichier vers le répertoire public/assets
            $file->move(public_path('assets'), $filename);
            $animal->pictures2 = $filePath;

        }
        if ($request->hasFile('pictures3')) {
            // Supprimer l'ancienne image si elle existe
            if ($animal->pictures && file_exists(public_path($animal->pictures))) {
                unlink(public_path($animal->pictures));
            }

            
            $file = $request->file('pictures3');
            $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();
            $filename = $originalName . '-' . Str::random(0)  . '.' . $extension;
            $filePath = 'assets/' . $filename;

            // Déplacer le fichier vers le répertoire public/assets
            $file->move(public_path('assets'), $filename);
            $animal->pictures3 = $filePath;

        }

        $animal->save();
        return redirect()->route('animaux.list')->with(
            'success',
            "L'animal a bien été modifié."
        );
    }
   public function show($id)
    {
        $breedInfo = DB::table('animals')
            ->join('animal_breed', 'animal_breed.animal_id', '=', 'animals.id')
            ->join('breeds', 'animal_breed.breed_id', '=', 'breeds.id')
            ->select('animals.*', 'breeds.name AS breed_name')
            ->where('animals.id', $id)
            ->get();
        return response()->json($breedInfo);
    }

    public function findBreed()
    {

        $breed =  Breed::All();
        return response()->json($breed);
    }
    public function delete($id)
    {
        $animal = Animal::findOrFail($id);
        $animal->delete();
        return redirect()->route('animaux.list')->with('success', "Votre {$animal->type} a bien été supprimé.");
    }

 }
