@extends('base')

@section('main-contain')
    <div class="grid grid-cols-4 grid-rows-12 gap-10 p-4" style="height: calc(100vh - 20px) ;">
        <!-- Grid 1 -->
        <a href="#" class="bg-teal-400 rounded-lg row-span-5 col-span-2 flex flex-col justify-center items-center">
            <div class="flex flex-col items-center">
                <span class="text-8xl mb-2"><svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 32 32"><path fill="black" d="M16 16a7 7 0 1 0 0-14a7 7 0 0 0 0 14m-8.5 2A3.5 3.5 0 0 0 4 21.5v.5c0 2.393 1.523 4.417 3.685 5.793C9.859 29.177 12.802 30 16 30s6.14-.823 8.315-2.207C26.477 26.417 28 24.393 28 22v-.5a3.5 3.5 0 0 0-3.5-3.5z"/></svg></span> <!-- Icône Font Awesome -->
                <p class="text-center text-2xl">515</p> <!-- Texte à côté de l'icône -->
                <span class="mt-auto text-2xl">Personnes</span> <!-- Texte en bas de l'icône -->
            </div>
        </a>
        <!-- Grid 2 -->
        <a href="#" class="bg-teal-400 rounded-lg p-4 row-span-10 col-span-2 flex flex-col justify-center items-center">
            <p class="text-center text-4xl">Statistiques</p> <!-- Texte à côté de l'icône -->
            <img src="{{asset('img/st2.svg')}}" height="75%" width="60%"/> <!-- Image SVG -->
        </a>
        <!-- Grid 3 -->
        <a href="#" class="bg-teal-400 rounded-lg p-4 row-span-5 col-span-2 flex flex-col justify-center items-center">
            <div class="flex flex-col items-center">
                <span class="text-8xl"><svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 24 24"><path fill="black" d="M7 14v-2h10v2zm0 4v-2h7v2zm-2 4q-.825 0-1.412-.587T3 20V6q0-.825.588-1.412T5 4h1V2h2v2h8V2h2v2h1q.825 0 1.413.588T21 6v14q0 .825-.587 1.413T19 22zm0-2h14V10H5z"/></svg></span> <!-- Icône Font Awesome -->
                <p class="text-center text-2xl mt-auto">Evenements</p>
            </div>
        </a>
        <!-- Grid 4 -->
        <a href="#" class="bg-teal-400 rounded-lg row-span-4 p-4 flex flex-col justify-center items-center">
            <div class="flex flex-col items-center">
                <span class="text-7xl"><svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" viewBox="0 0 24 24"><g fill="none"><path d="m12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035c-.01-.004-.019-.001-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427c-.002-.01-.009-.017-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093c.012.004.023 0 .029-.008l.004-.014l-.034-.614c-.003-.012-.01-.02-.02-.022m-.715.002a.023.023 0 0 0-.027.006l-.006.014l-.034.614c0 .012.007.02.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z"/><path fill="black" d="M11.5 3a4.502 4.502 0 0 1 4.336 3.292l.052.205l1.87-.467a1 1 0 0 1 1.233.84L19 7v1.81a6.517 6.517 0 0 1 1.364 1.882l.138.308H21a1 1 0 0 1 .993.883L22 12v3a1 1 0 0 1-.445.832l-.108.062l-1.168.585a6.525 6.525 0 0 1-2.02 2.325l-.259.174V20a1 1 0 0 1-.883.993L17 21h-3a1 1 0 0 1-.993-.883L13 20h-1a1 1 0 0 1-.883.993L11 21H8a1 1 0 0 1-.993-.883L7 20v-1.022a6.508 6.508 0 0 1-2.854-4.101a3.002 3.002 0 0 1-2.14-2.693L2 12v-.5a1 1 0 0 1 1.993-.117L4 11.5v.5c0 .148.032.289.09.415a6.504 6.504 0 0 1 2.938-4.411A4.5 4.5 0 0 1 11.5 3M17 8.28l-2.758.69l-.12.023L14 9h-3.5a4.5 4.5 0 0 0-2.045 8.51a1 1 0 0 1 .537.766L9 18.4v.6h1a1 1 0 0 1 .883-.993L11 18h3a1 1 0 0 1 .993.883L15 19h1v-.6a1 1 0 0 1 .545-.89a4.523 4.523 0 0 0 2.068-2.18a.999.999 0 0 1 .347-.417l.119-.07l.921-.461V13h-.207a1 1 0 0 1-.962-.728a4.504 4.504 0 0 0-1.468-2.244a1 1 0 0 1-.355-.644L17 9.257zM16 11a1 1 0 1 1 0 2a1 1 0 0 1 0-2m-4.5-6a2.5 2.5 0 0 0-2.478 2.169A6.52 6.52 0 0 1 10.5 7h3.377l.07-.017A2.5 2.5 0 0 0 11.5 5"/></g></svg></span> <!-- Icône Font Awesome -->
                <p class="text-center text-lg mt-auto">Solde total: 200 000 FCFA</p>
            </div>
        </a>
        <!-- Grid 5 -->
        <a href="{{route('create-fonds')}}"class="bg-teal-400 rounded-lg row-span-4 p-4 flex flex-col justify-center items-center">
            <div class="flex flex-col items-center">
                <span class="text-7xl"><svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 24 24"><g fill="none"><path d="M24 0v24H0V0zM12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035c-.01-.004-.019-.001-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427c-.002-.01-.009-.017-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093c.012.004.023 0 .029-.008l.004-.014l-.034-.614c-.003-.012-.01-.02-.02-.022m-.715.002a.023.023 0 0 0-.027.006l-.006.014l-.034.614c0 .012.007.02.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z"/><path fill="black" d="M10.5 20a1.5 1.5 0 0 0 3 0v-6.5H20a1.5 1.5 0 0 0 0-3h-6.5V4a1.5 1.5 0 0 0-3 0v6.5H4a1.5 1.5 0 0 0 0 3h6.5z"/></g></svg></span> <!-- Icône Font Awesome -->
                <p class="text-center text-lg mt-auto">Créer un fond</p>
            </div>
        </a>
        <!-- Grid 6 -->
        <a href="#" class="bg-teal-400 rounded-lg row-span-4 p-4 flex flex-col justify-center items-center">
            <div class="flex flex-col items-center">
                <span class="text-7xl"><svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 512 512"><path fill="none" stroke="black" stroke-linejoin="round" stroke-width="48" d="M144 144h320M144 256h320M144 368h320"/><path fill="none" stroke="black" stroke-linecap="square" stroke-linejoin="round" stroke-width="32" d="M64 128h32v32H64zm0 112h32v32H64zm0 112h32v32H64z"/></svg></i></span> <!-- Icône Font Awesome -->
                <p class="text-center text-lg mt-auto">Liste des fonds</p>
            </div>
        </a>
        <!-- Grid 7 -->
        <a href="{{ route('historique') }}" class="bg-teal-400 rounded-lg row-span-4 p-4 flex flex-col justify-center items-center">
            <div class="flex flex-col items-center">
                <span class="text-7xl"><svg xmlns="http://www.w3.org/2000/svg" width="84" height="84" viewBox="0 0 24 24"><path fill="black" d="M13.5 8H12v5l4.28 2.54l.72-1.21l-3.5-2.08zM13 3a9 9 0 0 0-9 9H1l3.96 4.03L9 12H6a7 7 0 0 1 7-7a7 7 0 0 1 7 7a7 7 0 0 1-7 7c-1.93 0-3.68-.79-4.94-2.06l-1.42 1.42A8.9 8.9 0 0 0 13 21a9 9 0 0 0 9-9a9 9 0 0 0-9-9"/></svg></span> <!-- Icône Font Awesome -->
                <p class="text-center text-lg mt-auto">Récentes activités</p>
            </div>
        </a>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Mettre en gras le lien du tableau de bord
            var dashboardElement = document.getElementById('dashboard');
            if (dashboardElement) {
                dashboardElement.style.fontWeight = 'bold';
            }
        });
    </script>

@endsection
