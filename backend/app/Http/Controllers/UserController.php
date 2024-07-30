<?php

namespace App\Http\Controllers;

use App\Mail\FormMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
 { 
 public function list()
    {
        $users= User::all();

        return view('users.users-list', ['users' => $users]);
    }
 public function delete($id){

    $user = User::find($id);

    $user->delete();

    return redirect()->route('users.list')->with('success', "Votre {$user->name} a bien été supprimé.");
 }

 }
