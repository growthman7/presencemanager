@extends('layouts.app')
@section('title', 'Connexion - Solution de Gestion de Présence')
@section('content')
<div class="max-w-7xl lg:flex items-center justify-center mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="grid lg:grid-cols-2 gap-12">
        <!-- Formulaire de création -->
        <div class="bg-white rounded-2xl shadow-xl p-8">
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-800 mb-2">
                    Connectez-vous à votre compte
                </h1>
                <p class="text-gray-600">
                    Entrez vos identifiants pour accéder à votre tableau de bord et gérer vos événements de présence en toute simplicité.
            </div>

            <form id="" method="POST" action="{{ route('auth.login') }}" class="space-y-6">
                @csrf

                <!-- Titre de l'événement -->
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

                <!-- Se souvenir de moi -->
                <div>
                    <label for="remember" class="block text-sm font-semibold text-gray-700 mb-2">
                        Se souvenir de moi
                    </label>
                    <input type="checkbox"
                        id="remember"
                        name="remember"
                        class="form-input h-5 w-5 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                </div>

                <!-- Bouton de création -->
                <button type="submit"
                        id="submitBtn"
                        class="w-full bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-semibold py-3 px-6 rounded-lg hover:from-blue-700 hover:to-indigo-700 transition duration-300 transform hover:scale-105 shadow-lg">
                    <i class="fas fa-sign-in-alt mr-2"></i>
                    Se connecter
                </button>
            </form>
            <div>
                <p class="text-sm text-gray-600 mt-4">
                    Vous n'avez pas de compte ?
                    <a href="{{ route('auth.register') }}" class="text-blue-600 hover:text-blue-800 font-semibold">
                        Inscrivez-vous ici
                    </a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
