import './bootstrap';

import 'boxicons'



document.addEventListener('DOMContentLoaded', function () {
    // Sélectionne les boutons déclencheurs des dropdowns
    const dropdownButtonFonds = document.getElementById('dropdownHoverButtonFonds');
    const dropdownButtonTri = document.getElementById('dropdownHoverButtonTri');

    // Sélectionne les menus déroulants
    const dropdownMenuFonds = document.getElementById('dropdownHoverFonds');
    const dropdownMenuTri = document.getElementById('dropdownHoverTri');

    // Appel de la fonction pour initialiser les menus déroulants avec les éléments spécifiés
    initDropdownMenu(dropdownButtonFonds, dropdownMenuFonds);
    initDropdownMenu(dropdownButtonTri, dropdownMenuTri);
});

function initDropdownMenu(dropdownButton, dropdownMenu) {
    // Vérifie si les éléments du dropdown ont été correctement passés en paramètres
    if (dropdownButton && dropdownMenu) {
        // Fonction pour basculer l'état du menu déroulant
        const toggleDropdown = () => {
            // Ferme tous les menus déroulants ouverts
            closeAllDropdowns();

            // Ouvre ou ferme le menu déroulant actuel
            dropdownMenu.classList.toggle('hidden');
        };

        // Écoute l'événement de clic sur le bouton pour ouvrir/fermer le menu déroulant
        dropdownButton.addEventListener('click', toggleDropdown);

        // Ajoute un écouteur d'événements sur le document pour détecter les clics
        document.addEventListener('click', (event) => {
            // Ferme le menu déroulant si le clic a eu lieu en dehors du bouton et du menu déroulant
            if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
                dropdownMenu.classList.add('hidden');
            }
        });
    }
}

function closeAllDropdowns() {
    const dropdowns = document.querySelectorAll('.dropdown-menu');
    dropdowns.forEach(dropdown => {
        dropdown.classList.add('hidden');
    });
}
