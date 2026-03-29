@extends('layouts.dashboard')
@section('title', 'Gestion des événements - Tableau de bord')
@section('content')
{{-- Liste de toutes les personnes présentes à un événement --}}
<div class="bg-white rounded-2xl shadow-xl p-8 min-h-screen">
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-2">
            Présences pour l'événement : {{ $evenement->titre }}
        </h1>
        <p class="text-gray-600">
            {{ $evenement->description }}
        </p>
        <p class="text-gray-600">
            Lieu : {{ $evenement->lieu }}
        </p>
        <p class="text-gray-600">
            Date : {{ $evenement->date }} à {{ $evenement->heure }}
        </p>
    </div>

    <div>
        {{-- Tableau des présences --}}
        <table class="min-w-full bg-white rounded-lg shadow-md">
            <thead>
                <tr>
                    <th class="py-3 px-6 bg-gray-200 text-left text-sm font-semibold text-gray-700 uppercase tracking-wider">Nom</th>
                    <th class="py-3 px-6 bg-gray-200 text-left text-sm font-semibold text-gray-700 uppercase tracking-wider">Prénom</th>
                    <th class="py-3 px-6 bg-gray-200 text-left text-sm font-semibold text-gray-700 uppercase tracking-wider">Email</th>
                    <th class="py-3 px-6 bg-gray-200 text-left text-sm font-semibold text-gray-700 uppercase tracking-wider">Date de présence</th>
                </tr>
            </thead>
            <tbody>
                @foreach($evenement->listes as $presence)
                    <tr class="border-b hover:bg-gray-50 transition duration-200">
                        <td class="py-4 px-6">{{ $presence->nom }}</td>
                        <td class="py-4 px-6">{{ $presence->prenom }}</td>
                        <td class="py-4 px-6">{{ $presence->email }}</td>
                        <td class="py-4 px-6">{{ $presence->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
