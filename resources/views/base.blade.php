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
                {{-- #d2cbcb --}}
                <div class="relative w-10 h-10 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600">
                    <svg class="absolute w-12 h-12 text-gray-400 -left-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
                </div>
                <div class="text-blue-300">
                    @if(Auth::check())                    
                        <a href="#">{{auth()->user()->role}}</a>
                    @endif
                </div>
            </div>

            <div>
                <ul class="nav-links flex flex-col space-y-6 mt-5 mb-20">
                    <li id="dashboard">
                        <a href="{{route('home')}}" class="flex items-center text-gray-300 hover:text-green-700">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="#d2cbcb" d="M11 4.68v3.88a2.45 2.45 0 0 1-1.509 2.258A2.409 2.409 0 0 1 8.56 11H4.68a2.44 2.44 0 0 1-2.43-2.44V4.69a2.44 2.44 0 0 1 2.43-2.44h3.88A2.44 2.44 0 0 1 11 4.68m10.75.01v3.87a2.41 2.41 0 0 1-.71 1.72a2.378 2.378 0 0 1-1.72.72h-3.88a2.45 2.45 0 0 1-2.256-1.502A2.4 2.4 0 0 1 13 8.56V4.69a2.391 2.391 0 0 1 .72-1.72a2.42 2.42 0 0 1 1.72-.72h3.88a2.44 2.44 0 0 1 2.43 2.44M11 15.45v3.87a2.44 2.44 0 0 1-2.44 2.43H4.68a2.45 2.45 0 0 1-1.72-.71a2.41 2.41 0 0 1-.71-1.72v-3.87a2.41 2.41 0 0 1 .71-1.72A2.47 2.47 0 0 1 4.68 13h3.88A2.46 2.46 0 0 1 11 15.45m10.75 1.93A4.37 4.37 0 1 1 17.37 13a4.4 4.4 0 0 1 4.049 2.707c.22.53.332 1.099.331 1.673"/></svg>
                            <span class="links_name ml-2">Tableau de bord</span>
                        </a>
                    </li>
                    <li id="association">
                        <a href="{{route('membres')}}" class="flex items-center text-gray-300 hover:text-green-700">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 48 48"><defs><mask id="ipTCategoryManagement0"><g fill="none"><rect width="36" height="14" x="6" y="28" stroke="#fff" stroke-width="4" rx="4"/><path stroke="#fff" stroke-linecap="round" stroke-width="4" d="M20 7H10a4 4 0 0 0-4 4v6a4 4 0 0 0 4 4h10"/><circle cx="34" cy="14" r="8" fill="#555" stroke="#fff" stroke-width="4"/><circle cx="34" cy="14" r="3" fill="#fff"/></g></mask></defs><path fill="#d2cbcb" d="M0 0h48v48H0z" mask="url(#ipTCategoryManagement0)"/></svg>
                            <span class="links_name ml-2">Mon association</span>
                        </a>
                    </li>
                    <li id="funds">
                        <a href="{{route('fonds')}}" class="flex items-center text-gray-300 hover:text-green-700">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24"><path fill="#d2cbcb" d="M12.005 2c5.523 0 10 4.477 10 10s-4.477 10-10 10a9.96 9.96 0 0 1-6.383-2.302l-.244-.209l.901-1.902a8 8 0 1 0-2.27-5.837l-.004.25h2.5l-2.706 5.716A9.954 9.954 0 0 1 2.005 12c0-5.523 4.477-10 10-10m1 4v2h2.5v2h-5.5a.5.5 0 0 0-.09.992l.09.008h4a2.5 2.5 0 0 1 0 5h-1v2h-2v-2h-2.5v-2h5.5a.5.5 0 0 0 .09-.992l-.09-.008h-4a2.5 2.5 0 1 1 0-5h1V6z"/></svg>
                            <span class="links_name ml-2">Fonds</span>
                        </a>
                    </li>
                    <li id="statistics">
                        <a href="{{ route('statistiques') }}" class="flex items-center text-gray-300 hover:text-green-700">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 26 26"><path fill="#d2cbcb" d="M12.906-.031a1 1 0 0 0-.125.031A1 1 0 0 0 12 1v1H3a3 3 0 0 0-3 3v13c0 1.656 1.344 3 3 3h9v.375l-5.438 2.719a1.006 1.006 0 0 0 .875 1.812L12 23.625V24a1 1 0 1 0 2 0v-.375l4.563 2.281a1.006 1.006 0 0 0 .875-1.812L14 21.375V21h9c1.656 0 3-1.344 3-3V5a3 3 0 0 0-3-3h-9V1a1 1 0 0 0-1.094-1.031M2 5h22v13H2zm18.875 1a1 1 0 0 0-.594.281L17 9.563L14.719 7.28a1 1 0 0 0-1.594.219l-2.969 5.188l-1.219-3.063a1 1 0 0 0-1.656-.344l-3 3a1.016 1.016 0 1 0 1.439 1.44l1.906-1.906l1.438 3.562a1 1 0 0 0 1.812.125l3.344-5.844l2.062 2.063a1 1 0 0 0 1.438 0l4-4A1 1 0 0 0 20.875 6"/></svg>
                            <span class="links_name ml-2">Statistiques</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="log_out mt-auto">
                <a href="#" class="flex items-center mb-4 text-gray-300 hover:text-green-700">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="white" d="M19.9 12.66a1 1 0 0 1 0-1.32l1.28-1.44a1 1 0 0 0 .12-1.17l-2-3.46a1 1 0 0 0-1.07-.48l-1.88.38a1 1 0 0 1-1.15-.66l-.61-1.83a1 1 0 0 0-.95-.68h-4a1 1 0 0 0-1 .68l-.56 1.83a1 1 0 0 1-1.15.66L5 4.79a1 1 0 0 0-1 .48L2 8.73a1 1 0 0 0 .1 1.17l1.27 1.44a1 1 0 0 1 0 1.32L2.1 14.1a1 1 0 0 0-.1 1.17l2 3.46a1 1 0 0 0 1.07.48l1.88-.38a1 1 0 0 1 1.15.66l.61 1.83a1 1 0 0 0 1 .68h4a1 1 0 0 0 .95-.68l.61-1.83a1 1 0 0 1 1.15-.66l1.88.38a1 1 0 0 0 1.07-.48l2-3.46a1 1 0 0 0-.12-1.17ZM18.41 14l.8.9l-1.28 2.22l-1.18-.24a3 3 0 0 0-3.45 2L12.92 20h-2.56L10 18.86a3 3 0 0 0-3.45-2l-1.18.24l-1.3-2.21l.8-.9a3 3 0 0 0 0-4l-.8-.9l1.28-2.2l1.18.24a3 3 0 0 0 3.45-2L10.36 4h2.56l.38 1.14a3 3 0 0 0 3.45 2l1.18-.24l1.28 2.22l-.8.9a3 3 0 0 0 0 3.98m-6.77-6a4 4 0 1 0 4 4a4 4 0 0 0-4-4m0 6a2 2 0 1 1 2-2a2 2 0 0 1-2 2"/></svg>
                    <span class="text-red-500 hover:text-green-700 ml-2">Parametre</span>
                </a>
                <a href="{{ route('auth.logout') }}" class="flex items-center text-gray-300 hover:text-green-700">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><g fill="none" stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path d="M10 8V6a2 2 0 0 1 2-2h7a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2h-7a2 2 0 0 1-2-2v-2"/><path d="M15 12H3l3-3m0 6l-3-3"/></g></svg>
                    <span class="links_name ml-2">Déconnexion</span>
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
