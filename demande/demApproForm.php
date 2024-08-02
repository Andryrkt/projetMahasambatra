<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Demande d'approvisionnement</title>
  <link rel="stylesheet" href="../bootstrap-5.3.3-dist/bootstrap-5.3.3-dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="demAppro.css" />
</head>

<body>

  <form action="demApproTraitement.php" method="post" enctype="multipart/form-data">

    <div class="container mt-5 border rounded-3 p-2">
      <h1 class="text-center">Demande d'approvisionnement</h1>
      <br />
      <div class="row justify-content-center gap-5">
        <div class="col col-3 text-center border">Emetteur</div>
        <div class="col col-3 text-center border">Debiteur</div>
      </div>

      <!-- agence -->
      <div class="row mt-5">
        <div class="col-3 text-center">
          <label for="agence">Agence</label>
        </div>
        <div class="col-3">
          <input type="text" id="agenceInput" class="formSelect" placeholder="ADMINISTRATION" disabled />
        </div>
        <div class="col-6">
          <select name="agence" id="agenceSelect" class="formSelect" onchange="updateService()">
            <option value="" selected>------Choisir Agence------</option>
            <option value="ANTANANARIVO">ANTANANARIVO</option>
            <option value="CESSNA IVATO">CESSNA IVATO</option>
            <option value="ANTALAHA">ANTALAHA</option>
            <option value="FORT DAUPHIN">FORT D'AUPHIN</option>
            <option value="AMBATOVY">AMBATOVY</option>
            <option value="TAMATAVE">TAMATAVE</option>
            <option value="RENTAL">RENTAL</option>
            <option value="PNEUMATIQUE-OUTILLAGE-LUBRIF">PNEUMATIQUE-OUTILLAGE-LUBRIF</option>
            <option value="ADMINISTRATION">ADMINISTRATION</option>
            <option value="COMM ENERGIE">COMM ENERGIE</option>
            <option value="ENERGIE DURABLE">ENERGIE DURABLE</option>
            <option value="ENERGIE JIRAMA">ENERGIE JIRAMA</option>
            <option value="HFF TRAVEL AIRWAYS">HFF TRAVEL AIRWAYS</option>
            <option value="HFF TRAVEL SERVICE">HFF TRAVEL SERVICE</option>
            <option value="SAMA MANUTENTION">SAMA MANUTENTION</option>
            <option value="SMR ASSOCIATES SA">SMR ASSOCIATES SA</option>
            <option value="SOMAVA">SOMAVA</option>
            <option value="NATEMA">NATEMA</option>
            <option value="SOMECA">SOMECA</option>
            <option value="SEYCHELLES">SEYCHELLES</option>

            <?php
            include('../agence/afficheAgenceTraitement.php');
            include('../agenceService/agenceServiceAffichage.php');
            ?>

          </select>
        </div>
      </div>



      <!-- service -->
      <div class="row mt-5">
        <div class="col-3 text-center">
          <label for="service">Service</label>
        </div>
        <div class="col-3">
          <input type="text" id="serviceInput" class="formSelect" placeholder="APPRO" disabled />
        </div>
        <div class="col-6">
          <select name="service" id="serviceSelect" class="formSelect">
            <option selected>------Choisir Service-----</option>
            <optgroup label="ASSURANCE">
              <option value="ATELIER">ATELIER</option>
              <option value="COMMERCIALE">COMMERCIALE</option>
            </optgroup>
            <optgroup label="ATELIER">
              <option value="LOCATION COURTE DURABLE">LOCATION COURTE DURABLE</option>
              <option value="MARCHE PUBLIC">MARCHE PUBLIC</option>
              <option value="NEGOCE">NEGOCE</option>
            </optgroup>
            <optgroup label="NEGOCE">
              <option value="IMPORT">IMPORT</option>
              <option value="EXPORT">EXPORT</option>
            </optgroup>
            <?php
            include('../service/afficheServiceTraitement.php');
            include('../agenceService/agenceServiceAffichage.php');

            ?>
          </select>
        </div>
      </div>


      <!-- nom -->
      <div class="row mt-5">
        <div class="col col-3 text-center">
          <label for="nom">Nom</label>
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
              <option selected>------Choisir catégorie------</option>
              <option value="ANNONCE">ANNONCE</option>
              <option value="CONSOMMABLE INFORMATIQUE">CONSOMMABLE INFORMATIQUE</option>
              <option value="ENTRETIEN">ENTRETIEN</option>
              <option value="FORMATION">FORMATION</option>
              <option value="FOURNITURE DE BUREAU">FOURNITURE DE BUREAU</option>
              <option value="HABILLEMENT PERSONNEL">HABILLEMENT PERSONNEL</option>
              <option value="LOCATION MATERIEL ET VEHICULE">LOCATION MATERIEL ET VEHICULE</option>
              <option value="MATERIEL INFORMATIQUE">MATERIEL INFORMATIQUE</option>
              <option value="MOBILIER DE BUREAU">MOBILIER DE BUREAU</option>
              <option value="PETIT OUTILLAGE">PETIT OUTILLAGE</option>
              <?php
              include('../categorie/afficheCatTraitement.php');
              ?>

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

            <button type="button" aria-label="Parcourir les fichiers" onclick="document.getElementById('fichier1').click()">
              Parcourir
            </button>
            <span id="fileNameLabel1">Aucun fichier séléctionné</span>
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
    </div>
  </form>

  <script src="demAppro.js"></script>

</body>

</html>