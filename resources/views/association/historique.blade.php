@extends('base')

@section('main-contain')

<div class="container mx-auto p-4">

    <div>
        <p class="text-center text-2xl text-blue-900 font-bold">HISTORIQUE</p>
    </div>


    <div class="flex justify-between items-center flex-col ml-4 space-y-3 lg:flex-row mb-4 mt-4">

        <div class="flex space-x-10 mt-4 mb-2">

            <form class="">
                <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 w-80">
                    <option selected>Ville</option>
                    <option value="abj">Abidjan</option>
                    <option value="bke">Korhogo</option>
                    <option value="FR">Yamoussoukro</option>
                </select>
            </form>


            <form class="">
                <select id="sections" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 w-80">
                    <option selected>Section</option>
                    <option value="sect1">Section 1</option>
                    <option value="sect2">Section 2</option>
                    <option value="sect3">Section 3</option>
                </select>
            </form>


             <form class="">
                <select id="groups" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 w-80">
                    <option selected>Groupe</option>
                    <option value="grp1">Groupe 1</option>
                    <option value="grp2">Groupe 2</option>
                    <option value="grp3">Groupe 3</option>
                </select>
            </form>

        </div>


    </div>

    <div class="flex flex-col lg:flex-row mb-3 space-x-6">

        <div class="flex flex-row items-center justify-center mt-2 mb-2">

            <div class="flex items-center mb-2 mr-2 relative">
                <button id="dropdownHoverButtonFonds" data-dropdown-toggle="dropdownHoverFonds" data-dropdown-trigger="hover" class="dropdown-button flex items-center text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                    Action
                    <svg class="w-2.5 h-2.5 ml-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                    </svg>
                </button>


                <!-- menu deroulant fonds-->
                <div id="dropdownHoverFonds" class="absolute z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 top-full mt-1">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownHoverButtonFonds">
                        <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Fete de noel</a>
                        </li>
                        <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Fete de janvier</a>
                        </li>
                        <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Orphelins</a>
                        </li>
                    </ul>
                </div>
            </div>


            <div class="flex items-center mb-2 mr-2 relative">
                <button id="dropdownHoverButtonTri" data-dropdown-toggle="dropdownHoverTri" data-dropdown-trigger="hover" class="flex items-center text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                    Date
                    <svg class="w-2.5 h-2.5 ml-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                    </svg>
                </button>

                <!-- menu deroulant tri-->
                <div id="dropdownHoverTri" class="absolute z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 top-full mt-1">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownHoverButtonTri">
                        <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Membres</a>
                        </li>
                        <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Responsables</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="text-gray-600 relative">
                <input class="border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-full text-sm focus:outline-none" type="search" name="search" placeholder="Recherche">
                <button type="submit" class="absolute right-0 top-0 mt-3 mr-4">
                  <svg class="text-gray-600 h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px"
                    viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve"
                    width="512px" height="512px">
                    <path
                      d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
                  </svg>
                </button>
              </div>

            </div>

        </div>

        <div class="flex flex-col flex-grow mt-3">

            <button type="button" class="p-6 me-6 mb-6 text-xsm font-medium text-gray-900 flex items-center justify-between focus:outline-none bg-white rounded-full border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                <span class="flex-grow"></span>
                <p class="text-blue-900 font-bold uppercase ">Creation de Fond</p>
                <span class="flex-grow"></span>
                <p class="text-blue-600 ">id 0225</p>
                <span class="flex-grow"></span>
                <p class="">10h15</p>
                <span class="flex-grow"></span>
                <p class="">25/03/2024</p>
                <span class="flex-grow"></span>
            </button>

            <button type="button" class="p-6 me-6 mb-6 text-xsm font-medium text-gray-900 flex items-center justify-between focus:outline-none bg-white rounded-full border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                <span class="flex-grow"></span>
                <p class="text-blue-900 font-bold uppercase ">Ajout d'un membre</p>
                <span class="flex-grow"></span>
                <p class="text-blue-600 ">id 0225</p>
                <span class="flex-grow"></span>
                <p class="">10h15</p>
                <span class="flex-grow"></span>
                <p class="">25/03/2024</p>
                <span class="flex-grow"></span>
            </button>

            <button type="button" class="p-6 me-6 mb-6 text-xsm font-medium text-gray-900 flex items-center justify-between focus:outline-none bg-white rounded-full border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                <span class="flex-grow"></span>
                <p class="text-blue-900 font-bold uppercase ">Paiement d'un fond</p>
                <span class="flex-grow"></span>
                <p class="text-blue-600 ">id 0225</p>
                <span class="flex-grow"></span>
                <p class="">10h15</p>
                <span class="flex-grow"></span>
                <p class="">25/03/2024</p>
                <span class="flex-grow"></span>
            </button>

        </div>

    </div>

@endsection


<style>
    .container {
        display: flex;
        flex-direction: column;
        height: 100%;
    }

</style>
