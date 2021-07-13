<?php 
require(dirname(__FILE__).'/../configuration/config.php');
// Import de la classe
require(dirname(__FILE__).'/../lib/APC_API_Connection.class.php');

$apicon = APC_API_Connection::getInstance($apiurl);
$saes=$apicon->getSAESDiplome($diplome);
$nbsaes=count($saes);

echo '************************'."<br/>";
echo '*       SAES       *'."<br/>";
echo '************************'."<br/>";

echo 'Il y a '.$nbsaes.' Situations d\'Apprentissage et d\'Evaluation:'."<br/>";

for($i=0;$i<$nbsaes;$i++){
  echo '> '.$saes[$i]->intitule."<br/>";
  echo '<em>'.$saes[$i]->descriptif."</em><br/>";
  $nbapprentissages=count($saes[$i]->apprentissages);
  for($j=0;$j<$nbapprentissages;$j++){
    echo '... '.$saes[$i]->apprentissages[$j]->intitule."<br/>";
  }
  
  echo "<br/>";
  
}
//print_r($comp);

?>