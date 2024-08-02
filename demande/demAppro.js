
document.addEventListener("DOMContentLoaded",  function() {
  console.log("error !");

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


//  js nom 
  // Sélectionner l'élément input par son ID
const nomInput = document.getElementById('nomInput');
// Ajouter un écouteur d'événement 'input' au champ input
nomInput.addEventListener('input', function() {
    // Récupérer la valeur actuelle du champ
    let nomValue = nomInput.value;
    // Utiliser une expression régulière pour vérifier si la valeur ne contient que des lettres et espaces
    if (!/^[a-zA-Z\s]*$/.test(nomValue)) {
        // Si la valeur ne correspond pas à la regex, réinitialiser le champ à sa valeur précédente (sans le dernier caractère)
        nomInput.value = nomValue.slice(0, -1);
    }
});


//  script js pour changer automatiquement la première lettre en majuscule 
var nomInputMaj = document.getElementById('nomInput');
// "document":objet qui permet de manipuler le contenu et style Html
// getElementById('nom'): récupérer un élément HTML à partir de son attribut "id"
nomInput.addEventListener('change', capitalizeFirstLetter)
  function capitalizeFirstLetter() {
    // récupère la valeur du champ "nom"
    // nettoie des espaces au début et à la fin (trim()
    // vérifie si la première lettre n'est pas déjà une majuscule
    // met la première lettre en majuscule.
    var nomValue = nomInput.value.trim(); // Trim pour enlever les espaces au début et à la fin
    if (nomValue.length > 0) {
      var firstLetter = nomValue.charAt(0); // Récupère la première lettre du nom
      if (firstLetter === firstLetter.toLowerCase()) {   // Vérifie si la première lettre est en minuscule
       nomInput.value = firstLetter.toUpperCase() + nomValue.slice(1); // Met la première lettre en majuscule
      }
    }
  }


 //  fichier = afficher le nom du fichier sélectionné 
 window.updateFileLabel = function(input) {
  // console.log("Valeur du champ de fichier :", input.value);// Obtenez une liste de fichiers
  const fileNames = Array.from(input.files).map(file => file.name); // Récupérez les noms des fichiers  document.getElementById('fileNameLabel1').textContent =
  document.getElementById('fileNameLabel1').textContent =
  fileNames.length > 0 ? fileNames.join(', ') : "Aucun fichier sélectionné";};

    // js date et heure par defaut affiché
    //   const dateHeureInput = document.getElementById('dateHeureMasque');
    //   const now = new Date();
    //   const formattedDate = `${now.getFullYear()}-${(now.getMonth() + 1).toString().padStart(2, '0')}-${now.getDate().toString().padStart(2, '0')} ${now.getHours().toString().padStart(2, '0')}:${now.getMinutes().toString().padStart(2, '0')}:${now.getSeconds().toString().padStart(2, '0')}`;
    //   dateHeureAffichage.textContent = formattedDate; // Définir le contenu textuel de l'élément d'affichage

    //  js date et heure par defaut caché 
        const dateHeureInput = document.getElementById('dateHeureMasque');
        const now = new Date();//constructeur new Date():represente la date et heure actuel
        //formatter les dates et heure
        const formattedDate = `${now.getFullYear()}-${(now.getMonth() + 1).toString().padStart(2, '0')}-${now.getDate().toString().padStart(2, '0')} ${now.getHours().toString().padStart(2, '0')}:${now.getMinutes().toString().padStart(2, '0')}:${now.getSeconds().toString().padStart(2, '0')}`;
        dateHeureInput.value = formattedDate;//stocker date et heure caché

})