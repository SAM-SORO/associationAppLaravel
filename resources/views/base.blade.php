<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
<meta charset="UTF-8" />
    <title>Admin Dashboard</title>

    <!-- Boxicons CDN Link -->
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet"/>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    {{-- datapicker link --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <style>
        html, body, main {
            height: 100%;
        }

        .sidebar {
            overflow-y: auto; /* Activer le défilement uniquement si nécessaire */
            max-height: 100%; /* Hauteur maximale pour activer le défilement */
        }

    </style>
</head>
<body>
    <main class="flex">
        <div class="sidebar overflow-y-auto max-h-screen w-77 px-6 py-8 flex flex-col" style="background-color: #0B162C">
            <div class="flex justify-center flex-col mb-5 gap-y-3 mx-auto">
                <div class="relative w-10 h-10 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600">
                    <svg class="absolute w-12 h-12 text-gray-400 -left-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
                </div>
                <div class="text-blue-300">
                    <a href="#">Admin</a>
                </div>
            </div>

            <div>
                <ul class="nav-links flex flex-col space-y-6 mt-5 mb-20">
                    <li id="dashboard">
                        <a href="{{route('home')}}" class="flex items-center text-gray-300 hover:text-green-700">
                            <i class="bx bx-box text-xl mr-2"></i>
                            <span class="links_name">Tableau de bord</span>
                        </a>
                    </li>
                    <li id="association">
                        <a href="{{route('association.membres')}}" class="flex items-center text-gray-300 hover:text-green-700">
                            <i class="bx bx-box text-xl mr-2"></i>
                            <span class="links_name">Mon association</span>
                        </a>
                    </li>
                    <li id="funds">
                        <a href="{{route('association.fonds')}}" class="flex items-center text-gray-300 hover:text-green-700">
                            <i class="bx bx-grid-alt text-xl mr-2"></i>
                            <span class="links_name ">Fonds</span>
                        </a>
                    </li>
                    <li id="statistics">
                        <a href="{{ route('statistiques') }}" class="flex items-center text-gray-300 hover:text-green-700">
                            <i class="bx bx-coin-stack text-xl mr-2"></i>
                            <span class="links_name">Statistiques</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="log_out mt-auto">

                <a href="#" class="flex items-center mb-4 text-gray-300 hover:text-green-700">
                    <i class='bx bxs-cog mr-2'></i>
                    <span class="text-red-500  hover:text-green-700">Parametre</span>
                </a>
                <a href="#" class="flex items-center text-gray-300 hover:text-green-700">
                    <i class="bx bx-log-out text-xl mr-2"></i>
                    <span class="links_name">Déconnexion</span>
                </a>
            </div>

        </div>

        <div class="contenu flex-1 overflow-y-auto">
            @yield('main-contain')
        </div>
    </main>
    {{-- datapicker js --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>
</html>
