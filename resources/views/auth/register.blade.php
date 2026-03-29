@extends('layouts.app')
@section('title', 'Connexion - Solution de Gestion de Présence')
@section('content')
<div class="max-w-7xl lg:flex items-center justify-center mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="grid lg:grid-cols-2 gap-12">
        <!-- Formulaire de création -->
        <div class="bg-white rounded-2xl shadow-xl p-8">
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-800 mb-2">
                    Inscription
                </h1>
                <p class="text-gray-600">
                    Entrez vos identifiants pour accéder à votre tableau de bord et gérer vos événements de présence en toute simplicité.
            </div>

            <form id="" method="POST" action="{{ route('auth.register') }}" class="space-y-6">
                @csrf

                <!-- Name-->
                <div>
                    <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">
                        Nom
                    </label>
                    <input type="text"
                        id="name"
                        name="name"
                        required
                        class="form-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition duration-200"
                        placeholder="Votre nom complet">
                </div>
                <!-- Email -->
                <div>
                    <label for="event_title" class="block text-sm font-semibold text-gray-700 mb-2">
                        Email
                    </label>
                    <input type="email"
                        id="email"
                        name="email"
                        required
                        class="form-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition duration-200"
                        placeholder="Votre adresse email">
                </div>

                <!-- Mot de passe -->
                <div>
                    <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">
                        Mot de passe
                    </label>
                    <input type="password"
                        id="password"
                        name="password"
                        required
                        class="form-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition duration-200"
                        placeholder="Votre mot de passe">
                </div>

                <!-- Bouton de création -->
                <button type="submit"
                        id="submitBtn"
                        class="w-full bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-semibold py-3 px-6 rounded-lg hover:from-blue-700 hover:to-indigo-700 transition duration-300 transform hover:scale-105 shadow-lg">
                    <i class="fas fa-user-plus mr-2"></i>
                    S'inscrire
                </button>
            </form>
            <div>
                <p class="text-sm text-gray-600 mt-4">
                    Vous avez déjà un compte ?
                    <a href="{{ route('auth.login') }}" class="text-blue-600 hover:text-blue-800 font-semibold">
                        Connectez-vous ici
                    </a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
