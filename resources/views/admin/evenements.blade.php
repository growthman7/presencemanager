@extends('layouts.dashboard')
@section('title', 'Gestion des événements - Tableau de bord')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">
        Listes des évènements
    </h1>
    {{-- Liste de tous les évènements en carte --}}
    <div class="grid md:grid-cols-3 gap-6">
        @foreach($evenements as $evenement)
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-xl font-bold mb-2">{{ $evenement->titre }}</h2>
                <p class="text-gray-600 mb-4">{{ $evenement->description }}</p>
                <p class="text-gray-600 mb-4">Lieu : {{ $evenement->lieu }}</p>
                <p class="text-gray-600 mb-4">Date : {{ $evenement->date }} à {{ $evenement->heure }}</p>
                <a href="{{ route('admin.evenements.show', $evenement->id) }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition duration-300 shadow-md hover:shadow-lg">
                    <i class="fas fa-eye mr-2"></i>Voir les présences
                </a>
            </div>
        @endforeach
    </div>
</div>
@endsection
