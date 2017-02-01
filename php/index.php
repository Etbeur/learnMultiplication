<?php
// On active la session
session_start();

 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" name="viewport" content="width=device-width, height=device-height initial-scale=1.0, user-scalable=yes, shrink-to-fit=no"/>
    <title>Les tables de multiplications</title>
    <link rel="stylesheet" href="/css/style.min.css"/>
  </head>
	<body>
		<div id="tete">

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

		    <h1>Learn multiplication</h1>
		    <p>Bienvenue sur ce site qui permet d'apprendre les tables de multiplications facilement tout en s'amusant.</p>
		    <p>Pensez à vous connecter ou à créer un compte en allant dans la partie mon compte.</p>
		</div>

		<!-- Barre de navigation du menu principale, organisé en colonne -->

		<nav>
		    <a class="lien_nav" href="table.php" id="table">Accès aux tables</a>
		    <a class="lien_nav" href="exercices_en_cours_de_realisation.php" id="exercice">Accès aux exercices</a>
		    <a class="lien_nav" href= "connexion_compte.php" id="compte">Mon compte</a>
		</nav>

		<footer id="pied_de_page">
		    <p>
		        Designed and created by <a href="https://github.com/etbeur">Etbeur</a> - 2016
		    </p>
		</footer>

	<script type="text/javascript" src="/JS/script.js"></script>
	</body>
</html>
