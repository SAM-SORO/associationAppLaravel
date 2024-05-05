@extends('base')

@section('main-contain')

<div class="px-12 mt-6 ml-4">
    <a href="{{ route('membres') }}" class="inline-flex items-center text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-2 py-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18">
            </path>
        </svg>
        <span class="ml-1 font-bold text-lg">Retour</span>
    </a>
</div>

<div class="flex justify-center align-center px-12 max-w-3xl" >

    <div class="container justify-center align-center px-4 py-8">
        <h1 class="text-2xl font-bold mb-6 text-blue-800">Creer département</h1>
        <form class="flex flex-col space-y-4">

            <div class="flex flex-col">
                <label for="Nom du département" class="text-sm font-medium mb-1">Nom du département</label>
                <input type="text" id="Nom du département" name="Nom du département" class="rounded-md border border-gray-300 p-2 focus:outline-none focus:ring-1 focus:ring-blue-500 w-70" required>
            </div>

            <div class="flex flex-col">
                <label for="Type du département" class="text-sm font-medium mb-1">Type du département</label>
                <input type="text" id="Type du département" name="Type du département" class="rounded-md border border-gray-300 p-2 focus:outline-none focus:ring-1 focus:ring-blue-500 w-70" required>
            </div>

            <div class="flex flex-col">
                <label for="Ville" class="text-sm font-medium mb-1">Ville de la selection</label>
                <select id="Ville" name="Ville" class="rounded-md border border-gray-300 p-2 focus:outline-none focus:ring-1 focus:ring-blue-500" required>
                    <option value="Ville">Ville</option>
                </select>
            </div>

            <div class="flex flex-col">
                <label for="Section" class="text-sm font-medium mb-1">Selection der la sous section</label>
                <select id="Section" name="Section" class="rounded-md border border-gray-300 p-2 focus:outline-none focus:ring-1 focus:ring-blue-500" required>
                    <option value="section">section</option>
                </select>
            </div>

            <div class="w-45">
                <button type="submit" class="inline-flex items-center px-4 py-2 w-64 text-white rounded-md  focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-400 justify-center mt-3 bg-gradient-to-r from-black from-10% to-blue-900 to-40% hover:from-black hover:to-black" >Ajouter</button>
            </div>

        </form>
</div>


@endsection

