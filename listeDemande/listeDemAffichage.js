document.addEventListener("DOMContentLoaded", function() {
    console.log("clic sur le lien 'valider' !");

    // Sélectionner l'élément du menu déroulant et le lien "Valider"
    var dropdownBtn = document.querySelector('.btn-action');
    var loginLink = document.querySelector('.btn-valider a[href="loginValidateur.php"]');

    // Ajouter un gestionnaire d'événement au clic sur le lien "Valider"
    if (loginLink) { // Vérification pour s'assurer que le lien existe
        loginLink.addEventListener('click', function(event) {
            // Empêcher le comportement par défaut du lien
            event.preventDefault();


            // Rediriger l'utilisateur vers la page de validation
            window.location.href = loginLink.getAttribute('href');
        });
    } else {
        console.log("Lien 'Valider' non trouvé !");
    }
});

