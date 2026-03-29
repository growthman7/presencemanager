@extends('layouts.dashboard')

@section('title', 'Tableau de bord - Gestion de Présence')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="bg-white rounded-2xl p-8 min-h-screen">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">
            Bienvenue sur votre Tableau de Bord
        </h1>
        <p class="text-gray-600 mb-4">
            Gérez vos événements et listes de présence en toute simplicité
        </p>
        <div>
            {{-- 4 cartes de statistiques --}}
            <div class="grid md:grid-cols-4 gap-6 mb-8">
                <div class="bg-blue-600 text-white rounded-lg p-6 shadow-md">
                    <h2 class="text-xl font-bold mb-2">Total des événements</h2>
                    <p class="text-3xl font-semibold"></p>
                </div>
                <div class="bg-green-600 text-white rounded-lg p-6 shadow-md">
                    <h2 class="text-xl font-bold mb-2">Présences totales</h2>
                    <p class="text-3xl font-semibold"></p>
                </div>
                <div class="bg-yellow-600 text-white rounded-lg p-6 shadow-md">
                    <h2 class="text-xl font-bold mb-2">Événements actifs</h2>
                    <p class="text-3xl font-semibold"></p>
                </div>
                <div class="bg-red-600 text-white rounded-lg p-6 shadow-md">
                    <h2 class="text-xl font-bold mb-2">Événements inactifs</h2>
                    <p class="text-3xl font-semibold"></p>
                </div>
        </div>
    </div>
@endsection
