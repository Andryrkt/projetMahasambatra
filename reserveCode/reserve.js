 
 
   // alert("bonjour")
    //  test js 

        //     function ajouterAgence()
        //    {
        //     var select = document.getElementById("agenceSelect"),
        //     txtVal = document.getElementById("nouvelleAgence").value,
        //     newOption = document.createElement("OPTION"),
        //     newOptionVal = document.createTextNode(txtVal);
        //     option.value = txtVal.toUpperCase(); // La valeur est en majuscules pour correspondre au format des autres options


        //     newOption.appendChild(newOptionVal);
        //     select.insertBefore(newOption,select.lastChild);

        //      // Effacer le champ d'entrée après ajout
        // document.getElementById('val').value = '';
        //    }
   var agenceSelect = document.getElementById("agenceSelect");
        var serviceSelect = document.getElementById("serviceSelect");
        agenceSelect.addEventListener('change', updateService)
        function updateService() {
          // Récupérer la valeur sélectionnée dans le menu Agence
          var selectedAgence = agenceSelect.value;

          // Mettre à jour le champ de texte Agence
           // agenceInput.value = selectedAgence;

          // Effacer les options actuelles du menu Service
          serviceSelect.innerHTML = '';

          // Mettre à jour les options du menu Service en fonction de l'Agence choisie
          switch(selectedAgence) {
              case 'ANTANANARIVO':
                  addServiceOptions(['ASSURANCE','ATELIER', 'COMMERCIALE']);
                  break;
              case 'CESSNA IVATO':
                  addServiceOptions(['ATELIER','LOCATION COURTE DURABLE', 'MARCHE PUBLIC', 'NEGOCE']);
                  break;
                  case 'ANTALAHA':
                  addServiceOptions(['NEGOCE']);
                  break;
                  case 'FORT DAUPHIN':
                  addServiceOptions(['ATELIER', 'MARCHE PUBLIC', 'NEGOCE']);
                  break;
                  case 'AMBATOVY':
                  addServiceOptions(['ATELIER', 'FLEXIBLES', 'NENERGIE MAN','NEGOCE']);
                  break;
              // Ajouter d'autres cas pour chaque agence si nécessaire
              default:
                  // Par défaut, afficher un message ou une option générique
                  serviceSelect.innerHTML = '<option value="">Sélectionnez un service</option>';
                  break;
          }

          // Fonction pour ajouter des options au menu Service
          function addServiceOptions(options) {
              options.forEach(function(option) {
                  var opt = document.createElement('option');
                  opt.value = option;
                  opt.textContent = option;
                  serviceSelect.appendChild(opt);
              });
          }
      }