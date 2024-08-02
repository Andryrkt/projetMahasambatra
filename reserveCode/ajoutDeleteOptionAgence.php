<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h2>Supprimer une Agence</h2>
    <form action="" method="post">
        <input type="text" id="supprAgence" name="supprAgence">
        <button type="submit">Supprimer</button>
        <?php
        include('supprAgenceTraitement.php');
        ?>
    </form>
</body>
</html>
  