<?php

namespace App\Http\Controllers;

use App\Models\Liste;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ListeController extends Controller
{
    //
    public function index()
    {
        $listes = Liste::all();
        // return view('admin.evenements', compact('listes'));
    }

    public function store(Request $request)
    {
        // Validation des données
        $validator = Validator::make($request->all(), [
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'evenement_id' => 'required|exists:evenements,id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Récupération des données validées
        $validatedData = $validator->validated();
        $presence = Liste::create($validatedData);
        return redirect()->back()->with([
            'success' => true,
            'message' => 'Votre présence a été enregistrée avec succès !'
            ]);
    }
}
