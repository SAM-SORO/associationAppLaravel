@extends('base')

@section('main-contain')
<div class="container mx-auto mt-8">
    <h1 class="text-2xl font-bold mb-6">Modifier le fond</h1>

    <div class="pl-12 mb-6">
        <a href="{{ route('fonds.index') }}" class="inline-flex items-center text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-2 py-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18"/>
            </svg>
            <span class="ml-1 font-bold text-lg">Retour</span>
        </a>
    </div>

    <div class="flex justify-center align-center px-8">
        <div class="container justify-center align-center px-4 py-8">
            <form class="flex flex-col space-y-4" method="POST" action="{{ route('fonds.update', $fond->id) }}">
                @csrf
                @method('PUT')

                <div class="flex flex-col">
                    <label for="label" class="text-sm font-medium mb-1">Libellé du fonds</label>
                    <input type="text" id="label" name="label" value="{{ $fond->label }}" class="rounded-md border border-gray-300 p-2 focus:outline-none focus:ring-1 focus:ring-blue-500 w-full" required>
                </div>

                <div class="flex flex-col">
                    <label for="montant" class="text-sm font-medium mb-1">Montant</label>
                    <input type="number" id="montant" name="montant" value="{{ $fond->montant }}" class="rounded-md border border-gray-300 p-2 focus:outline-none focus:ring-1 focus:ring-blue-500 w-full" required>
                </div>

                <div class="flex flex-col">
                    <label for="debut" class="text-sm font-medium mb-1">Début</label>
                    <input type="date" id="debut" name="debut" value="{{ $fond->debut }}" class="rounded-md border border-gray-300 p-2 focus:outline-none focus:ring-1 focus:ring-blue-500 w-full" required>
                </div>

                <div class="flex flex-col">
                    <label for="fin" class="text-sm font-medium mb-1">Fin</label>
                    <input type="date" id="fin" name="fin" value="{{ $fond->fin }}" class="rounded-md border border-gray-300 p-2 focus:outline-none focus:ring-1 focus:ring-blue-500 w-full" required>
                </div>

                <div class="flex flex-col">
                    <label for="desc" class="text-sm font-medium mb-1">Description</label>
                    <textarea id="desc" name="desc" class="rounded-md border border-gray-300 p-2 focus:outline-none focus:ring-1 focus:ring-blue-500 w-full" required>{{ $fond->desc }}</textarea>
                </div>

                <div>
                    <button type="submit" class="inline-flex items-center px-4 py-2 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-400 justify-center mt-3" style="background-color: #0B162C">Mettre à jour</button>
                </div>
            </form>
            <p class="text-xs text-gray-500 mt-4">Les champs marqués d'un sont obligatoires.</p>
        </div>
    </div>
@endsection
