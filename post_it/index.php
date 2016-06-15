<?php require("config.php"); ?>
<?php require("function.php"); ?>
<?php 

if(isset($_GET['id_categories'])) :
	$sql = "SELECT id_post_it, post_it.titre, post_it.texte, post_it.date, post_it.done, id_categories, categorie.label, categorie.slug
	FROM post_it
	LEFT JOIN categorie
	ON id_categorie = id_categories
	WHERE post_it.id_categorie = ".$_GET['id_categories'];


else:

	$sql = "SELECT id_post_it, post_it.titre, post_it.texte, post_it.date, post_it.done, id_categories, categorie.label, categorie.slug
	FROM post_it
	LEFT JOIN categorie
	ON id_categorie = id_categories"; //Premiere requête

endif;






	$post_it_request = $db_connect->query($sql); //Changer le nom de requête selon la requête.
	echo $db_connect->error;


	//Je recupere les enregistrements de la base de donnée post_it.
	//$allRows = $post_it_request->fetch_all(MYSQLI_ASSOC);//Je recupere les objets de manière associative. Constante de php. On recupère tout les enregistrements en une seule fois.

while($row = $post_it_request->fetch_object()) : //Je recupere un enregistrement je le met dans un objet. All rows est un array d'objet.

		$allRows[] = $row; //Dans un tableau all rows j enregistre cet objet là. On précise les crochets pour dire que c est un tableau. //En javascript, c'est comme faire un push.
		//Changer le nom du all row egalement afin de ne pas avoir d'interferences.
endwhile;


//A chaque tour de boucle je recupere un objet ou je recupere les propriété. Ca devient des variables en php.

	//myPrint_r($allRows[0]);//Méthode récente, fonctionne pas partout.

	$sql = "SELECT * FROM categorie"; //Deuxieme requête.

	$categorie_request = $db_connect->query($sql); //Changer le nom de requête selon la requête.
	echo $db_connect->error;


	//Je recupere les enregistrements de la TAB de donnée post_it.
	//$allRows = $post_it_request->fetch_all(MYSQLI_ASSOC);//Je recupere les objets de manière associative. Constante de php. On recupère tout les enregistrements en une seule fois.

while($row = $categorie_request->fetch_object()) : //Je recupere un enregistrement je le met dans un objet. All rows est un array d'objet.

		$allRowsCat[] = $row; //Dans un tableau all rows j enregistre cet objet là. On précise les crochets pour dire que c est un tableau. //En javascript, c'est comme faire un push.
		//Changer le nom du all row egalement afin de ne pas avoir d'interferences.
endwhile;


//A chaque tour de boucle je recupere un objet ou je recupere les propriété. Ca devient des variables en php.

	//myPrint_r($allRows[0]);//Méthode récente, fonctionne pas partout.

//Si je veux lier deux choses, soit je fais une vue, soit je lie directement avec un join dans php
?>

<!DOCTYPE html>
<html lang="fr">
 <head>
    <meta charset="utf-8"/>
    <title>index</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0/">
		<meta name="keywords" content="Web,HTML,CSS,XML,JavaScript" />
		<meta name="description" content="Site Web bla bla bla" />
		<meta name="author" content="name" />
		<link rel="stylesheet" href="style.css">
  	<!--[if lt IE 9]>
      <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
      <script>window.html5 || document.write('<script src="js/html5shiv.js"><\/script>')</script>
  	<![endif]-->
	</head>
<body>
<div class="kind">
<a href="index.php">All</a>
<?php  for($i=0; $i< count($allRowsCat); $i++) : ?>
	<div class="cat">
		<h1><a href="?id_categories=<?php echo $allRowsCat[$i]->id_categories ?>">
		<?php echo $allRowsCat[$i]->label ?></a></h1>
	</div>
<?php endfor; ?>


	<?php  for($i=0; $i< count($allRows); $i++) : ?>
		<div class="task <?php echo htmlentities($allRows[$i]->slug);?>"> <!-- Permet d'attribuer le label comme classe de la section. -->
				<h2><?php echo $allRows[$i]->titre ?></h2>
			<p><?php echo $allRows[$i]->texte ?></p>
			<?php if($allRows[$i]->date != '' AND $allRows[$i]->date != '0000-00-00') : ?>
			<p class="date"><?php echo dateAff($allRows[$i]->date,"/"); ?></p>  <!-- Pas valable pour un datetime. C'est pour un date. -->
		<?php endif; ?>
		<a href="?id_categories=<?php echo $allRows[$i]->id_categories ?>"><?php echo $allRows[$i]->label; ?></a>
		</div>
	<?php endfor;?>
	</div>

</body>
</html>

