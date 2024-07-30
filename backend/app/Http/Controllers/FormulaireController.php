<?php

namespace App\Http\Controllers;

use App\Models\Forms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FormulaireController extends Controller
 {

    public function list()
    {
        $forms = Forms::all();

        return view('formulaire.forms', ['forms' => $forms]);
    }

    public function read($id)
     {
        // Utilisation de la méthode find() grâce à l'héritage
        $form = Forms::findOrFail($id);

        return view('formulaire.read', ['form' => $form]);

     }

    public function create(Request $request)
     {

         // Ici j'ai Remplacé l'insertion directe par l'utilisation d'Eloquent, lequel utilise de
        //  requêtes préparées pour protéger contre les attaques XSS :
        Forms::create([
            'lastname' => $request->input('lastname'),
            'firstname' => $request->input('firstname'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'adress' => $request->input('adress'),
            'zip_code' => $request->input('zip_code'),
            'city' => $request->input('city'),
            'message' => $request->input('message'),
        ]);

        return response()->json(["Votre formulaire a bien été envoyé."]);
     }


    public function delete($id)
     {
        // 1. on récupère l'objet à supprimer
        $form = Forms::find($id);

        // 2. on le supprime en appelant sa méthode delete()
        $form->delete();

        // on essaye quand même de retourner le $type
        return redirect()->route('formulaire.forms')->with('success', "Votre formulaire a bien été supprimé.");
     }

 }
