<?php 
	require_once("classes.php"); //Si je ne trouve pas le fichier tout est bloqué(le système), contrairement à include. Il est bloquant.//J'appel ma classe avant le session_start.
?>
<?php include("function.php"); ?>
<?php include("header.php"); ?>
<section>
	<?php


		if(isset($_GET['page'])) : //Je test si j ai page 

				myPrint_r($_GET,"print");

		switch ($_GET['page']) : //Si j ai une page je le switch

		case "contact" : include("contact.php"); // SI contact je fais
		break;

		case "page2" : include("page2.php");
		break;

		case "cars" : include("cars.php");
		break;


		default : include("404.php");// Par default je fais accueil. 404 de contenu donc l'URL est valable mais il a fait une faute de frappe de paramètre. Ici, ce n'est pas une erreur de fichier.
		break;

		endswitch; 
		else : include("accueil.php"); // Sinon je fais include de accueil.
		endif; ?>
</section>

<?php include("footer.php"); ?>