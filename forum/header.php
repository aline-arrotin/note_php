<!DOCTYPE html>
<html lang="fr">
 <head>
    <meta charset="utf-8"/>
    <title>index</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0/">
		<meta name="keywords" content="Web,HTML,CSS,XML,JavaScript" />
		<meta name="description" content="Site Web bla bla bla" />
		<meta name="author" content="name" />
		<link href="main.css" rel="stylesheet" media="screen" />
  	<!--[if lt IE 9]>
      <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
      <script>window.html5 || document.write('<script src="js/html5shiv.js"><\/script>')</script>
  	<![endif]-->
	</head>
<body>
	<div class="container">

	<header>

	<h1>Le forum des licornes</h1>
	<?php if(isset($_SESSION['auteur'])) :  ?>
		<p>Bienvenue <?php echo $_SESSION['auteur']['email']; ?> - <a href="connexion.php?delog">Logout</a></p>
	<?php else : ?>
		<?php echo (isset($_GET['error']) == 'log') ? "Erreur log/pass" : ""; ?>

	<form id='connexion' action='connexion.php' method='post' accept-charset='UTF-8'>
		<fieldset >
			<legend>Login</legend>
			<input type='hidden' name='submitted' id='submitted' value='1'/>
			 
			<label for='email'>Email : </label>
			<input type='text' name='email' id='email'  maxlength="50" />
			 
			<label for='password'>Password : </label>
			<input type='password' name='password' id='password' maxlength="50" />
			 
			<input type='submit' name='Submit' value='Submit' />
		 
		</fieldset>
	</form>
<?php endif; ?>
</header>