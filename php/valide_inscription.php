<?php

include 'connexion_bdd.php';


// vérification que les valeurs existent
if(isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirmation'])){
    // Si le mot de passe et le mdp de confirmation sont identiques
    if($_POST['password'] == $_POST['confirmation']){
        // Si le email n'est pas remplit
        if(empty($_POST['email'])){
            // On redirige vers le formulaire avec un message d'erreur spécifique
                header('location:inscription.php?noLog');
        // Sinon si le mdp et la confirmation contiennent plus de 4 caractères
        }elseif(strlen($_POST['password']) > 4 && strlen($_POST['confirmation']) > 4){

            // On stock les informations dans des variables
            $email = $_POST['email'];
            $password = $_POST['password'];

            //Préparation de l'insertion des données dans la BDD. !!! INSERT INTO se fait dans la table(présente dans la bdd) que l'on souhaite remplir
            $qInsertion = "INSERT INTO utilisateurs(email, password) VALUES(:email, :password)";
            $req = $connexion->prepare($qInsertion);

            $req->bindParam(":email", $email, PDO::PARAM_STR);
            $req->bindParam(":password", $password, PDO::PARAM_STR);
            $req->execute();

            // On dirige vers la page de connexion pour que l'utilisateur se connecte.
            header('location:connexion_compte.php?registrationTrue');

        }else{
            // Sinon on redirige vers le formulaire en spécifiant que les mdp et confirmation n'ont pas assez de caractères
            header('location:inscription.php?lenError=1');
        }
    }else{
        // Sinon l'email et la confirmation ne sont pas identiques, on redirige vers le formulaire avec un message d'erreur ciblé
        header('location:inscription.php?registrationFalse=1');
    }
}

?>
