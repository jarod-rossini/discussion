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
		<main class="maininscription">
			<form method="post">
				<label for="login">Login : </label>
					<input required type="text" name="login" placeholder="Ex: Azerty123..." maxlength="255"/>
				<label for="">Mot de passe : </label>
					<input required type="password" name="password" maxlength="255"/>
				<label for="">Confirmer mot de passe : </label>
					<input required type="password" name="password_conf" maxlength="255"/>
				<input type="submit" value="S'inscrire"/>
			</form>
			<p><?php echo $_SESSION['message']; ?></p>
		</main>
		<?php include 'mainfooter.php' ?>
	</body>
</html>

<?php
	if(!empty($_POST['login']) && !empty($_POST['password'])){
		if($_POST['password'] == $_POST['password_conf']){
			if(mysqli_num_rows($table) == 0){
				$_SESSION['login'] = $_POST['login'];
				$_SESSION['header'] = '<style>.liinscription, .liconnexion{opacity: 0; position: absolute; z-index: -10; right: -200%;} .liprofil, .licommentaire{opacity: 1; position: relative; z-index: 1;} </style>';
				
				$table = $bdd->prepare('INSERT INTO utilisateurs(login, password) VALUES("'.$_POST['login'].'","'.password_hash($_POST['password'], PASSWORD_DEFAULT).'")');
				$table->execute();
				
				header('location: profil.php');
			}
			else{header('refresh: 0'); $_SESSION['message'] = 'Ce login est déjà utilisé';}
		}
		else{header('refresh: 0'); $_SESSION['message'] = 'Les mots de passe ne correspondent pas';}
	}
	else{$_SESSION['message'] = '';}
?>



