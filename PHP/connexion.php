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
		<main class="mainconnexion">
			<form method="post">
				<label for="login">Login : </label>
					<input required type="text" name="login" maxlength="255"/>
				<label for="password">Mot de passe : </label>
					<input required type="password" name="password" maxlength="255"/>
				<input name="connexion" type="submit" value="Connexion"/>
			</form>
			<p><?php echo $_SESSION['message']; ?></p>
		</main>
		<?php include 'mainfooter.php' ?>
	</body>
</html>

<?php
	if(!empty($_POST['login']) && !empty($_POST['password'])){
		$table = $bdd->query('SELECT * FROM utilisateurs WHERE login="'.$_POST['login'].'"');
		
		$password_hashed = password_hash($_POST['password'], PASSWORD_DEFAULT);
	
		while($ligne = $table->fetch_assoc()){
		$_SESSION['password'] = $ligne['password'];
		}
		
		if(mysqli_num_rows($table) == 0 && password_verify($_SESSION['password'], $password_hashed)){
			$_SESSION['message'] = 'Login ou Mot de passe incorrect';
			header('refresh: 0');
		}
		else{
			$_SESSION['login'] = $_POST['login'];
			$_SESSION['header'] = '<style>.liconnexion, .liinscription{position: absolute; z-index: -10; left: 2000px; opacity: 0;} .liprofil, .licommentaire{position: relative; z-index: 1; opacity: 1;}</style>';
			
			header('location: profil.php');
		}
	}
?>