<?php 
class ArticlesView{
  function __construct(){

  }

  function listing($allArray) {?>
  <div id="col1">
      <h1><?php echo $allArray[0] -> label; ?></h1>
            <?php for($i=0; $i < count($allArray); $i++) :
            $myRow = $allArray[$i]; ?>
            <div class="article">

                <h1><?php echo $myRow-> titre; ?></h1>
                <p class="date"><?php echo $myRow-> date; ?></p>
                <p><?php echo $myRow-> texte; ?>
                    <a href="?view=articles&id_articles=<?php echo $myRow ->id_articles ?>" class="plus">&gt;&gt;&gt;</a></p>
                    <p class="signature"><?php echo $myRow-> prenom; ?></p>
            </div>
            <br>
            <?php endfor; ?>
  </div>
  <?php }


      function theArticle($array) {?> 
      <div id="col22">
          <h1><?php echo $array[0] -> label; ?></h1>
            <?php for($i=0; $i < count($array); $i++) :
                $myRow = $array[$i]; ?>
                <div class="article">

                <h1><?php echo $myRow-> titre; ?></h1>
                <p class="par">Par <?php echo $myRow-> prenom; ?></p>
                <p class="date"><?php echo $myRow-> texte; ?>
                </div>
            <?php endfor; ?>
      </div>

        <?php }

        function feedJson($array) {
          header('Content-Type: application/json');
          echo json_encode($array);
          exit;
        }
    }
?>