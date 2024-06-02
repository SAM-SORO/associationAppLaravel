@extends('base')

@section('main-contain')
<div class="container mx-auto mt-8 px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between items-center mb-6">
        <a href="{{ route('fonds.membres', $fonds->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700">
            Voir Membres
        </a>
        <h1 class="text-4xl font-bold text-gray-800">{{ $fonds->label }}</h1>
    </div>

    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-xl leading-6 font-semibold text-gray-900">
                Détails du fonds
            </h3>
        </div>
        <div class="border-t border-gray-200">
            <dl>
                <div class="bg-gray-50 px-6 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-md font-medium text-gray-500">
                        Nom
                    </dt>
                    <dd class="mt-1 text-md text-gray-900 sm:mt-0 sm:col-span-2">
                        {{ $fonds->label }}
                    </dd>
                </div>
                <div class="bg-white px-6 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-md font-medium text-gray-500">
                        Montant 
                    </dt>
                    <dd class="mt-1 text-md text-gray-900 sm:mt-0 sm:col-span-2">
                        {{ $fonds->montant }} fr
                    </dd>
                </div>
                <div class="bg-white px-6 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-md font-medium text-gray-500">
                        Montant en caisse
                    </dt>
                    <dd class="mt-1 text-md text-gray-900 sm:mt-0 sm:col-span-2">
                        {{ $all_member_paiements->sum('montant') }} fr
                    </dd>
                </div>
                <div class="bg-gray-50 px-6 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-md font-medium text-gray-500">
                        Début
                    </dt>
                    <dd class="mt-1 text-md text-gray-900 sm:mt-0 sm:col-span-2">
                        {{ $fonds->debut }}
                    </dd>
                </div>
                <div class="bg-white px-6 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-md font-medium text-gray-500">
                        Fin
                    </dt>
                    <dd class="mt-1 text-md text-gray-900 sm:mt-0 sm:col-span-2">
                        {{ $fonds->fin }}
                    </dd>
                </div>
                <div class="bg-gray-50 px-6 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-md font-medium text-gray-500">
                        Auteur
                    </dt>
                    <dd class="mt-1 text-md text-gray-900 sm:mt-0 sm:col-span-2">
                        {{ $fonds->auteur->nom ?? 'N/A' }} {{ $fonds->auteur->prenom ?? '' }}
                    </dd>
                </div>
                <div class="bg-white px-6 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-md font-medium text-gray-500">
                        Description
                    </dt>
                    <dd class="mt-1 text-md text-gray-900 sm:mt-0 sm:col-span-2">
                        {{ $fonds->description }}
                    </dd>
                </div>
            </dl>
        </div>
    </div>
</div>
@endsection

