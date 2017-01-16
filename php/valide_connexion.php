<?php

include 'connexion_bdd.php';

// Vérification que les valeurs existent dans la case et qu'elles n'ont pas été laissé vide par le user
if(isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['password']) && !empty($_POST['password'])){

    // Si c'est bon on stock les informations dans des variables
    $email = $_POST['email'];
    $password = $_POST['password'];

    // On crée une requête préparée pour pouvoir vérifier l'email et le password que l'utilisateur a saisit
    $qSelection = ('SELECT * FROM utilisateurs WHERE email = :email AND password = :password');
    $req = $connexion->prepare($qSelection);

    $req->bindValue(":email", $email, PDO::PARAM_STR);
    $req->bindValue(":password", $password, PDO::PARAM_STR);
    $req->execute();

    // fetch retournera le résultat de chaque ligne une à une sous forme de tableau
    $resultat = $req->fetch();

    // On ferme la requête
    $req->closeCursor();

    // Si le tableau retourné par fetch contient des données
    if($resultat != null){
        // Si la paire email/password est la bonne
        if($resultat['email'] == $email && $resultat['password'] == $password){
            // On démarre une session, on crée une session utilisateur et on prépare un msg de bienvenue
            session_start();
            $_SESSION['user'] = $email;
            $passOk = "Bienvenue sur le site " .$email ;


        }else{
            // Si mauvaise combinaison, erreur
            header('location:connexion_compte.php?ErrorPassLog');
        }
    }else{
        // Si l'appel a fetch retourne une ligne vide
        header('location:connexion_compte.php?ErrorPassLog');
    }
}else{
    // Si email ou password est inexistant ou vide
    header('location:connexion_compte.php?empty');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Connexion reussit</title>
        <link rel="stylesheet" href="/css/style.min.css"/>
    </head>
    <body>
        <div id="connexion_reussit">

            <!-- Phrase d'accueil lorsque la connexion est bonne -->

        <?php
            if($email){
                echo '<div>'. $passOk . ' <a href="index.php">Clique ici pour accéder au menu</a></div>';
            }
        ?>

        </div>

        <footer id="pied_de_page">
            <p>
                Designed and created by <a href="https://github.com/etbeur">Etbeur</a> - 2016
            </p>
        </footer>
    </body>
</html>
