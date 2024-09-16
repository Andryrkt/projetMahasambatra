<?php
include 'demandeApproModel.php';

$agences = findAgence($conn);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Demande d'approvisionnement</title>
  <link rel="stylesheet" href="../bootstrap-5.3.3-dist/bootstrap-5.3.3-dist/css/bootstrap.min.css" />
  <!-- <link rel="stylesheet" href="demAppro.css" /> -->
</head>

<body>
  <div class="container">

    <h1 class="text-center">Demande d'approvisionnement</h1>
    
    <form action="demandeApproController.php" method="post" enctype="multipart/form-data">
      <div class="row">

        <div class="col-12 col-md-6 ">
          <h2>Emetteur</h2>
          <div class="row">
            <div class="col-12 col-md-6">
            <label for="">Agence</label>
            <input class="form-control" type="text"   disabled>
            </div>
            <div class="col-12 col-md-6">
            <label for="">Service</label>
            <input class="form-control" type="text"  disabled>
            </div>
          </div>
          
          
        </div>
        <!-- Début Agence et service debiteur -->
        <div class="col-12 col-md-6 ">
          <h2>Debiteur</h2>
          <div class="row">
            <div class="col-12 col-md-6">
            <label for="">Agence</label>
          <select class="form-select" name="agence" id="agence">
            <option value="0" selected> -- Choisir une agence --</option>
            <?php foreach($agences as $value){?>
              <option value="<?= $value['id'] ?>"><?= $value['nom'] ?></option>
            <?php } ?>
           
          </select>
            </div>
            <div class="col-12 col-md-6">
            <label for="">Service</label>
          <select class="form-select" name="service" id="service">
            <option selected>Open this select menu</option>
            <?php foreach($services as $value){?>
              <option value="<?php echo $value ?>"><?= $value ?></option>
            <?php } ?>
          </select>
            </div>
          </div>          
        </div>
      </div>
              <!-- FIN agenc eservic debiteur -->
      <div class="row">
        <div class="col-12 col-md-4">
        <label for="nom">Nom</label>
        <input class="form-control" type="text">
        </div>
        <div class="col-12 col-md-4">
        <label for="nom">Date</label>
        <input class="form-control" type="date">
        </div>
      </div>

      <div class="row">
        <div class="col-12 col-md-4">
        <p>Devis/Achat</p>
        <div class="form-check">
        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
        <label class="form-check-label" for="flexRadioDefault2">
          Default checked radio
        </label>
      </div>
        </div>
      </div>

    
      
     
        
        
        <!-- nom -->
        <div class="row mt-5">
          <div class="col col-3 text-center">
            
          </div>
          <div class="col">
            <input type="text" id="nomInput" class="formSelect" name="nom" onblur="capitalizeFirstLetter()" />
          </div>
        </div>

      <!-- date et heure masqué -->
      <div class="row mt-5">
        <div class="col margin-left-330">
          <!-- hidden:caché -->
          <input type="hidden" name="dateHeureMasque" id="dateHeureMasque">

          <!-- date et heure affiché -->
          <!-- <span id="dateHeureAffichage"></span> <input type="hidden" name="dateHeureEnregistrement" id="dateHeureEnregistrement">  </div> -->
        </div>

        <!-- date fin souhaité -->
        <div class="row">
          <div class="col-3 text-center">
            <label for="text">Fin souhaité</label>
          </div>
          <div class="col">
            <div class="date-picker">
              <input type="date" id="end_date" name="end_date" placeholder="Sélectionner une date...">
              <!-- <div class="calendar" id="calendar"></div> -->
            </div>
          </div>
        </div>
        
        <!-- devis et achat -->
        <div class="row mt-5">
          <div class="col col-3 text-center">
            <label for="type_demande">Devis/Achat</label>
          </div>
          <div class="col">
            <input type="radio" id="devisInput" name="type_demande" value="devis" checked>
            <label for="devisInput">Devis</label>
            <input type="radio" id="achatInput" name="type_demande" value="achat">
            <label for="achatInput">Achat</label>
          </div>
        </div>

        <!-- entretient vehicule/mat -->
        <div class="row mt-5">
          <div class="col col-3 text-center">
            <label for="equipement">Entretien Vehicule/Matériel</label>
          </div>
          <div class="col">
            <input type="radio" id="ouiInput" name="equipement" value="oui" checked>
            <label for="ouiInput">Oui</label>
            <input type="radio" id="nonInput" name="equipement" value="non">
            <label for="nonInput">Non</label>
          </div>
        </div>
        
        <!-- categorie -->
        <div class="row mt-5">
          <div class="col-3 text-center">
            <label for="categorie">Categorie</label>
          </div>
          <div class="col">
            <select name="categorie" id="categorieSelect" class="formSelect">
            </select>
          </div>
        </div>
        <!-- objet -->
        <div class="row mt-5">
          <div class="col-3 text-center">
            <label for="objet">Objet</label>
          </div>
          <div class="col">
            <input type="text" id="objetInput" class="formSelect" name="objet" />
          </div>
        </div>
        
        <!-- champ de fichier1 -->
        <div class="row mt-5">
          <div class="col margin-left-330">
            <label for="fichier1">Fichier joint1:</label>
            <input type="file" id="fichier1" name="fichier1[]" required style="display: none" multiple onchange="updateFileLabel(this)" />
            <!-- "display:none" masquage de l'element -->
            
            <button type="button" aria-label="Parcourir les fichiers" >
              Parcourir
            </button>
            
          </div>
        </div>
        <br><br>

        
        <!-- detail -->
        <div class="row mt-5">
          <div class="col-3 text-center">
            <label for="detail">Detail</label>
          </div>
          <div class="col">
            <textarea name="detail" id="textarea" rows="4" cols="50"></textarea>
          </div>
        </div>
        <!-- envoyer -->
        <div class="row ">
          <div class="col ">
            <button type="submit">Valider</button>
          </div>
        </div>
      </div>

  </form>
  
</div>
  <script src="demApp.js"></script>
  
</body>

</html>