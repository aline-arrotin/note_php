<?php 
	$jour = "Lundi";
	$cours= "PHP";

	session_start(); //Sinon je ne sais pas rentrer dans ma session.

	if(isset($_GET['lg'])) : //Si $_GET existe
		if($_GET['lg'] == "reset") ://Si je suis sur reset alors,
			session_destroy();//Je detruit la session. et je lui demande après qu'il me remette sur la page initial.
			header("location:page1.php");// Je demande qu'il recharge ma page automatiquement.
			exit;//J'arrête tout, je ne continue pas le script en dessous. Lorsqu on lance un location, on bloque tout, le temps que le rechargement se fasse entre le nav et le serveur. On evite donc 	ainsi que le reste ne se joue le temps du chargement de la page.
			else : //Sinon
			$_SESSION['lg'] = $_GET['lg']; //La session est egal a celle qui est dans le GET.
		endif;//fin de if
	endif;//fin de if
?>
<!DOCTYPE html>
<html lang="<?php echo (isset($_SESSION['lg'])) ? $_SESSION['lg'] : "fr"; ?>"> <!-- Si j'ai lang dans ma session j'affiche la langue de la session. Sinon j affiche la langue par defaut, le francais. -->
 <head>
    <meta charset="utf-8"/>
    <title>Première page PHP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0/">
		<meta name="keywords" content="Web,HTML,CSS,XML,JavaScript" />
		<meta name="description" content="Site Web bla bla bla" />
		<meta name="author" content="name" />
<!-- 		<link href="css/normalize.min.css" rel="stylesheet" media="screen" />
		<link href="css/main.css" rel="stylesheet" media="screen" />
		<link href="css/printer.css" rel="stylesheet" media="print" /> -->
  	<!--[if lt IE 9]>
      <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
      <script>window.html5 || document.write('<script src="js/html5shiv.js"><\/script>')</script>
  	<![endif]-->
	</head>
<body>
	<div class="container">
	<header>
		<img src="" alt="logo">
		<h1>Le paramètre contient : <?php //echo $_GET['test']; ?></h1>
		<nav>
			<ul>
				<li><a href="?lg=en">En</a></li>
				<li><a href="?lg=fr">Fr</a></li>
				<li><a href="?lg=reset">reset</a></li>

			</ul>
		</nav>

		<h2><?php echo (isset($_GET['name'])) ? "Bonjour ".$_GET['name'] : ' Veuillez cliquer sur un lien'; ?></h2>
		<!-- Operateur ternaire: J'ai un nom dans l'url je fais ca, je l'affiche.
		Sinon je ne mets rien (dans le cas du chargement de la page, je n'ai encore rien). -->


			<ul>
				<li><a href="?name=Pierre">Pierre</a></li>
				<li><a href="?name=Greg">Greg</a></li>
				<li><a href="?name=Michèle">Michèle</a></li>
				<li><a href="?name=Jocelyn">Jocelyn</a></li>

				<!-- Comme je n'ai rien, il n'affiche rien... -->
			</ul>


			<form action="page1.php"> <!-- Ici le nom du script vers lesquels les infos doivent être envoyée. -->
				<label for="nom">Votre nom : </label>
				<input type="text" name="nom" id='nom'>
				<input type="submit" value="go">
			</form>
			<!-- Par defaut les formulaires sont en méthode get -->


			<form action="page1.php" method="POST"> <!-- On passe ici, d'office en méthode POST. -->

				<label for="log">Log : </label>
				<input type="text" name="login" id="log">

				<label for="pass">Password : </label>
				<input type="password" name="password" id="pass">

				<input type="submit" value="connexion">
			</form>

			<nav>
				<ul>
					<li><a href="accueil.html">Accueil</a></li>
					<li><a href="page2.html">Page 2</a></li>
					<li><a href="contact.html">Contact</a></li>
					<li><a href="cars.html">Cars</a></li>
				</ul>
			</nav>
	</header>












