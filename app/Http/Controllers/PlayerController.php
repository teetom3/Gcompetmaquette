<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    public function index()
    {
        // Récupérer tous les utilisateurs (joueurs) depuis la base de données
        $players = User::all();

        // Retourner la vue avec les données des joueurs
        return view('players.index', compact('players'));
    }
}
