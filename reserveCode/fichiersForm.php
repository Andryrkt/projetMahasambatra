<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- champ de fichier  -->
      <div class="row mt-3">
        <label for="fileInput" class="form-label">Choisissez des fichiers</label><br>
        <div class="col-12">
        <input type="file" class="form-control" id="fichier" name="fichier[]" required style="display: none" onchange="updateFileLabel(this)" multiple> 
       <!-- "display:none" masquage de l'element  -->
      <button type="button" onclick="document.getElementById('fichier').click()"> 
          Parcourir
        </button>
        <span id="fileNameLabel">Aucun fichier séléctionné</span>
        <div class="form-text">Vous pouvez sélectionner plusieurs fichiers en même temps.</div>
        </div>
      </div> 
</body>
</html>
     