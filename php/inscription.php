<?php
// Fonction qui affichera le message d'erreur adéquat
function errorMessage(){
    // Si le password et la confirmation ne sont pas identiques
    if(isset($_GET['registrationFalse'])){
        echo '<div class="alert alert-danger" role="alert">Vos mots de passe ne sont pas identiques.</div>';
        // Sinon si la longueur du password et de la confirmation est inférieure à 4 caractères
    } elseif(isset($_GET['lenError'])){
        echo '<div class="alert alert-danger" role="alert">Votre mot de passe doit faire plus de 4 caractères.</div>';
        // Sinon si l'email n'est pas remplit
    } elseif(isset($_GET['noLog'])){
        echo '<div class="alert alert-danger" role="alert">Veuillez indiquer un login</div>';
    }
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Créer un compte ou se connecter</title>
        <link rel="stylesheet" href="/css/style_compte_inscription.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    </head>
    <body>
        <!-- Lien pour retourner à l'accueil -->
        <nav>
            <ul>
                <li><a href="index.php" id="accueil">Accueil</a></li>
            </ul>
        </nav>

        <!-- Formulaire d'inscription -->
        <form action="valide_inscription.php" method="post" class="form-horizontal">
        <div class ="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        <h1 class="text-center">Inscription</h1>
                        <a id="aller_connexion" class="text-center" href="connexion_compte.php">Je possède déjà un compte?</a>
                        </div>
                        <!-- Appel de la fonction -->
                        <?php
                            echo errorMessage();
                        ?>

                        <div class="panel-body">
                            <label>Email</label>
                            <input type="email" name= "email" placeholder="Email" class="form-control"/></br>

                            <label>Password </label>
                            <input type="password" name="password" placeholder="Password" class="form-control"/></br>

                            <label>Confirmation</label>
                            <input type="password" name="confirmation" placeholder="Confirmer votre Password" class="form-control"/></br>
                            <label>

                            <button type="submit" class="btn btn-default" name="valider">Valider</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer id="pied_de_page">
            <p>
                Designed and created by <a href="https://github.com/etbeur">Etbeur</a> - 2016
            </p>
        </footer>
    </body>
</html>
