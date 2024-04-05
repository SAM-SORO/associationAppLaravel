@extends('base')

@section('main-contain')

<div class="flex items-center mb-8 p-2">
    <button type="button" class="p-2 inline-flex justify-center items-center gap-x-2 rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none" data-hs-overlay="#sidebar-mini" aria-controls="sidebar-mini" aria-label="Toggle navigation">
      <span class="sr-only">Toggle Navigation</span>
      <svg class="flex-shrink-0 size-4" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
      </svg>
    </button>
    <h4 class="text-2xl ml-3 dark:text-white">Creer un fond</h4>
</div>


<div class="pl-12">
    <a href="{{ route('association.fonds') }}" class="inline-flex items-center text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-2 py-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18">
            </path>
        </svg>
        <span class="ml-1 font-bold text-lg">Retour</span>
    </a>
</div>


<div class="flex justify-center align-center px-8">
    <div class="container justify-center align-center px-4 py-8">
        <h1 class="text-2xl font-bold mb-6">Formulaire de creation de fond</h1>
        <form class="flex flex-col space-y-4">

            <div class="flex flex-col">
                <label for="fonds-libelle" class="text-sm font-medium mb-1">Libellé du fonds</label>
                <input type="text" id="fonds-libelle" name="fonds-libelle" class="rounded-md border border-gray-300 p-2 focus:outline-none focus:ring-1 focus:ring-blue-500 w-70" required>
            </div>


            <div class="flex flex-col">
                <label for="departement" class="text-sm font-medium mb-1">Département concerné</label>
                <select id="departement" name="departement" class="rounded-md border border-gray-300 p-2 focus:outline-none focus:ring-1 focus:ring-blue-500" required>
                    <option value="yamoussoukro">Yamoussoukro</option>
                </select>
            </div>

            <div class="flex flex-col">
                <label for="departement" class="text-sm font-medium mb-1">Type de fonds</label>
                <select id="departement" name="departement" class="rounded-md border border-gray-300 p-2 focus:outline-none focus:ring-1 focus:ring-blue-500" required>
                    <option value="yamoussoukro">Périodique</option>
                </select>
            </div>

            <div class="flex float-start gap-10">
                <div>
                    <label for="date" class="block mb-2">Debut:</label>
                    <input type="date" id="date" name="date" class="block w-full border-gray-300 rounded-md  focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                </div>
                <div>
                    <label for="date" class="block mb-2">Fin:</label>
                    <input type="date" id="date" name="date" class="block w-full border-gray-300 rounded-md  focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                </div>

            </div>

            <div>
                <button type="submit" class="inline-flex items-center px-4 py-2  text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-400 justify-center mt-3 " style="background-color: #0B162C">Créer</button>
            </div>

        </form>

        <p class="text-xs text-gray-500 mt-4 text">Les champs marqués d'un sont obligatoires.</p>
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
