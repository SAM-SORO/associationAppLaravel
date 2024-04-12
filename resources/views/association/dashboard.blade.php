@extends('base')

@section('main-contain')
    <div class="grid grid-cols-4 grid-rows-12 gap-10 p-4" style="height: calc(100vh - 20px) ;">
        <!-- Grid 1 -->
        <a href="#" class="bg-teal-400 rounded-lg row-span-5 col-span-2 flex flex-col justify-center items-center">
            <div class="flex flex-col items-center">
                <span class="text-8xl mb-2"><i class="fas fa-user"></i></span> <!-- Icône Font Awesome -->
                <p class="text-center text-2xl">{{$user_count}}</p> <!-- Texte à côté de l'icône -->
                <span class="mt-auto text-2xl">Personnes</span> <!-- Texte en bas de l'icône -->
            </div>
        </a>
        <!-- Grid 2 -->
        <a href="#" class="bg-teal-400 rounded-lg p-4 row-span-10 col-span-2 flex flex-col justify-center items-center">
            <p class="text-center text-4xl">Statistiques</p> <!-- Texte à côté de l'icône -->
            <img src="{{asset('img/st2.svg')}}" height="75%" width="60%"/> <!-- Image SVG -->
        </a>
        <!-- Grid 3 -->
        <a href="#" class="bg-teal-400 rounded-lg p-4 row-span-5 col-span-2 flex flex-col justify-center items-center">
            <div class="flex flex-col items-center">
                <span class="text-8xl"><i class="fas fa-calendar-alt"></i></span> <!-- Icône Font Awesome -->
                <p class="text-center text-2xl mt-auto">Evenements</p>
            </div>
        </a>
        <!-- Grid 4 -->
        <a href="#" class="bg-teal-400 rounded-lg row-span-4 p-4 flex flex-col justify-center items-center">
            <div class="flex flex-col items-center">
                <span class="text-7xl"><i class="fas fa-piggy-bank "></i></span> <!-- Icône Font Awesome -->
                <p class="text-center text-lg mt-auto">Solde total</p>
            </div>
        </a>
        <!-- Grid 5 -->
        <a href="#" class="bg-teal-400 rounded-lg row-span-4 p-4 flex flex-col justify-center items-center">
            <div class="flex flex-col items-center">
                <span class="text-7xl"><i class="fas fa-plus"></i></span> <!-- Icône Font Awesome -->
                <p class="text-center text-lg mt-auto">Créer un fond</p>
            </div>
        </a>
        <!-- Grid 6 -->
        <a href="#" class="bg-teal-400 rounded-lg row-span-4 p-4 flex flex-col justify-center items-center">
            <div class="flex flex-col items-center">
                <span class="text-7xl"><i class="fas fa-list"></i></span> <!-- Icône Font Awesome -->
                <p class="text-center text-lg mt-auto">Liste des fonds</p>
            </div>
        </a>
        <!-- Grid 7 -->
        <a href="#" class="bg-teal-400 rounded-lg row-span-4 p-4 flex flex-col justify-center items-center">
            <div class="flex flex-col items-center">
                <span class="text-7xl"><i class="fas fa-history"></i></span> <!-- Icône Font Awesome -->
                <p class="text-center text-lg mt-auto">Récentes activités</p>
            </div>
        </a>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Mettre en gras le lien du tableau de bord
            var dashboardElement = document.getElementById('dashboard');
            if (dashboardElement) {
                dashboardElement.style.fontWeight = 'bold';
            }
        });
    </script>

@endsection
