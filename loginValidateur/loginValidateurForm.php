<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="loginValidateur.css">
</head>

<body>
    <div class="boite">
        <form action="fichierRelationLogin.php?id=<?php echo htmlspecialchars($_GET['id']); ?>" method="post">
            <label for="name">Nom</label><br>
            <input type="text" name="name" id="name" placeholder="Entrez nom du validateur" autocomplete="username" required><br><br>

            <label for="password">Mot de passe</label><br>
            <input type="password" name="password" id="password" placeholder="Entrez le mot de passe" autocomplete="current-password" required><br><br>

            <!--autocomplete remplir automatiquement le champ avec le mot de passe actuellement enregistré pour l'utilisateur -->

            <button type="submit" name="submit">Login</button>
        </form>
    </div>
</body>

</html>