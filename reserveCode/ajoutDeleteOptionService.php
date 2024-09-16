<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h2>Ajouter une nouvelle service</h2>
    <form action="" method="post">
        <input type="text" id="nouvelleService" name="nouvelleService"  required placeholder="Entrez le nom du service">
        <button type="submit">Ajouter</button>
        <?php
        include('ajoutServiceTraitement.php');
        ?>
    
    </form>
</body>
</html>