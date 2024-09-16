<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Ajout user</h1>
<form action="insertUserTraitement.php" method="post">
    <label for="nom">Nom</label><br>
    <input type="text" name="nom" id="nom" required><br><br>
    <label for="prenom">Prenom</label><br>
    <input type="text" name="prenom" id="prenom" required><br><br>
    <label for="mdp">Mot de passe</label><br>
    <input type="password" name="mdp" id="mdp" required><br><br>
    <label for="userRole">Rôle</label><br>
    <select name="userRole" id="userRole">
        <option value="utilisateur">Utilisateur</option>
        <option value="validateur">Validateur</option>
        <option value="admin">Administrateur</option>
    </select><br><br>
<!-- div caché:display:none -->
    <div id="statutContainer" style="display: none;">
    <label for="statut">Statut</label>
    <select name="statut" id="statut">
        <option value="APPROUV">A APPROUVER</option>
        <option value="ENCOURS APPR">STOCK</option>
        <option value="ENCOURS ACHAT">ACHAT DIRECT</option>
    </select>
    </div>
    <br>
    <button type="submit">Valider</submit>
</form>


<script src="insertUserForm.js"></script>
</body>

</html>