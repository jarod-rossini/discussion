<?php
	$path = '';
	$pathindex = '../';

	if(empty($_SESSION['login'])){
		header('location: connexion.php');
	}
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
			
		</main>
		<?php include 'mainfooter.php' ?>
	</body>
</html>