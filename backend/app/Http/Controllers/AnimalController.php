<?php

namespace App\Http\Controllers;

use App\Models\Breed;
use App\Models\Animal;
use App\Models\Specie;
use App\Models\AnimalImage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnimalController extends Controller
{

    public function list()
    {


        $animals = Animal::select(
            'animals.*',
            'species.name as specie_name',
            'breeds.name as breed_name',
            'animal_images.filename as first_image'
        )
            ->join('species', 'animals.specie_id', '=', 'species.id')
            ->join('animals_breeds', 'animals_breeds.animals_id', '=', 'animals.id')
            ->join('breeds', 'animals_breeds.breeds_id', '=', 'breeds.id')
            ->leftJoin('animal_images', function ($join) {
                $join->on('animal_images.animal_id', '=', 'animals.id')
                    ->whereRaw('animal_images.id = (
                 SELECT id 
                 FROM animal_images 
                 WHERE animal_images.animal_id = animals.id 
                 ORDER BY `order` ASC, id ASC 
                 LIMIT 1
             )');
            })
            ->orderBy('animals.id')
            ->get();
        $animals->transform(function ($animal) {
            $animal->first_image_url = $animal->first_image
                ? asset('assets/' . $animal->first_image)
                : asset('assets/default.jpg');
            return $animal;
        });





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
        $animal->taille = $request->input('size');
        $animal->description = $request->input('description');
        $animal->status = $request->input('status');
        $animal->cat = $request->input('cat');
        $animal->dog = $request->input('dog');
        $animal->child = $request->input('child');
        /* if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();
            $filename = $originalName . '-' . Str::random(8)  . '.' . $extension;
            $file->move(public_path('assets'), $filename);
            $animal->thumbnail = $filename;}
        */

        if ($request->input('specie_id') == 3) {
            // Nouvelle espèce
            $new_specie_name = $request->input('new_specie');
            $specie = Specie::firstOrCreate(['name' => $new_specie_name]);
        } else {
            // Espèce existante
            $specie = Specie::find($request->input('specie_id'));
        }
        $animal->specie_id = $specie->id;
        $animal->save();

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                $extension = $file->getClientOriginalExtension();
                $filename = $originalName . '-' . Str::random(8) . '.' . $extension;

                $file->move(public_path('assets'), $filename);

                $animal->images()->create([
                    'filename' => $filename,
                    'order' => 0
                ]);
            }
        }



        $breeds_name = $request->input('breeds_name');
        $breed = Breed::where('name', $breeds_name)->first();
        if (!$breed) {
            $breed = new Breed();
            $breed->name = $breeds_name;
            $breed->save();
        }
        $animal->breeds()->attach($breed->id);
        return redirect()->route('animaux.list')->with('success', "L'animal {$animal->name} a bien été créé.");
    }
    public function edit($id)
    {
        $animal = Animal::with('images')->findOrFail($id);
        return view('animaux.edit', ['animal' => $animal]);
    }
    public function update(Request $request, $id)
    {
        $animal = Animal::findOrFail($id);
        $age = $request->input('age');
        $taille = $request->input('size');
        $description = $request->input('description');
        $status = $request->input('status');
        $cat = $request->has('ok_cat') ? true : false;
        $dog = $request->has('ok_dog') ? true : false;
        $child = $request->has('ok_kid') ? true : false;

        $animal->age = $age;
        $animal->taille = $taille;
        $animal->description = $description;
        $animal->status = $status;
        $animal->cat = $cat;
        $animal->dog = $dog;
        $animal->child = $child;
        /* if ($request->hasFile('thumbnail')) {
            // Supprimer l'ancienne image si elle existe
            if ($animal->thumbnail && file_exists(public_path($animal->thumbnail))) {
                unlink(public_path($animal->thumbnail));
            }


            $file = $request->file('thumbnail');
            $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();
            $filename = $originalName . '-' . Str::random(8)  . '.' . $extension;
            $filePath = 'assets/' . $filename;

            // Déplacer le fichier vers le répertoire public/assets
            $file->move(public_path('assets'), $filename);
            $animal->thumbnail = $filename;
        }*/
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                $extension = $file->getClientOriginalExtension();
                $filename = $originalName . '-' . Str::random(8) . '.' . $extension;

                $file->move(public_path('assets'), $filename);

                $animal->images()->create([
                    'filename' => $filename,
                    'order' => 0
                ]);
            }
        }
        if ($request->filled('delete_image_id')) {
            $image = AnimalImage::find($request->delete_image_id);
            if ($image) {
                $filePath = public_path('assets/' . $image->filename);
                if (file_exists($filePath)) unlink($filePath);
                $image->delete();
            }
        }
        if ($request->hasFile('replace_image')) {
            foreach ($request->file('replace_image') as $imgId => $file) {
                $image = AnimalImage::find($imgId);
                if ($image) {
                    // Supprimer ancien fichier
                    $oldFile = public_path('assets/' . $image->filename);
                    if (file_exists($oldFile)) unlink($oldFile);

                    // Déplacer nouveau fichier
                    $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                    $extension = $file->getClientOriginalExtension();
                    $filename = $originalName . '-' . Str::random(8) . '.' . $extension;
                    $file->move(public_path('assets'), $filename);

                    $image->update(['filename' => $filename]);
                }
            }
        }




        $animal->save();
        return redirect()->route('animaux.list')->with(
            'success',
            "L'animal a bien été modifié."
        );
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

    public function show($id)
    {
        $animal = Animal::findOrFail($id)
            ->join('animals_breeds', 'animals_breeds.animals_id', '=', 'animals.id')
            ->join('breeds', 'animals_breeds.breeds_id', '=', 'breeds.id')
            ->select('animals.*', 'breeds.name AS breed_name')
            ->where('animals.id', $id)

            ->get()
            ->map(function ($animal) {
                // 🔹 Récupère toutes les images associées à cet animal
                $images = DB::table('animal_images')
                    ->where('animal_id', $animal->id)
                    ->orderBy('order')
                    ->get()
                    ->map(function ($img) {
                        return asset('assets/' . $img->filename);
                    });

                // 🔹 Ajoute le tableau d'images et la première comme miniature
                $animal->images = $images;
                $animal->thumbnail = $images->first() ?? asset('assets/default.jpg');

                return $animal;
            });



        return response()->json($animal);
    }
}
