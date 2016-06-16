<?php
	function myPrint_r($variable, $action = "print"){
		

		echo "<pre>";
			switch($action) :
			case "print" : print_r($variable);//Juste le contenu.
			break;
			case "vardump" : 
			default:
			var_dump($variable);//La structure, le type de donnée et le contenu
			endswitch;
		echo "</pre>";
	}
//A partir d'une meme fonction choisir entre le var_dump ou le print_r

	function dateAff($date,$separator){//
		$date = explode('-',$date); //J'explose ma chaine de caractère et j en fait des objet.
		$date = array_reverse($date);//Je retourne l'orde de mon objet.
		$date = implode($separator,$date); //Je la retransforme en chaine de caractère avec le separateur que je souhaite.
		return $date; //je la retourne à la variable qui l'utilisera.
	}



//

?>