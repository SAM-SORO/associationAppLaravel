@extends('base')
@section('main-contain')
<section class="bg-gray-50 dark:bg-gray-900">
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto h-screen lg:py-0">
        <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                    Ajouter un nouveau membre
                </h1>
                <form class="space-y-4 md:space-y-6" method="POST" action="{{ route('membre.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label for="nom" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nom</label>
                        <input type="text" name="nom" id="nom" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    </div>
                    <div>
                        <label for="prenom" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Prénom</label>
                        <input type="text" name="prenom" id="prenom" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    </div>
                    <div>
                        <label for="telphone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Téléphone</label>
                        <input type="number" name="telphone" id="telphone" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    </div>
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                        <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    </div>
                    <div>
                        <label for="date_adhesion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date d'adhésion</label>
                        <input type="date" name="date_adhesion" id="date_adhesion" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    </div>
                    <div>
                        <label for="date_naissance" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date de naissance</label>
                        <input type="date" name="date_naissance" id="date_naissance" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    </div>
                    <div>
                        <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Télécharger une image</label>
                        <input type="file" name="image" id="image" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                    <button type="submit" class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Ajouter le membre</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
