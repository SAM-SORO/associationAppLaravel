@extends('base')

@section('main-contain')

<div>
    je suis censer montre les statistique de paiement de cotisatiion pour l'association
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Mettre en gras le lien du tableau de bord
        var dashboardElement = document.getElementById('statistics');
        if (dashboardElement) {
            dashboardElement.style.fontWeight = 'bold';
        }
    });
</script>

@endsection
