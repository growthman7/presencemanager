@extends('layouts.app')
@section('title', 'Détails de l\'événement')

@section('content')
<div class="bg-white rounded-2xl shadow-xl p-8 min-h-screen">

    @if(!session('success'))
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-800 mb-2">
                Marquer sa présence  : {{ $evenement->titre }}
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
        <form id="" method="POST" action="{{ route('liste.store') }}" class="space-y-6">
            @csrf
            <input type="hidden" name="evenement_id" value="{{ request()->route('id') }}">
            <!-- Nom -->
            <div>
                <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">
                    Nom *
                </label>
                <input type="text"
                        id="name"
                        name="nom"
                        required
                        class="form-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition duration-200"
                        placeholder="Entrer votre nom">
            </div>

            <!-- prenom -->
            <div>
                <label for="prenom" class="block text-sm font-semibold text-gray-700 mb-2">
                    Prénom
                </label>
                <input type="text"
                        id="name"
                        name="prenom"
                        required
                        class="form-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition duration-200"
                        placeholder="Entrer votre prénom">
            </div>

            <!-- email -->
            <div>
                <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                    email *
                </label>
                <input type="email"
                        id="email"
                        name="email"
                        required
                        class="form-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition duration-200"
                        placeholder="Entrer votre email">
            </div>

            <!-- Bouton de création -->
            <button type="submit"
                    class="w-full bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-semibold py-3 px-6 rounded-lg hover:from-blue-700 hover:to-indigo-700 transition duration-300 transform hover:scale-105 shadow-lg">
                Soumettre
            </button>
        </form>
    @else
        <div id="qrCodeSection" class="">
            <div class="qr-code-container sticky top-24">
                <div class="text-center mb-6">
                    <i class="fas fa-check-circle text-4xl mb-3"></i>
                    <h2 class="text-2xl font-bold">Vous participez à cette évènement !</h2>
                </div>

                <div class="mt-6 text-center text-sm">
                    <i class="fas fa-info-circle mr-1"></i>
                    Vous pouvez fermer cette fenêtre, votre présence a été enregistrée avec succès !
                </div>
            </div>
        </div>
    @endif
</div>
@endsection
