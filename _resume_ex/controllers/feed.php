<?php 
include("models/articles.php");
include("views/articles.php");

$listArt = new Articles;

$listArticlesView = new ArticlesView;

if(isset($_GET['alt']) AND $_GET['alt'] == 'json') :
$array = $listArt -> all();
	//myPrint_r($array);
$listArticlesView -> feedJson($array);
endif;//Boucle je peux la recuperer avec ajax

?>