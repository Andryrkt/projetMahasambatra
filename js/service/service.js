 // Fonction pour mettre tout le texte en majuscules
 function convertToUpperCase(event) {
    event.target.value = event.target.value.toUpperCase();
}

// Attacher l'événement 'input' au champ de texte
document.getElementById('nouvelleService').addEventListener('input', convertToUpperCase);