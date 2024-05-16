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
            <span class="text-8xl"><svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 24 24"><path fill="black" d="M7 14v-2h10v2zm0 4v-2h7v2zm-2 4q-.825 0-1.412-.587T3 20V6q0-.825.588-1.412T5 4h1V2h2v2h8V2h2v2h1q.825 0 1.413.588T21 6v14q0 .825-.587 1.413T19 22zm0-2h14V10H5z"/></svg></span> <!-- Icône Font Awesome -->
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
        @if(auth()->user()->role != 'AdminGroupe')
        <a href="{{route('groupes.create')}}" class="bg-teal-400 rounded-lg row-span-4 p-4 flex flex-col justify-center items-center">
            <div class="flex flex-col items-center">
                <span class="text-7xl"><svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 24 24"><g fill="none"><path d="M24 0v24H0V0zM12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035c-.01-.004-.019-.001-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427c-.002-.01-.009-.017-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093c.012.004.023 0 .029-.008l.004-.014l-.034-.614c-.003-.012-.01-.02-.02-.022m-.715.002a.023.023 0 0 0-.027.006l-.006.014l-.034.614c0 .012.007.02.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z"/><path fill="black" d="M10.5 20a1.5 1.5 0 0 0 3 0v-6.5H20a1.5 1.5 0 0 0 0-3h-6.5V4a1.5 1.5 0 0 0-3 0v6.5H4a1.5 1.5 0 0 0 0 3h6.5z"/></g></svg></span> <!-- Icône Font Awesome -->
                <p class="text-center text-lg mt-auto">Créer un Groupe</p>
            </div>
        </a>
        @endif
        <!-- Grid 6 -->
        @if(auth()->user()->role != 'AdminGroupe' && auth()->user()->role != 'AdminSection')
        <a href="{{route('sections.create')}}" class="bg-teal-400 rounded-lg row-span-4 p-4 flex flex-col justify-center items-center">
            <div class="flex flex-col items-center">
                <span class="text-7xl"><svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 24 24"><g fill="none"><path d="M24 0v24H0V0zM12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035c-.01-.004-.019-.001-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427c-.002-.01-.009-.017-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093c.012.004.023 0 .029-.008l.004-.014l-.034-.614c-.003-.012-.01-.02-.02-.022m-.715.002a.023.023 0 0 0-.027.006l-.006.014l-.034.614c0 .012.007.02.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z"/><path fill="black" d="M10.5 20a1.5 1.5 0 0 0 3 0v-6.5H20a1.5 1.5 0 0 0 0-3h-6.5V4a1.5 1.5 0 0 0-3 0v6.5H4a1.5 1.5 0 0 0 0 3h6.5z"/></g></svg></span> <!-- Icône Font Awesome -->
                <p class="text-center text-lg mt-auto">Créer une Section</p>
            </div>
        </a>
        @endif
        <!-- Grid 6 -->
        @if(auth()->user()->role != 'AdminGroupe' && auth()->user()->role != 'AdminSection' && auth()->user()->role != 'AdminVille')
        <a href="{{route('sections.create')}}" class="bg-teal-400 rounded-lg row-span-4 p-4 flex flex-col justify-center items-center">
            <div class="flex flex-col items-center">
                <span class="text-7xl"><svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 24 24"><g fill="none"><path d="M24 0v24H0V0zM12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035c-.01-.004-.019-.001-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427c-.002-.01-.009-.017-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093c.012.004.023 0 .029-.008l.004-.014l-.034-.614c-.003-.012-.01-.02-.02-.022m-.715.002a.023.023 0 0 0-.027.006l-.006.014l-.034.614c0 .012.007.02.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z"/><path fill="black" d="M10.5 20a1.5 1.5 0 0 0 3 0v-6.5H20a1.5 1.5 0 0 0 0-3h-6.5V4a1.5 1.5 0 0 0-3 0v6.5H4a1.5 1.5 0 0 0 0 3h6.5z"/></g></svg></span> <!-- Icône Font Awesome -->
                <p class="text-center text-lg mt-auto">Créer une Section</p>
            </div>
        </a>
        @endif
        <!-- Grid 7 -->
        @if(auth()->user()->role == 'AdminSup')
        <a href="{{route('villes.create')}}" class="bg-teal-400 rounded-lg row-span-4 p-4 flex flex-col justify-center items-center">
            <div class="flex flex-col items-center">
                <span class="text-7xl"><svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 24 24"><g fill="none"><path d="M24 0v24H0V0zM12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035c-.01-.004-.019-.001-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427c-.002-.01-.009-.017-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093c.012.004.023 0 .029-.008l.004-.014l-.034-.614c-.003-.012-.01-.02-.02-.022m-.715.002a.023.023 0 0 0-.027.006l-.006.014l-.034.614c0 .012.007.02.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z"/><path fill="black" d="M10.5 20a1.5 1.5 0 0 0 3 0v-6.5H20a1.5 1.5 0 0 0 0-3h-6.5V4a1.5 1.5 0 0 0-3 0v6.5H4a1.5 1.5 0 0 0 0 3h6.5z"/></g></svg></span> <!-- Icône Font Awesome -->
                <p class="text-center text-lg mt-auto">Créer une Ville</p>
            </div>
        </a>
        @endif
        <!-- Grid 8 -->
        <a href="#" class="bg-teal-400 rounded-lg row-span-4 p-4 flex flex-col justify-center items-center">
            <div class="flex flex-col items-center">
                <span class="text-7xl"><svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 512 512"><path fill="none" stroke="black" stroke-linejoin="round" stroke-width="48" d="M144 144h320M144 256h320M144 368h320"/><path fill="none" stroke="black" stroke-linecap="square" stroke-linejoin="round" stroke-width="32" d="M64 128h32v32H64zm0 112h32v32H64zm0 112h32v32H64z"/></svg></i></span> <!-- Icône Font Awesome -->
                <p class="text-center text-lg mt-auto">Liste des fonds</p>
            </div>
        </a>
        <!-- Grid 9 -->
        <a href="#" class="bg-teal-400 rounded-lg row-span-4 p-4 flex flex-col justify-center items-center">
            <div class="flex flex-col items-center">
                <span class="text-7xl"><svg xmlns="http://www.w3.org/2000/svg" width="84" height="84" viewBox="0 0 24 24"><path fill="black" d="M13.5 8H12v5l4.28 2.54l.72-1.21l-3.5-2.08zM13 3a9 9 0 0 0-9 9H1l3.96 4.03L9 12H6a7 7 0 0 1 7-7a7 7 0 0 1 7 7a7 7 0 0 1-7 7c-1.93 0-3.68-.79-4.94-2.06l-1.42 1.42A8.9 8.9 0 0 0 13 21a9 9 0 0 0 9-9a9 9 0 0 0-9-9"/></svg></span> <!-- Icône Font Awesome -->
                <p class="text-center text-lg mt-auto">Récentes activités</p>
            </div>
        </a>
    </div>
@endsection

