<?php 
include("models/reponses.php");
include("views/reponses.php");

$listR = new Reponses;


if(isset($_POST['new_Rep'])) :
	 $back = $listR -> insert($_POST);
	header("location:index.php?view=reponses&id_question=$back");
	exit;
endif;



$array = $listR -> listingREP($_GET['id_question']); // je vais chercher l'infos et je le mets dans la variable $array

$listRView = new ReponsesView;

include("header.php");

$listRView ->listing($array); // ma fonction listing passe ce tableau dans ma vue.
$listRView ->insert_forms($_GET['id_question']);

include("footer.php");
?>