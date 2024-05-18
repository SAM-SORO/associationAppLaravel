@extends('base')

@section('main-contain')

<div class="px-12 mt-6 ml-4">
    <a href="{{ route('association.index') }}" class="inline-flex items-center text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-2 py-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18">
            </path>
        </svg>
        <span class="ml-1 font-bold text-lg">Retour</span>
    </a>
</div>

<div class="flex justify-center align-center px-12 max-w-3xl">
    <div class="container justify-center align-center px-4 py-8">
        <h1 class="text-2xl font-bold mb-6 text-blue-800">Paiement d'un Fond</h1>
        <form class="flex flex-col space-y-4" method="POST" action="{{route('paiements.store',['membreId'=>$membre->id])}}">
            @csrf
            <div class="flex flex-col">
                <label for="fonds" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fonds</label>
                <select name="fonds" id="fonds" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="" selected>Choisir le fonds</option>
                    @foreach($fonds as $fonds)
                        <option value="{{ $fonds->id }}">{{ $fonds->label }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex flex-col">
                <label for="montant" class="text-sm font-medium mb-1">Somme payer</label>
                <input type="number" id="montant" name="montant" class="rounded-md border border-gray-300 p-2 focus:outline-none focus:ring-1 focus:ring-blue-500 w-70" required>
            </div>

            <div>
                <button type="submit" class="inline-flex items-center px-4 py-2  text-white rounded-md  focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-400 justify-center mt-3 bg-gradient-to-r from-black from-10% to-blue-900 to-40% hover:from-black hover:to-black" >Ajouter</button>
            </div>

        </form>
</div>


@endsection
