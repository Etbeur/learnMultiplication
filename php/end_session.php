<?php
// On demarre une session
session_start();
// Si logout est appelé
if(isset($_GET['logout'])){
    // On détruit les valeurs existantes dans cette session lors de la déconnexion
    session_destroy();
    // On redirige l'utilisateur sur la page de connexion une fois la session terminée
    header('location:connexion_compte.php?bye');
}
?>
