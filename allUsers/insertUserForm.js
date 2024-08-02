document.addEventListener('DOMContentLoaded', function(){
    console.log("change not effected");
    var userRoleSelect = document.getElementById('userRole');
    var statutContainer =  document.getElementById('statutContainer');


     // Initialisation du style pour le conteneur statut
     statutContainer.style.display = 'none'; // Assurez-vous que le conteneur est caché par défaut

    userRoleSelect.addEventListener('change', function(){
        if(userRoleSelect.value === 'validateur') {
            statutContainer.style.display = 'block';
        }else {
            statutContainer.style.display = 'none';
        }
    }
    );
});