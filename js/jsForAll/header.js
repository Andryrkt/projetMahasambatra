document.addEventListener('DOMContentLoaded', function() {
    // Sélectionne tous les boutons avec la classe 'btn-no-border'
    var buttons = document.querySelectorAll('.btn-no-border');

    // Itère sur chaque bouton pour ajouter un gestionnaire d'événement 'click'
    buttons.forEach(function(button) {
        button.addEventListener('click', function() {
            // Supprime la bordure du bouton cliqué
            this.style.border = 'none';
        });
    });
});