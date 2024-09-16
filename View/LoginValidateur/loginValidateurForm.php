<?php
// session_start();
// include '../../Model/LoginValidateur/loginValidateurModel.php';
// $conn = obtenirConnexionBD();

// Générer et stocker le Token si ID est présent
// $token = '';
// if (isset($_GET['id'])) {
//     $id = $_GET['id'];
//     $results = obtenirDemandesParId($id);
//     $token = bin2hex(random_bytes(32));
//     $_SESSION['tokens'][$token] = $id;
// } else {
//     echo "ID non fourni.";
//     exit;
// }
include_once '../../Controller/LoginValidateur/loginValidateurController.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../Css/LoginValidateur/loginValidateur.css">
    <link rel="stylesheet" href="../../bootstrap-5.3.3-dist/bootstrap-5.3.3-dist/css/bootstrap.min.css" />

</head>

<body>
    <div class="background d-flex align-items-center justify-content-center min-vh-100 ">
        <div class="background-image position-absolute w-100 h-100" style="background: url('../../image/tractafric equipement.jpg') no-repeat center center; background-size: cover; z-index: -1;"></div>
        <div class="login-container rounded-3 w-md-50 p-5 border border-1 border-white">
            <div class="login-header d-flex flex-column">
                <span class="text-dark">Login</span>
                <span class="text-dark fs-5">Validateur</span>
            </div>
            <br><br><br>
            <form action="../../Controller/LoginValidateur/loginValidateurController.php?id=<?php echo htmlspecialchars($id); ?>" method="post">
               
                <div class="form-floating mb-3 text-white">
                    <input type="text" class="form-control  rounded-pill transparent-field text-white" id="nomInput" name="name" placeholder="Nom" autocomplete="username" required>
                    <label for="floatingName">Nom</label>
                </div>
                <div class="form-floating text-white">
                    <input type="password" class="form-control rounded-pill transparent-field text-white" id="floatingPassword" name="password" placeholder="Password" autocomplete="current-password" required>
                    <label for="floatingPassword">Password</label>
                </div>
                <button type="submit" name="bouton" class="btn bg-white btn-lg w-100 rounded-pill mt-5">Connecter</button>
            </form>
        </div>
    </div>
    </div>

    <!-- script -->
    <script src="../../js/Login/login.js"></script>
</body>

</html>