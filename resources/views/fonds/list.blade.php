@extends('base')

@section('main-contain')

<div class="mb-6 flex items-center p-4">
    <button type="button" class="p-2 inline-flex justify-center items-center gap-x-2 rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none" data-hs-overlay="#sidebar-mini" aria-controls="sidebar-mini" aria-label="Toggle navigation">
      <span class="sr-only">Toggle Navigation</span>
      <svg class="flex-shrink-0 size-4" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
      </svg>
    </button>
    <h4 class="text-2xl ml-3 dark:text-white">Fonds de l'association</h4>
</div>


<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
    {{-- rechercher et Boutton crée --}}
    <div class="flex justify-between items-center">
        <form class="flex items-center w-96">
            <label for="simple-search" class="sr-only">Search</label>
            <div class="relative w-full">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5v10M3 5a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm0 10a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm12 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm0 0V6a3 3 0 0 0-3-3H9m1.5-2-2 2 2 2"/>
                    </svg>
                </div>
                <input type="text" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Rechercher" required />
            </div>
            <button type="submit" class="p-2.5 ms-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
                <span class="sr-only">Search</span>
            </button>
        </form>

        <div>
            <a href="{{route('association.create.fonds')}}"><button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Creer un fond</button></a>
        </div>

    </div>

    {{-- tableau des fonds --}}
    <div class="overflow-x-auto">
        <div class="py-4 inline-block min-w-full">
            <div class="overflow-hidden">
                <table class="min-w-full text-center">
                    <thead class="border-b bg-gray-50">
                        <tr>
                            <th class="text-sm font-medium text-gray-900 px-6 py-6">Fond</th>
                            <th class="text-sm font-medium text-gray-900 px-6 py-6">Montant</th>
                            <th class="text-sm font-medium text-gray-900 px-6 py-6">Période</th>
                            <th class="text-sm font-medium text-gray-900">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b-2 border-gray-100">
                            <td class="text-sm font-medium text-gray-900 px-6 py-6">The Sliding Mr. Bones (Next Stop, Pottersville)</td>
                            <td class="text-sm font-medium text-gray-900 px-6 py-6">1000</td>
                            <td class="text-sm font-medium text-gray-900 px-6 py-6">2022-2023</td>
                            <td class="text-sm font-medium text-gray-900 px-6 py-6">
                                <button class="btn-delete bg-red-700 rounded-sm text-sm p-2 text-white">Supprimer</button>
                                <button class="btn-edit  bg-green-700 rounded-sm text-sm p-2 text-white">Modifier</button>
                            </td>
                        </tr>
                        <tr class="border-b-2 border-gray-100">
                            <td class="text-sm font-medium text-gray-900 px-6 py-6">Witchy Woman</td>
                            <td class="text-sm font-medium text-gray-900 px-6 py-6">500</td>
                            <td class="text-sm font-medium text-gray-900 px-6 py-6">2021-2022</td>
                            <td class="text-sm font-medium text-gray-900 px-6 py-6">
                                <button class="btn-delete bg-red-700 rounded-sm text-sm p-2 text-white">Supprimer</button>
                                <button class="btn-edit  bg-green-700 rounded-sm text-sm p-2 text-white">Modifier</button>
                            </td>
                        </tr>
                        <tr class="border-b-2 border-gray-100">
                            <td class="text-sm font-medium text-gray-900 px-6 py-6">Shining Star</td>
                            <td class="text-sm font-medium text-gray-900 px-6 py-6">750</td>
                            <td class="text-sm font-medium text-gray-900 px-6 py-6">2020-2021</td>
                            <td class="text-sm font-medium text-gray-900 px-6 py-6">
                                <button class="btn-delete bg-red-700 rounded-sm text-sm p-2 text-white">Supprimer</button>
                                <button class="btn-edit  bg-green-700 rounded-sm text-sm p-2 text-white">Modifier</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
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
