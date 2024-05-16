@extends('base')

@section('main-contain')
@if(session('success') && session('success_timeout') > now())
    <div id="successMessage" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Succès !</strong>
        <span class="block sm:inline">{{ session('success') }}</span>
        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
            <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.354 5.646a.5.5 0 0 0-.708 0L10 9.293 5.354 4.646a.5.5 0 0 0-.708.708L9.293 10l-4.647 4.646a.5.5 0 1 0 .708.708L10 10.707l4.646 4.647a.5.5 0 0 0 .708-.708L10.707 10l4.647-4.646a.5.5 0 0 0 0-.708z"/></svg>
        </span>
    </div>
@endif

<div class="flex items-center mb-8 p-2">
    <button type="button" class="p-2 inline-flex justify-center items-center gap-x-2 rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none" data-hs-overlay="#sidebar-mini" aria-controls="sidebar-mini" aria-label="Toggle navigation">
        <span class="sr-only">Toggle Navigation</span>
        <svg class="flex-shrink-0 size-4" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
        </svg>
    </button>
    <h4 class="text-2xl ml-3 dark:text-white">Créer un fond pour 
        @if(auth()->user()->role === "AdminVille")
            Ville
        @endif
        @if(auth()->user()->role === "AdminGroupe")
            Groupe
        @endif
        @if(auth()->user()->role === "AdminSection")
            Section
        @endif
        @if(auth()->user()->role === "AdminSup")
            l'association
        @endif
    </h4>
</div>

<div class="pl-12">
    <a href="{{ route('fonds') }}" class="inline-flex items-center text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-2 py-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18"/>
        </svg>
        <span class="ml-1 font-bold text-lg">Retour</span>
    </a>
</div>

<div class="flex justify-center align-center px-8">
    <div class="container justify-center align-center px-4 py-8">
        <h1 class="text-2xl font-bold mb-6">Formulaire de création de fond</h1>
        <form class="flex flex-col space-y-4" method="POST" action="{{ route('fonds.store', $departement) }}">
            @csrf

            <div class="flex flex-col">
                <label for="label" class="text-sm font-medium mb-1">Libellé du fonds</label>
                <input type="text" id="label" name="label" class="rounded-md border border-gray-300 p-2 focus:outline-none focus:ring-1 focus:ring-blue-500 w-70" required>
            </div>

            <div class="flex flex-col">
                @if($departement == "ville")
                <label for="departement" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Choisir La ville</label>
                <select name="departement" id="departement" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="" selected>Choisir la ville</option>
                    @foreach($departements as $depart)
                        <option value="{{ $depart->id }}">{{ $depart->label }}</option>
                    @endforeach
                </select>
                @elseif($departement == "section")
                <label for="departement" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Choisir La Section</label>
                <select name="departement" id="departement" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="" selected>Choisir la section</option>
                    @foreach($departements as $depart)
                        <option value="{{ $depart->id }}">{{ $depart->label }}</option>
                    @endforeach
                </select>
                @elseif($departement == "groupe")
                <label for="departement" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Groupe</label>
                <select name="departement" id="departement" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="" selected>Choisir le groupe</option>
                    @foreach($departements as $depart)
                        <option value="{{ $depart->id }}">{{ $depart->label }}</option>
                    @endforeach
                </select>
                @endif
            </div>

            <div class="flex flex-col">
                <label for="montant" class="text-sm font-medium mb-1">Montant</label>
                <input type="number" id="montant" name="montant" class="rounded-md border border-gray-300 p-2 focus:outline-none focus:ring-1 focus:ring-blue-500 w-70" required>
            </div>

            <div class="flex flex-col">
                <label for="debut" class="text-sm font-medium mb-1">Début</label>
                <input type="date" id="debut" name="debut" class="rounded-md border border-gray-300 p-2 focus:outline-none focus:ring-1 focus:ring-blue-500 w-70" required>
            </div>

            <div class="flex flex-col">
                <label for="fin" class="text-sm font-medium mb-1">Fin</label>
                <input type="date" id="fin" name="fin" class="rounded-md border border-gray-300 p-2 focus:outline-none focus:ring-1 focus:ring-blue-500 w-70" required>
            </div>

            <div class="flex flex-col">
                <label for="desc" class="text-sm font-medium mb-1">Description</label>
                <textarea id="desc" name="desc" class="rounded-md border border-gray-300 p-2 focus:outline-none focus:ring-1 focus:ring-blue-500 w-70" required></textarea>
            </div>

            <div>
                <button type="submit" class="inline-flex items-center px-4 py-2 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-400 justify-center mt-3" style="background-color: #0B162C">Créer</button>
            </div>

        </form>
        <p class="text-xs text-gray-500 mt-4">Les champs marqués d'un sont obligatoires.</p>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Mettre en gras le lien du tableau de bord
        var dashboardElement = document.getElementById('funds');
        if (dashboardElement) {
            dashboardElement.style.fontWeight = 'bold';
        }
    });
</script>

@endsection
