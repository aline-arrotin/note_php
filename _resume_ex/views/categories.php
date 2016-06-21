<?php 
class ResearchView{
  function __construct(){

  }

  function listing($array) {?>
  <h1>Résultats de recherche</h1>
      <div class="article">
        <p>Sorry, pas d'article r&eacute;pondant &agrave;  vos crit&egrave;res</p>
            <?php for($i=0; $i < count($array); $i++) :
            $myRow = $array[$i]; ?>
              <table width="100%">
                <tbody>
                <tr>
                      <td scope="col" bgcolor="#bdd8f6" valign="top" width="4%">&nbsp;&nbsp;</td>
                      <td scope="col" valign="top" width="68%"><h1>Un lycéen en assises à Evry pour avoir poignardé son enseignante à Etampes</h1><p align="left">Par pierre&nbsp;&nbsp;&nbsp;&nbsp;<a href="articles_details.php" class="plus">&gt;&gt;&gt;</a></p></td>
                      <td scope="col" valign="top" width="28%">
                        <div align="left">
                          <p class="date">12 02 08</p>
                          <p class="date">Economie</p>
                        </div>
                      </td>
                  </tr>
              </tbody>
            </table>
        <?php endfor; ?>
    </div>
<br>

    <?php 
  }
?>