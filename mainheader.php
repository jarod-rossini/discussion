<?php
	session_start();
	ini_set('display_errors', 'off');
	$bdd = new mysqli('localhost', 'root', '', 'discussion');
	
	if($bdd->connect_errno){
		echo 'Connexion échoué :'.$bdd->connect_errno.'|'.$bdd->connect_error;
	}
	
	$bdd->set_charset('utf8');
	
	echo $_SESSION['header'];
?>

<header>
	<img src="CSS/IMG/watermark.png" alt="Logo de l'entreprise"/>
	<nav>
		<ul>
			<li><a href="index.php">Accueil</a></li>
			<li class="liinscription"><a href="inscription.php">Inscription</a></li>
			<li class="liconnexion"><a href="connexion.php">Connexion</a></li>
			<li class="liprofil"><a href="profil.php">Profil</a></li>
			<li class="lidiscussion"><a href="discussion.php">Discussion</a></li>
		</ul>
	</nav>
</header>