<?php 
class HomeView{
  function __construct(){

  }


  function listing($allArray) {
    ;?>
      <div id="col1">
            <h1><?php echo $allArray['CSS'][0] -> label; ?></h1>
                   <?php for($i=0; $i < count($allArray['CSS']); $i++) :
                        $myRow = $allArray['CSS'][$i]; ?>
                        <div class="article">
                       
                        <h1><?php echo $allArray['CSS'][$i]-> titre; ?></h1>
                        <p class="date"><?php echo $allArray['CSS'][$i]-> date; ?></p>
                        <p><?php echo $allArray['CSS'][$i]-> texte; ?>
                         <a href="?view=articles&id_articles=<?php echo $myRow ->id_categories ?>" class="plus">&gt;&gt;&gt;</a></p>
                         <p class="signature"><?php echo $allArray['CSS'][$i]-> prenom; ?></p>
                  
                  </div>
            <br>
           <?php endfor; ?>
      </div> 

      <div id="col2">
            <h1><?php echo $allArray['HTML'][1] -> label; ?></h1>
                        <?php for($i=0; $i < count($allArray); $i++) :
                        $myRow = $allArray['HTML'][$i]; ?>
                        <div class="article">

                        <h1><?php echo $allArray['HTML'][$i]-> titre; ?></h1>
                        <p class="date"><?php echo $allArray['HTML'][$i]-> date; ?></p>
                        <p><?php echo $allArray['HTML'][$i]-> texte; ?>
                         <a href="?view=articles&id_articles=<?php echo $myRow ->id_categories ?>" class="plus">&gt;&gt;&gt;</a></p>
                         <p class="signature"><?php echo $allArray['HTML'][$i]-> prenom; ?></p>
                    </div>    
                <?php endfor; ?>
            <br>
      </div><!-- #col2 -->


      <div id="col3">
            <h1><?php echo $allArray['PHP'][2] -> label; ?></h1>
                        <?php for($i=0; $i < count($allArray); $i++) :
                        $myRow = $allArray['PHP'][$i]; ?>
                        <div class="article">

                        <h1><?php echo $allArray['PHP'][$i]-> titre; ?></h1>
                        <p class="date"><?php echo $allArray['PHP'][$i]-> date; ?></p>
                        <p><?php echo $allArray['PHP'][$i]-> texte; ?>
                         <a href="?view=articles&id_articles=<?php echo $myRow ->id_categories ?>" class="plus">&gt;&gt;&gt;</a></p>
                         <p class="signature"><?php echo $allArray['PHP'][$i]-> prenom; ?></p>
                    </div>
                   <?php endfor; ?>
            <br>
      </div>

    <?php }
  }
?>