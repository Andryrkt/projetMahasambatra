<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- TITRE dynamique -->
    <title><?= isset($title) ? $title : 'Demande d\'Approvisionnement'; ?></title>

    <!-- Insertion de CSS dynamique -->
    <?php if (isset($stylesheets) && is_array($stylesheets)): ?>
        <?php foreach ($stylesheets as $stylesheet): ?>
            <link rel="stylesheet" href="<?= $stylesheet; ?>">
        <?php endforeach; ?>
    <?php endif; ?>

    <!-- insertion de bootstrap -->
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <!-- insertion de css generale -->
    <link rel="stylesheet" href="Css/Login/login.css">


</head>
<body>

<!-- insertion du contenu dynamique-->
<?=$content?>

<!-- Insertion de JS dynamique -->
<?php if (isset($scripts) && is_array($scripts)): ?>
    <?php foreach ($scripts as $script): ?>
        <script src="<?= $script; ?>"></script>
    <?php endforeach; ?>
<?php endif; ?>

<!-- insertion du javascript bootstrap -->
<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<!-- <script type="module" src="JS/index.js"></script>  -->
</body>
</html>