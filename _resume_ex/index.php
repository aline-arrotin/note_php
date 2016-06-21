<?php include("config.php"); ?>
<?php include("function.php"); ?>
<?php //routage
	if(isset($_GET['view'])) :
				switch($_GET['view']) :
					case("categories") : include("controllers/categories.php"); break;
					case("articles") : include("controllers/articles.php"); break;
					default : include("controllers/main.php"); break;
				endswitch;
			else :
				include("controllers/main.php");
	endif; ?>