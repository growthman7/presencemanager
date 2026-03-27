@extends('layouts.app')

@section('title', 'Créer une liste de présence')

@push('styles')
<style>
    .qr-code-container {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 20px;
        padding: 2rem;
        animation: fadeInUp 0.6s ease-out;
    }

    .qr-code {
        background: white;
        padding: 1.5rem;
        border-radius: 16px;
        box-shadow: 0 20px 40px rgba(0,0,0,0.1);
    }

    .form-input:focus {
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        border-color: #3b82f6;
        outline: none;
    }
</style>
@endpush

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="grid lg:grid-cols-2 gap-12">
        @if(!session('success'))
            <!-- Formulaire de création -->
            <div class="bg-white rounded-2xl shadow-xl p-8">
                <div class="mb-8">
                    <h1 class="text-3xl font-bold text-gray-800 mb-2">
                        Créer une liste de présence
                    </h1>
                    <p class="text-gray-600">
                        Remplissez les informations ci-dessous pour générer votre liste de présence unique
                    </p>
                </div>

                <form id="" method="POST" action="{{ route('evenement.store') }}" class="space-y-6">
                    @csrf

                    <!-- Titre de l'événement -->
                    <div>
                        <label for="event_title" class="block text-sm font-semibold text-gray-700 mb-2">
                            Titre de l'événement *
                        </label>
                        <input type="text"
                            id="event_title"
                            name="titre"
                            required
                            class="form-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition duration-200"
                            placeholder="Ex: Réunion d'équipe Q1 2024">
                    </div>

                    <!-- Description -->
                    <div>
                        <label for="description" class="block text-sm font-semibold text-gray-700 mb-2">
                            Description
                        </label>
                        <textarea id="description"
                                name="description"
                                rows="3"
                                class="form-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition duration-200"
                                placeholder="Décrivez brièvement l'événement..."></textarea>
                    </div>

                    <!-- Date et Heure -->
                    <div class="grid md:grid-cols-2 gap-4">
                        <div>
                            <label for="event_date" class="block text-sm font-semibold text-gray-700 mb-2">
                                Date *
                            </label>
                            <input type="date"
                                id="event_date"
                                name="date"
                                required
                                class="form-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition duration-200">
                        </div>

                        <div>
                            <label for="event_time" class="block text-sm font-semibold text-gray-700 mb-2">
                                Heure *
                            </label>
                            <input type="time"
                                id="event_time"
                                name="heure"
                                required
                                class="form-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition duration-200">
                        </div>
                    </div>

                    <!-- Lieu -->
                    <div>
                        <label for="location" class="block text-sm font-semibold text-gray-700 mb-2">
                            Lieu
                        </label>
                        <input type="text"
                            id="location"
                            name="lieu"
                            class="form-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition duration-200"
                            placeholder="Salle de conférence, en ligne, etc.">
                    </div>

                    <!-- Bouton de création -->
                    <button type="submit"
                            id="submitBtn"
                            class="w-full bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-semibold py-3 px-6 rounded-lg hover:from-blue-700 hover:to-indigo-700 transition duration-300 transform hover:scale-105 shadow-lg">
                        <i class="fas fa-qrcode mr-2"></i>
                        Générer la liste et le QR code
                    </button>
                </form>
            </div>
        @else
            <!-- Section QR Code (cachée initialement) -->
            <div id="qrCodeSection" class="">
                <div class="qr-code-container sticky top-24">
                    <div class="text-center text-white mb-6">
                        <i class="fas fa-check-circle text-4xl mb-3"></i>
                        <h2 class="text-2xl font-bold">Liste créée avec succès !</h2>
                        <p class="text-blue-100 mt-2">Scannez ce QR code pour valider votre présence</p>
                    </div>

                    <div class="qr-code text-center">
                        <div id="qrcode" class="flex justify-center mb-4">{!! QrCode::size(255)->generate(session('uri')) !!}</div>
                        <div class="border-t border-gray-200 pt-4 mt-4">
                            <p class="text-sm text-gray-600 mb-2">
                                <i class="fas fa-link mr-1"></i> Lien d'accès :
                            </p>
                            <a href="{{ session('uri') }}" target="_blank" class="text-xs text-gray-500 break-all bg-gray-50 p-2 rounded">Marquer sa présence</a>
                        </div>
                    </div>

                    <div class="mt-6 space-y-3">
                        <button onclick="downloadQRCode()"
                                class="w-full bg-white text-indigo-600 font-semibold py-2 px-4 rounded-lg hover:bg-gray-100 transition duration-300">
                            <i class="fas fa-download mr-2"></i>
                            Télécharger le QR code
                        </button>

                        <a href="{{ route('home') }}"
                        class="block w-full bg-transparent border-2 border-white text-white text-center font-semibold py-2 px-4 rounded-lg hover:bg-white hover:text-indigo-600 transition duration-300">
                            <i class="fas fa-home mr-2"></i>
                            Retour à l'accueil
                        </a>
                    </div>

                    <div class="mt-6 text-center text-white text-sm">
                        <i class="fas fa-info-circle mr-1"></i>
                        Les participants pourront scanner ce code pour confirmer leur présence
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
