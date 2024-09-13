<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Ajouter une nouvelle categorie</h2>
    <form action="" method="post">
        <input type="text" id="nouvelleCategorie" name="nouvelleCategorie">
        <button type="submit">Ajouter</button><br>
        <?php
        include('ajoutCatTraitement.php');
        ?>
    </form>

    <h2>Supprimer la categorie</h2>
    <form action="" method="post">
        <input type="text" id="supprCategorie" name="supprCategorie">
        <button type="submit">Supprimer</button>
        <?php
        include('supprCatTraitement.php');
        ?>
    </form>
</body>
</html>