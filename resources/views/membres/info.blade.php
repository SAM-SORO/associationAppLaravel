

@extends('base')

@section('main-contain')
<div class="flex flex-col justify-center items-center h-screen">
    <div class="text-center">
        <h1 class="text-3xl font-bold mb-8 text-blue-400">Information membre</h1>

        <div class="flex gap-10">
            <div>
                <img class="h-auto max-w-lg mx-auto block rounded-full" src="{{ asset('storage/' . $membre->image) }}" alt="image description" width="250" height="250">
            </div>

            <div class="flex flex-col justify-center">
                <div class="text-left space-y-3">
                    <p><span class="font-bold">Nom :</span> {{ $membre->nom }}</p>
                    <p><span class="font-bold">Prenom :</span> {{ $membre->prenom }}</p>
                    <p><span class="font-bold">N° de téléphone :</span> +225 {{ $membre->telphone }}</p>
                    <p><span class="font-bold">Departement :</span> - {{ $membre->groupe->label }}</p>
                    <p><span class="font-bold">Fonction :</span> Membre</p>
                    <p><span class="font-bold">Age :</span> {{ $age }} ans</p>
                    <p><span class="font-bold">Date d'adhesion :</span> {{ $membre->date_adhesion }}</p>
                </div>
            </div>
        </div>

    </div>

    <div class="mt-2 flex justify-between w-4/12">
        <button type="button" onclick="window.location.href='{{ route('membre.edit', ['id' => $membre->id]) }}'" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5  me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Modifier</button>
        <form action="{{ route('membre.destroy', ['id' => $membre->id]) }}" method="POST" >
            @csrf
            @method('DELETE') 
        <button type="submit" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-3.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Supprimer</button>
        </form>
        <div class="">
            <div class="flex items-center mb-2 mr-2 relative">
                <button id="dropdownHoverPaiement" data-dropdown-toggle="dropdownHoverTri" data-dropdown-trigger="hover" class="flex items-center text-white-900 bg-green-700 border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                    Sélectionner un fonds
                    <svg class="w-2.5 h-2.5 ml-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                    </svg>
                </button>

                <!-- menu déroulant fonds -->
                <div id="dropdownHoverTri" class="absolute z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 top-full mt-1">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownHoverPaiement">
                        @foreach($fonds as $fond)
                            <li>
                                <a href="{{ route('paiements.showPaiementsMember', ['membre' => $membre->id, 'fonds' => $fond->id ]) }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{ $fond->label }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById("bouton").addEventListener("click", function() {
        this.disabled = true;
        this.classList.remove("hover:bg-green-800");
        this.classList.remove("bg-green-700");
        this.classList.add("bg-green-300");
    });

</script>
@endsection






{{-- <script>
    document.getElementById("bouton").addEventListener("click", function() {
    this.disabled = true; // Désactiver le bouton
    this.classList.remove("hover:bg-green-800"); // Supprimer la classe de survol
    this.classList.remove("bg-green-700"); // Supprimer la classe de survol
    this.classList.add("bg-green-300"); // Supprimer la classe de survol
});

</script>
@endsection --}}
