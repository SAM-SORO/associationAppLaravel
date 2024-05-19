{{-- @extends('base')

@section('main-contain')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6">Paiements pour {{ $membre->nom }} {{ $membre->prenom }} sur le fonds {{ $fonds->label }}</h1>

    <div class="bg-white shadow overflow-hidden sm:rounded-lg mb-6">
        <div class="px-4 py-5 sm:px-6">
            <h3 class="text-lg leading-6 font-medium text-gray-900">Informations sur le fonds :</h3>
        </div>
        <div class="border-t border-gray-200">
            <dl>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Département :</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $fonds->departement_nom }}</dd>
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Montant Par personne :</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $fonds->montant }}</dd>
                </div>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Description :</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $fonds->description }}</dd>
                </div>
                <!-- Ajoutez d'autres informations sur le fonds selon vos besoins -->
            </dl>
        </div>
    </div>

    @if($paiements->isEmpty())
        <p class="text-gray-600">Aucun paiement trouvé pour ce fonds.</p>
    @else
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white shadow overflow-hidden border border-gray-200 sm:rounded-lg">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="py-3 px-6 text-left text-sm font-semibold text-gray-700">Montant</th>
                        <th class="py-3 px-6 text-left text-sm font-semibold text-gray-700">Mode</th>
                        <th class="py-3 px-6 text-left text-sm font-semibold text-gray-700">Date</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($paiements as $paiement)
                        <tr>
                            <td class="py-4 px-6 text-sm text-gray-900">{{ $paiement->montant }}</td>
                            <td class="py-4 px-6 text-sm text-gray-900">{{ $paiement->mode }}</td>
                            <td class="py-4 px-6 text-sm text-gray-900">{{ $paiement->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection --}}


@extends('base')

@section('main-contain')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6 text-center text-green-600">Info de paiement Pour le Membre</h1>

    <div class="bg-white shadow rounded-lg p-6 mb-6">

        <h2 class="text-2xl font-semibold mb-2 text-gray-800">Détails du Membre</h2>
        <p class="mb-2"><span class="font-bold text-gray-700">Nom :</span> {{ $membre->nom }}</p>
        <p class="mb-2"><span class="font-bold text-gray-700">Prenom :</span> {{ $membre->prenom }}</p> 
        @if(!$member_paiements->isEmpty())
        <p class="mb-4"><span class="font-bold text-gray-700">Mode De paiement :</span> {{ $member_paiements->first()->mode }}</p>    
        @endif
        <h2 class="text-2xl font-semibold mb-2 text-gray-800">Détails du Fonds</h2>
        <p class="mb-2"><span class="font-bold text-gray-700">Departement :</span> {{ $fonds->departement_nom }}</p>
        <p class="mb-2"><span class="font-bold text-gray-700">Nom du Fonds :</span> {{ $fonds->label }}</p>  
        <p class="mb-2"><span class="font-bold text-gray-700">Montant Par Membre :</span> <span class="text-green-600">{{ $fonds->montant }} XOF</span></p>
        <p class="mb-2"><span class="font-bold text-gray-700">Montant Total Comptant du Fonds :</span> <span class="text-blue-600">{{ $all_member_paiements->sum('montant') }} XOF</span></p>
        @if($member_reste  > 0)
            <p class="mb-2"><span class="font-bold text-gray-700">Montant Restant :</span> <span class="text-red-600">{{ $member_reste  }} XOF</span></p>
        @else
            <p class="mb-2"><span class="font-bold text-gray-700">Statut :</span> <span class="text-green-600">Soldé</span></p>
        @endif
    </div>

    @if($member_paiements->isEmpty())
        <p class="text-gray-600 text-center">Aucun paiement trouvé pour ce fonds.</p>
    @else
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="py-3 px-6 text-left text-sm font-semibold text-gray-700">Montant</th>
                        <th class="py-3 px-6 text-left text-sm font-semibold text-gray-700">Date</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($member_paiements as $paiement)
                        <tr>
                            <td class="py-4 px-6 text-sm text-gray-900">{{ $paiement->montant }}</td>
                            <td class="py-4 px-6 text-sm text-gray-900">{{ $paiement->created_at->format('d/m/Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
