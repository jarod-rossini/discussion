<?php
	$path = '';
	$pathindex = '../';
?>

<html lang="fr">
	<head>
		<meta name="viewport" content="width=device-width">
		<link rel="stylesheet" href="CSS/index.css">
		<meta charset="UTF-8">
		<title>Discussion</title>
	</head>
	<body>
		<?php include 'mainheader.php' ?>
		<main class="maindiscussion">
			<div class="chat"><?php 
				$query = $bdd->query('SELECT * FROM messages ORDER BY id DESC');
				
				while($ligne1 = $query->fetch_assoc()){
					$query2 = $bdd->query('SELECT * FROM utilisateurs WHERE id="'.$ligne1['id_utilisateur'].'"');
					
					while($ligne2 = $query2->fetch_assoc()){
						echo '<div><p><u>'.$ligne2['login'].'</u> : ';
					}
					
					echo $ligne1['message'].'</p>';
					echo '<p class="date"><strong>'.$ligne1['date'].'</strong></p></div><hr>';
				}
			?></div>
			<form method="post">
				<textarea required name="message" placeholder="Taper votre message ici..."></textarea>
				<input type="submit" name="sendit" value="Envoyer"/>
			</form>
		</main>
		<?php include 'mainfooter.php' ?>
	</body>
</html>

<?php
	date_default_timezone_set('Europe/Paris');

	if(empty($_SESSION['login'])){
		$_SESSION['message'] = '<strong>Vous devez vous connecter pour discuter</strong>';
		header('location: connexion.php');
	}
	
	if(isset($_POST['sendit'])){
		if(!empty($_POST['message'])){
			$table = $bdd->query('SELECT id FROM utilisateurs WHERE login="'.$_SESSION['login'].'"');
			
			while($ligne = $table->fetch_assoc()){
				$_SESSION['id'] = $ligne['id'];
			}
			
			$_SESSION['post'] = $_POST['message'];
			$date = date("ymd");
			
			$table2 = $bdd->prepare('INSERT INTO messages(message, id_utilisateur, date) VALUE("'.$_SESSION['post'].'","'.$_SESSION['id'].'","'.$date.'")');
			$table2->execute();
			
			header('refresh: 0');
		}
	}
?>

