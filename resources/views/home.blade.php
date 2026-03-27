@extends('layouts.app')

@section('title', 'Accueil - Solution de Gestion de Présence')

@section('content')
    <!-- Hero Section -->
    <section class="relative bg-gradient-to-br from-blue-600 via-blue-700 to-indigo-800 text-white overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0" style="background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 1px); background-size: 40px 40px;"></div>
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 md:py-32">
            <div class="text-center animate-fade-in-up">
                <h1 class="text-4xl md:text-6xl font-bold mb-6 leading-tight">
                    Gérez vos Présences
                    <span class="block text-blue-200">Simplement et Efficacement</span>
                </h1>
                <p class="text-xl md:text-2xl mb-8 text-blue-100 max-w-3xl mx-auto">
                    Créez des listes de présence en quelques secondes et gérez les participants
                    grâce à notre système de QR code intelligent
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('liste.create') }}" class="inline-flex items-center justify-center px-8 py-4 bg-white text-blue-600 font-semibold rounded-lg hover:bg-gray-100 transition duration-300 transform hover:scale-105 shadow-lg">
                        <i class="fas fa-rocket mr-2"></i>
                        Commencer Maintenant
                    </a>
                    <a href="#features" class="inline-flex items-center justify-center px-8 py-4 border-2 border-white text-white font-semibold rounded-lg hover:bg-white hover:text-blue-600 transition duration-300">
                        <i class="fas fa-info-circle mr-2"></i>
                        En Savoir Plus
                    </a>
                </div>
            </div>
        </div>

        <!-- Wave Decoration -->
        <div class="absolute bottom-0 left-0 right-0">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 220" class="w-full">
                <path fill="#f9fafb" fill-opacity="1" d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,122.7C672,117,768,139,864,154.7C960,171,1056,181,1152,165.3C1248,149,1344,107,1392,85.3L1440,64L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
            </svg>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">
                    Pourquoi Choisir PrésenceManager ?
                </h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Une solution complète pour tous vos besoins de gestion de présence
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="bg-white rounded-xl shadow-lg p-8 hover:shadow-xl transition duration-300 transform hover:-translate-y-2">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mb-6 mx-auto">
                        <i class="fas fa-qrcode text-3xl text-blue-600"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3 text-center">QR Code Unique</h3>
                    <p class="text-gray-600 text-center">
                        Générez automatiquement un QR code unique pour chaque liste de présence,
                        facilitant le pointage des participants
                    </p>
                </div>

                <!-- Feature 2 -->
                <div class="bg-white rounded-xl shadow-lg p-8 hover:shadow-xl transition duration-300 transform hover:-translate-y-2">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mb-6 mx-auto">
                        <i class="fas fa-chart-line text-3xl text-green-600"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3 text-center">Statistiques en Temps Réel</h3>
                    <p class="text-gray-600 text-center">
                        Visualisez instantanément le taux de présence et les statistiques
                        de participation à vos événements
                    </p>
                </div>

                <!-- Feature 3 -->
                <div class="bg-white rounded-xl shadow-lg p-8 hover:shadow-xl transition duration-300 transform hover:-translate-y-2">
                    <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mb-6 mx-auto">
                        <i class="fas fa-download text-3xl text-purple-600"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3 text-center">Export Facile</h3>
                    <p class="text-gray-600 text-center">
                        Exportez vos listes de présence en PDF ou Excel pour un archivage
                        professionnel et conforme
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">
                    Comment ça marche ?
                </h2>
                <p class="text-xl text-gray-600">
                    3 étapes simples pour gérer vos présences
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-12">
                <div class="text-center">
                    <div class="w-20 h-20 bg-blue-600 text-white rounded-full flex items-center justify-center text-2xl font-bold mx-auto mb-6 shadow-lg">
                        1
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">Créez votre liste</h3>
                    <p class="text-gray-600">
                        Remplissez le formulaire avec les détails de votre événement
                    </p>
                </div>

                <div class="text-center">
                    <div class="w-20 h-20 bg-blue-600 text-white rounded-full flex items-center justify-center text-2xl font-bold mx-auto mb-6 shadow-lg">
                        2
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">Partagez le QR code</h3>
                    <p class="text-gray-600">
                        Affichez ou imprimez le QR code pour que les participants puissent scanner
                    </p>
                </div>

                <div class="text-center">
                    <div class="w-20 h-20 bg-blue-600 text-white rounded-full flex items-center justify-center text-2xl font-bold mx-auto mb-6 shadow-lg">
                        3
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">Suivez les présences</h3>
                    <p class="text-gray-600">
                        Consultez et exportez la liste des participants en temps réel
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="bg-gradient-to-r from-blue-600 to-indigo-700 py-16">
        <div class="max-w-4xl mx-auto text-center px-4">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">
                Prêt à simplifier la gestion de vos présences ?
            </h2>
            <p class="text-xl text-blue-100 mb-8">
                Commencez dès maintenant et gagnez un temps précieux
            </p>
            <a href="{{ route('liste.create') }}" class="inline-flex items-center justify-center px-8 py-4 bg-white text-blue-600 font-semibold rounded-lg hover:bg-gray-100 transition duration-300 transform hover:scale-105 shadow-xl">
                <i class="fas fa-arrow-right mr-2"></i>
                Créer ma première liste
            </a>
        </div>
    </section>
@endsection
