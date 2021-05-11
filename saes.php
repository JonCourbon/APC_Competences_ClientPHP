<?php 
// Import de la classe
require(dirname(__FILE__).'/APC_API_Connection.class.php');

$apicon = APC_API_Connection::getInstance("http://localhost:1337");
$saes=$apicon->getSAES();
$nbsaes=count($saes);

echo '************************'."<br/>";
echo '*       SAES       *'."<br/>";
echo '************************'."<br/>";

echo 'Il y a '.$nbsaes.' Situations d\'Apprentissage et d\'Evaluation:'."<br/>";

for($i=0;$i<$nbsaes;$i++){
  echo '> '.$saes[$i]->intitule."<br/>";
  echo '<em>'.$saes[$i]->descriptif."</em><br/>";
  $nbapprentissages=count($saes[$i]->apprentissage_critiques);
  for($j=0;$j<$nbapprentissages;$j++){
    echo '... '.$saes[$i]->apprentissage_critiques[$j]->intitule."<br/>";
  }
  
  echo "<br/>";
  
}
//print_r($comp);

?>