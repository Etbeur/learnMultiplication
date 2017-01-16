<?php
// On ouvre une session
session_start();

// Function qui affichera un message suivant la situation
function message(){
    // Si l'inscription est bonne
    if(isset($_GET['registrationTrue'])){
        echo '<div class="alert alert-success" role="alert">Votre inscription a bien été prise en compte, vous pouvez maintenant vous connecter.</div>';
    // Si l'email ou mdp est inccorect
    }elseif(isset($_GET['ErrorPassLog'])){
        echo '<div class="alert alert-danger" role="alert">Login ou mot de passe incorrect.</div>';
        // Si les champs sont vides
    }elseif(isset($_GET['empty'])){
        echo '<div class="alert alert-danger" role="alert">Vous n\'avez pas renseigné votre login et votre mot de passe.</div>';
    // Si l'utilisateur se déconnecte
    }elseif(isset($_GET['bye'])){
        echo '<div class="alert alert-success" role="alert">Vous êtes à présent déconnecté, à bientôt.</div>';
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Connexion à mon compte</title>
        <link rel="stylesheet" href="/css/style_compte_connexion.min.css">
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

        <!-- Formulaire de connexion -->

    <form action="valide_connexion.php" method="post" class="form-horizontal">
        <div class ="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        <h1 class="text-center">Connexion</h1>
                        <a id="aller_inscription" class="text-center" href="inscription.php">Vous n'avez pas encore de compte?</a>
                        <!-- Appel de la fonction php -->
                        <?php echo message() ?>
                        </div>
                        <div class="panel-body">
                            <label>Email</label>
                            <input type="email" name= "email" placeholder="Email" class="form-control"/></br>

                            <label>Password </label>
                            <input type="password" name="password" placeholder="Password" class="form-control"/></br>

                            <button type="submit" class="btn btn-default" name="valider">Valider</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <footer id="pied_de_page">
        <p>
            Designed and created by <a href="https://github.com/etbeur">Etbeur</a> - 2016
        </p>
    </footer>
    </body>
</html>
