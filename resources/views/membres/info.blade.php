@extends('base')

@section('main-contain')
<div class="flex flex-col justify-center items-center h-screen">
    <div class="text-center">
        <h1 class="text-3xl font-bold mb-8 text-blue-400">Information membre</h1>

        <div class="flex gap-10">
            <div>
                <img class="h-auto max-w-lg mx-auto block rounded-full" src="{{ asset('img/axel.jpg') }}" alt="image description" width="250" height="250">
            </div>

            <div class="flex flex-col justify-center"> <!-- Conteneur flexbox pour centrer verticalement -->
                <div class="text-left space-y-3">
                    <p><span class="font-bold">Nom :</span> N'guessan</p>
                    <p><span class="font-bold">Prenom :</span> Axel</p>
                    <p><span class="font-bold">N° de téléphone :</span> +225 05 46 82 93 08</p>
                    <p><span class="font-bold">Departement : </span> Abidjan - yopougnon - </p>
                    <p><span class="font-bold">Fonction : </span> Membre</p>
                    <p><span class="font-bold">Age : </span> 20 ans</p>
                    <p><span class="font-bold">Date d'hadesion : </span> 26/02/2013</p>
                </div>
            </div>
        </div>
    </div>

    <div class=" mt-14 flex justify-between w-4/12">
        <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Modifier</button>

        <button id="bouton" type="button" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Nommer responsable</button>


        <button type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Supprimer</button>
    </div>
</div>

<script>
    document.getElementById("bouton").addEventListener("click", function() {
    this.disabled = true; // Désactiver le bouton
    this.classList.remove("hover:bg-green-800"); // Supprimer la classe de survol
    this.classList.remove("bg-green-700"); // Supprimer la classe de survol
    this.classList.add("bg-green-300"); // Supprimer la classe de survol
});

</script>
@endsection
