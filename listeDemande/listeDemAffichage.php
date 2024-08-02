<?php
include ('listeDemTraitement.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="listeDemAffichage.css">
</head>
<body>
    <h1>Liste des demandes d'approvosionnement</h1>
    <table>
        <tr>
            <th></th>
            <th>Id</th>
            <th>Agence</th>
            <th>Service</th>
            <th>Demandeur</th>
            <th>Date/heureDem</th>
            <th>DF-Souhaité</th>
            <th>TypeDem</th>
            <th>Entretient_Equip</th>
            <th>Categorie</th>
            <th>Objet</th>
            <th>Piece-joint</th>
            <th>Detail</th>
            <th>Statut</th>
        </tr>
        <?php foreach ($users as $user): ?>
        <tr><td>
            <div class="btn-group">
            <button class="btn-action">Action</button>
            <div class="action-dropdown">
            <button class="btn-valider">
            <a href="../loginValidateur/loginValidateurForm.php?id=<?php echo $user['id']; ?>" >Valider</a>      
        </button>
            <button class="btn-supprimer">
                <a href="">Supprimer</a></button>

            </button>
            </div>
            </div>
        </td>
            <td><?php echo htmlspecialchars($user['id']); ?></td>
            <td><?php echo htmlspecialchars($user['agence']);?></td>
            <td><?php echo htmlspecialchars($user['service']);?></td>
            <td><?php echo htmlspecialchars($user['utilisateur']);?></td>
            <td><?php echo htmlspecialchars($user['date_heure_demande']);?></td>
            <td><?php echo htmlspecialchars($user['date_fin_souhaite']);?></td>
            <td><?php echo htmlspecialchars($user['type_demande']);?></td>
            <td><?php echo htmlspecialchars($user['entretient_equip']);?></td>
            <td><?php echo htmlspecialchars($user['categorie']);?></td>
            <td><?php echo htmlspecialchars($user['objet']);?></td>
            <td><?php echo htmlspecialchars($user['fichier1']);?></td>
            <td><?php echo htmlspecialchars($user['detail']);?></td>
            <td><?php include ('../statut/statutDemAffichage.php'); ?></td>

        </tr>
        <?php endforeach; ?>
    </table>

    <!-- js  -->

    <!-- <script src="listeDemAffichage.js"></script> -->
</body>
</html>