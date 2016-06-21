<?php 
include("models/articles.php");
include("views/home.php");

$listH = new Articles;

$allArray['CSS'] = $listH -> listing("CSS"); // je vais chercher l'infos et je le mets dans la variable $array

$allArray['HTML'] = $listH -> listing("HTML"); // je vais chercher l'infos et je le mets dans la variable $array

$allArray['PHP'] = $listH -> listing("PHP"); // je vais chercher l'infos et je le mets dans la variable $array


$listHomeView = new HomeView;

include("header.php");

$listHomeView ->listing($allArray); // ma fonction listing passe ce tableau dans ma vue.

include("footer.php");
?>