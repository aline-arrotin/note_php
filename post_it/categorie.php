<?php require("config.php"); ?>
<?php require("function.php"); ?>
<?php 
	$sql = "SELECT * FROM categorie";

	$categorie_request = $db_connect->query($sql);
	echo $db_connect->error;


	//Je recupere les enregistrements de la base de donnée post_it.
	//$allRows = $post_it_request->fetch_all(MYSQLI_ASSOC);//Je recupere les objets de manière associative. Constante de php. On recupère tout les enregistrements en une seule fois.

while($row = $categorie_request->fetch_object()) : //Je recupere un enregistrement je le met dans un objet. All rows est un array d'objet.

		$allRowsCat[] = $row; //Dans un tableau all rows j enregistre cet objet là. On précise les crochets pour dire que c est un tableau. //En javascript, c'est comme faire un push.

endwhile;


//A chaque tour de boucle je recupere un objet ou je recupere les propriété. Ca devient des variables en php.

	//myPrint_r($allRows[0]);//Méthode récente, fonctionne pas partout.
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
  	<!--[if lt IE 9]>
      <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
      <script>window.html5 || document.write('<script src="js/html5shiv.js"><\/script>')</script>
  	<![endif]-->
	</head>
<body>
	<?php  for($i=0; $i< count($allRowsCat); $i++) : ?>
		<div class="task">
			<h1><?php echo $allRowsCat[$i]->label ?></h1>
			<p><?php echo $allRowsCat[$i]->id_categories ?></p>
		</div>
	<?php endfor;?>
</body>
</html>
