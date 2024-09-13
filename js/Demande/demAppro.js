
document.addEventListener("DOMContentLoaded",  function() {
  console.log("Script chargé avec succès.");

      var agenceSelect = document.getElementById("agenceSelect");
    var serviceSelect = document.getElementById("serviceSelect");
    
    agenceSelect.addEventListener('change', updateService);
    
    function updateService() {
      
     // Récupérer la valeur sélectionnée dans le menu Agence
        var selectedAgence = agenceSelect.value;
    
        // Réinitialiser les options de service
        serviceSelect.innerHTML = '';
    
        // Si aucune agence n'est sélectionnée, ne rien faire
        if (selectedAgence === "") {
            serviceSelect.innerHTML = '<option value="">------sélectionner un  Service------</option>';
            return;
        }
    
        // Obtenir les services pour l'agence sélectionnée à partir des données préchargées
        // console.log('Selected Agence:', selectedAgence);
        // console.log('Available Services:', servicesByAgence);
        var services = servicesByAgence[selectedAgence];
    
        // Ajouter les options de service correspondantes
        if (services) {
            services.forEach(function(service) {
                var option = document.createElement('option');
                option.value = service;
                option.textContent = service;
                serviceSelect.appendChild(option);
            });
        } else {
            serviceSelect.innerHTML = '<option value="">Aucun service disponible pour cette agence</option>';
        }
    }


    // js pour mettre la première lettre de chaque mot en majuscule
function capitalizeWords(text) {
  return text.replace(/\b\w/g, char => char.toUpperCase());
}

document.getElementById('nomInput').addEventListener('input', function() {
  this.value = capitalizeWords(this.value);
});



//  js pour mettre authomatiquement la prémière lettre en majuscule
 // Sélection des éléments input et textarea par leurs ID
 const objetInput = document.getElementById('objetInput');
 const detailTextarea = document.getElementById('floatingTextarea2');

 // Fonction pour capitaliser la première lettre
 function capitalizeFirstLetter(element) {
   let value = element.value.trim(); // Trim pour enlever les espaces au début et à la fin
   if (value.length > 0) {
     let firstLetter = value.charAt(0); // Récupère la première lettre
     if (firstLetter === firstLetter.toLowerCase()) { // Vérifie si la première lettre est en minuscule
       element.value = firstLetter.toUpperCase() + value.slice(1); // Met la première lettre en majuscule
     }
   }
 }


 // Fonction pour vérifier les caractères autorisés (lettres et espaces)
 function validateInput(element) {
   let value = element.value;
   // Expression régulière pour autoriser uniquement les lettres et espaces
   if (!/^[a-zA-Z\s]*$/.test(value)) {
     // Si la valeur ne correspond pas à la regex, réinitialiser le champ à sa valeur précédente (sans le dernier caractère)
     element.value = value.slice(0, -1);
   }
 }

 // Ajouter des écouteurs d'événements aux champs
 nomInput.addEventListener('input', function() {
   validateInput(nomInput); // Valider les caractères autorisés
 });
 
 nomInput.addEventListener('blur', function() {
   capitalizeFirstLetter(nomInput); // Capitaliser la première lettre au focus perdu
 });

 objetInput.addEventListener('blur', function() {
   capitalizeFirstLetter(objetInput); // Capitaliser la première lettre au focus perdu
 });

 detailTextarea.addEventListener('blur', function() {
   capitalizeFirstLetter(detailTextarea); // Capitaliser la première lettre au focus perdu
 });


//  js pour séléctionner un seul bouton
 // Sélectionner les checkboxes "Devis" et "Achat"
 const devisInput = document.getElementById('devisInput');
 const achatInput = document.getElementById('achatInput');
 
 // Sélectionner les checkboxes "Oui" et "Non"
 const ouiInput = document.getElementById('ouiInput');
 const nonInput = document.getElementById('nonInput');
 
 // Fonction pour gérer la sélection exclusive
 function handleExclusiveCheckboxes(event) {
   // Vérifier le groupe Devis/Achat
   if (devisInput.checked && achatInput.checked) {
     if (event.target === devisInput) {
       achatInput.checked = false;
     } else if (event.target === achatInput) {
       devisInput.checked = false;
     }
   }
   
   // Vérifier le groupe Oui/Non
   if (ouiInput.checked && nonInput.checked) {
     if (event.target === ouiInput) {
       nonInput.checked = false;
     } else if (event.target === nonInput) {
       ouiInput.checked = false;
     }
   }
 }

 // Ajouter des écouteurs d'événements aux checkboxes du groupe Devis/Achat
devisInput.addEventListener('change', handleExclusiveCheckboxes);
achatInput.addEventListener('change', handleExclusiveCheckboxes);

// Ajouter des écouteurs d'événements aux checkboxes du groupe Oui/Non
ouiInput.addEventListener('change', handleExclusiveCheckboxes);
nonInput.addEventListener('change', handleExclusiveCheckboxes);



 // fichier = afficher le nom du fichier sélectionné 
 window.updateFileLabel = function(input) {
  // console.log("Valeur du champ de fichier :", input.value);// Obtenez une liste de fichiers
  const fileNames = Array.from(input.files).map(file => file.name); // Récupérez les noms des fichiers  document.getElementById('fileNameLabel1').textContent =
  document.getElementById('fileNameLabel1').textContent =
  fileNames.length > 0 ? fileNames.join(', ') : "Aucun fichier sélectionné";};

 //Bouton nnuler demande
 document.getElementById('annulerDemandeButton').addEventListener('click', function() {
  const token = new URLSearchParams(window.location.search).get('token');
  if (token) {
      if (confirm('Êtes-vous sûr de vouloir annuler cette demande ?')) {
          // Redirection vers le script PHP pour annuler la demande
          window.location.href = `../../Controller/Demande/demApproController.php?action=annuler&token=${encodeURIComponent(token)}`;
      }
  } else {
      alert('Aucune demande à annuler.');
  }
});

});


