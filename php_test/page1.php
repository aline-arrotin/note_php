<?php include("header.php"); ?>
	<section>
		<h1>Hello, nous sommes <?php echo $jour; ?></h1>
		<p> C'est dans le local 1.08 qu'il y a le cours de <?php echo $cours; ?></p>
	</section>

	<?php if(isset($_POST['login'])) : ?>
	<p>Votre log : <?php echo $_POST['login'] ?> et votre mot de passe : <?php echo $_POST['password'] ?></p>
	<?php endif; ?>
<?php include("footer.php"); ?>
