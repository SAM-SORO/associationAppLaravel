@extends('base')

@section('main-contain')
    <div class="grid grid-cols-4 grid-rows-12 gap-10 p-4" style="height: calc(100vh - 20px);">
        <!-- Grid 1 -->
        <a href="#" class="bg-teal-400 rounded-lg row-span-5 col-span-2 flex flex-col justify-center items-center">
            <!-- Contenu du premier bloc -->
        </a>
        <!-- Grid 2 -->
        <a href="#" class="bg-teal-400 rounded-lg p-4 row-span-10 col-span-2 flex flex-col justify-center items-center">
            <!-- Contenu du deuxième bloc -->
        </a>
        <!-- Grid 3 -->
        <a href="#" class="bg-teal-400 rounded-lg p-4 row-span-5 col-span-2 flex flex-col justify-center items-center">
            <!-- Contenu du troisième bloc -->
        </a>
        <!-- Grid 4 -->
        <a href="#" class="bg-teal-400 rounded-lg row-span-4 p-4 flex flex-col justify-center items-center">
            <!-- Contenu du quatrième bloc -->
        </a>
        <!-- Grid 5 -->
        @if(auth()->user()->role != 'adminGroupe')
            <a href="{{route('groupes.create')}}" class="bg-teal-400 rounded-lg row-span-4 p-4 flex flex-col justify-center items-center">
                <!-- Contenu du lien pour créer un groupe -->
            </a>
        @endif
        <!-- Grid 6 -->
        @if(auth()->user()->role != 'adminGroupe' && auth()->user()->role != 'adminSection')
            <a href="{{route('sections.create')}}" class="bg-teal-400 rounded-lg row-span-4 p-4 flex flex-col justify-center items-center">
                <!-- Contenu du lien pour créer une section -->
            </a>
        @endif
        <!-- Grid 7 -->
        @if(auth()->user()->role == 'adminVille')
            <a href="{{route('villes.create')}}" class="bg-teal-400 rounded-lg row-span-4 p-4 flex flex-col justify-center items-center">
                <!-- Contenu du lien pour créer une ville -->
            </a>
        @endif
    </div>
@endsection
