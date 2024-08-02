<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>Ajouter une nouvelle agence</h2>
      <form  action="../agenceService/agenceServiceFichierRelation.php" method="post" >
        <input type="text" id="nouvelleAgence" name="nouvelleAgence">
        <select name="nouvelleService[]" id="nouvelleService" multiple>
            <option value="" disabled>choisir service</option>
            <?php
            require_once 'agenceInitialisation.php';
            
            foreach ($services as $value) { 
               echo "<option value=\"" . $value['id'] . "\">" . $value['nom'] . "</option>";
           } ?>
         
        </select>
        <button name="action" type="submit">Envoyer</button>
    </form>
    
</body>

</html>