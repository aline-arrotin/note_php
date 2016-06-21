<?php 
include("models/articles.php");
include("views/articles.php");

$listArt = new Articles;

$theArticle = $listArt -> theArticle($_GET['id_articles']);

$otherArticles = $listArt -> listingNoId($_GET['id_articles'],$theArticle[0]->id_categorie);
//myPrint_r($theArticle);
//myPrint_r($otherArticles);
//exit;



$listArticlesView = new ArticlesView;

include("header.php");

$listArticlesView ->listing($otherArticles); // ma fonction listing passe ce tableau dans ma vue.
$listArticlesView ->theArticle($theArticle); // ma fonction listing passe ce tableau dans ma vue.

include("footer.php");
?>