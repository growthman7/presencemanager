<?php

namespace App\Http\Controllers;

use \App\Models\Evenements;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EvenementsController extends Controller
{
    //
    public function index()
    {
        $evenements = Evenements::all();
        return view('admin.evenements', compact('evenements'));
    }

    public function show($id)
    {
        $evenement = Evenements::with('listes')->findOrFail($id);
        return view('admin.evenementshow', compact('evenement'));
    }

    public function store (Request $request)
    {
        $validator = Validator::make($request->all(), [
            'titre' => 'required|string|max:255',
            'description' => 'nullable|string',
            'lieu' => 'nullable|string|max:255',
            'date' => 'required|date',
            'heure' => 'required|date_format:H:i',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $validatedData = $validator->validated();
        $evenement = Evenements::create($validatedData);
        $url = route('evenement.show', ['id' => $evenement->id]);
        // dd($uri);
        return redirect()->back()->with([
            'success' => true,
            'uri' => $url
        ]);
    }
}
