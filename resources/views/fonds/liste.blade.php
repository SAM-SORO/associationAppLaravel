@extends('base')

@section('main-contain')
<div class="container mx-auto mt-8">
    <h1 class="text-2xl font-bold mb-4">Liste des fonds</h1>
    <table class="min-w-full bg-white">
        <thead>
            <tr>
                <th class="py-2 px-4 bg-gray-200">Nom</th>
                <th class="py-2 px-4 bg-gray-200">Montant</th>
                <th class="py-2 px-4 bg-gray-200">Début</th>
                <th class="py-2 px-4 bg-gray-200">Fin</th>
                {{-- <th class="py-2 px-4 bg-gray-200">Actions</th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach($fonds as $fond)
                <tr>
                    <td class="border px-4 py-2">{{ $fond->label }}</td>
                    <td class="border px-4 py-2">{{ $fond->montant }}</td>
                    <td class="border px-4 py-2">{{ $fond->debut }}</td>
                    <td class="border px-4 py-2">{{ $fond->fin }}</td>
                    {{-- <td class="border px-4 py-2">
                        <a href="{{ route('fonds.edit', $fond->id) }}" class="bg-blue-500 text-white px-2 py-1 rounded">Editer</a>
                        <form action="{{ route('fonds.destroy', $fond->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded">Supprimer</button>
                        </form>
                    </td> --}}
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
