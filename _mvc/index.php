<?php include("config.php"); ?>
<?php include("function.php"); ?>
<?php //routage
	if(isset($_GET['view'])) :
				switch($_GET['view']) :
					case("reponses") : include("controllers/reponses.php"); break;
					case("questions") : include("controllers/main.php"); break;
					default : include("controllers/main.php"); break;
				endswitch;
			else :
				include("controllers/main.php");
	endif; ?>