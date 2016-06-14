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
?>