
    function filterTable() {
        // Récupérer la valeur de la recherche
        const searchInput = document.getElementById('searchInput').value.toLowerCase();
        
        // Récupérer toutes les lignes du tableau
        const rows = document.querySelectorAll('tbody tr');
        
        // Parcourir toutes les lignes
        rows.forEach(row => {
            // Récupérer le texte de toutes les cellules de la ligne
            const cells = row.querySelectorAll('td');
            let match = false;
            
            cells.forEach(cell => {
                if (cell.textContent.toLowerCase().includes(searchInput)) {
                    match = true;
                }
            });
            
            // Afficher ou cacher la ligne en fonction du résultat de la recherche
            row.style.display = match ? '' : 'none';
        });
    }


    // js pour selectionner à un seul bouton
// Sélectionner les checkboxes
const idInput = document.getElementById('idInput');
const agenceInput = document.getElementById('agenceInput');
const serviceInput = document.getElementById('serviceInput');
const categorieInput = document.getElementById('categorieInput');
const statutInput = document.getElementById('statutInput');
const demandeurInput = document.getElementById('demandeurInput');
const typeDemandeInput = document.getElementById('typeDemandeInput');
const dateDebDemandeInput = document.getElementById('dateDebDemandeInput');

// Fonction pour gérer la sélection exclusive
function handleExclusiveCheckboxes(event) {
  // Récupérer la cible de l'événement
  const target = event.target;

  // Créer un tableau de toutes les checkboxes
  const checkboxes = [
    idInput,
    agenceInput,
    serviceInput,
    categorieInput,
    statutInput,
    demandeurInput,
    typeDemandeInput,
    dateDebDemandeInput
  ];

  // Désélectionner toutes les checkboxes sauf celle qui a déclenché l'événement
  checkboxes.forEach(checkbox => {
    if (checkbox !== target) {
      checkbox.checked = false;
    }
  });
}

// Ajouter des écouteurs d'événements aux checkboxes
idInput.addEventListener('change', handleExclusiveCheckboxes);
agenceInput.addEventListener('change', handleExclusiveCheckboxes);
serviceInput.addEventListener('change', handleExclusiveCheckboxes);
categorieInput.addEventListener('change', handleExclusiveCheckboxes);
statutInput.addEventListener('change', handleExclusiveCheckboxes);
demandeurInput.addEventListener('change', handleExclusiveCheckboxes);
typeDemandeInput.addEventListener('change', handleExclusiveCheckboxes);
dateDebDemandeInput.addEventListener('change', handleExclusiveCheckboxes);




