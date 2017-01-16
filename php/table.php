<?php
// On démarre une session
session_start();

 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" name="viewport" content="width=device-width, height=device-height initial-scale=1.0, user-scalable=yes, shrink-to-fit=no"/>
    <title>Les tables de multiplications</title>
    <link rel="stylesheet" href="/css/style_table.min.css"/>
  </head>

<body onload="onLoad()">
    <div class="infos_user">
        <?php
            // Si aucune session n'est active (utilisateur non connecté), on le précise
            if(!isset($_SESSION['user'])){
                echo '<p>Vous êtes actuellement sur le site en tant que visiteur.</p>';
            // Si une session est existante, on crée un boutton de déconnexion et on indique au visiteur qu'il est connecté
            }else{
                echo '<p>Connecté en tant que '. $_SESSION['user'] . '!</p>';
                echo '<a href="end_session.php?logout">Deconnexion</a>';
            }
         ?>
     </div>
     <!-- Barre de navigation -->
    <nav>
        <ul>
            <li><a href="index.php" id="accueil">Accueil</a></li>
            <li><a href="exercices_en_cours_de_realisation.php" id="exercice">Accès aux exercices</a></li>
            <li><a href="connexion_compte.php" id="compte">Mon compte</a></li>
        </ul>
    </nav>

    <div id="presentation">
        <h1>Bienvenue sur la table d'apprentissage</h1>
        <p>Fais le choix d'une opération afin d'apprendre les tables de multiplication à ton rythme.</p>
        <p>Amuse toi bien et bon apprentissage.</p>
    </div>

<!-- Tableau avec les chiffres et les signe * et = -->

    <table id="tableau">
        <td><input class="chiffre" type="button" id="un" value="1"/></td>
        <td><input class="chiffre" type="button" id="deux" value="2"/></td>
        <td><input class="chiffre" type="button" id="trois" value="3"/></td>
      </tr>

      <tr>
        <td><input class="chiffre" type="button" id="quatre" value="4"/></td>
        <td><input class="chiffre" type="button" id="cinq" value="5"/></td>
        <td><input class="chiffre" type="button" id="six" value="6"/></td>
      </tr>

      <tr>
        <td><input class="chiffre" type="button" id="sept" value="7"/></td>
        <td><input class="chiffre" type="button" id="huit" value="8"/></td>
        <td><input class="chiffre" type="button" id="neuf" value="9"/></td>
      </tr>

      <tr>
        <td><input class="chiffre" type="button" id="zero" value="0"/></td>
        <td><input class="egal" type="button" id="egal" value="="/></td>
        <td><input class="chiffre" type="button" id="multiplier" value="*"/></td>
      </tr>
    </table>

<script type="text/javascript" src="../JS/script.js"></script>
</body>
</html>
