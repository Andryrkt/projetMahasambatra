<?php ob_start(); ?>
<div class="background-container d-flex align-items-center justify-content-center min-vh-100">
        <div class="background-image position-absolute w-100 h-100" style="background: url('image/wheel-excavator-coal-joystick-controls.webp') no-repeat center center; background-size: cover; z-index: -1;"></div>
        <div class="form-container">
            <form action="Controller/Login/loginController.php" method="post" class="login-container bg-transparent p-4 rounded-4  border border-4 border-light p-5">
                <input type="text" name="nom" id="nomInput" class="transparent-field mx-4 text-center" placeholder="Username"><br>
                <input type="password" name="mdp" id="mdp" class="transparent-field mx-4 mt-5 text-center" placeholder="Password"><br>
                <button type="submit" class="margin-left">LOGIN</button>
            </form>
        </div>
    </div>
    <?php $content = ob_get_clean(); ?>

    <?php 
        $title = "Connexion";
        $stylesheets = [
            "assets/css/login/login.css", // Ajoute ici le chemin vers ton fichier CSS
        ];
        $scripts = [
            "assets/js/login/login.js", // Ajoute ici le chemin vers ton fichier JS
        ];
    
    ?>
<?php require(__DIR__ .DIRECTORY_SEPARATOR.'/../layout.php') ?>