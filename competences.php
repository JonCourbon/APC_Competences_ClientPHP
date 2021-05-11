<?php 
// Import de la classe
require(dirname(__FILE__).'/APC_API_Connection.class.php');

$apicon = APC_API_Connection::getInstance("http://localhost:1337");
$competences=$apicon->getCompetences();
$nbcompetences=count($competences);

echo '************************'."<br/>";
echo '*       COMPETENCES       *'."<br/>";
echo '************************'."<br/>";

echo 'Il y a '.$nbcompetences.' competences:'."<br/>";

for($i=0;$i<$nbcompetences;$i++){
  echo '> '.$competences[$i]->intitule."<br/>";
  $nbcompo=count($competences[$i]->composantes);
  for($j=0;$j<$nbcompo;$j++){
    echo '... '.$competences[$i]->composantes[$j]->intitule."<br/>";
  }
  $niveaux=$apicon->getNiveauxCompetences($competences[$i]->id);
  $nbniveaux=count($niveaux);
  for($j=0;$j<$nbniveaux;$j++){
    echo '|-- Niv. : '.$niveaux[$j]->intitule."<br/>";
    $nbapprentissages=count($niveaux[$j]->apprentissage_critiques);
    for($k=0;$k<$nbapprentissages;$k++){
      echo '----> '.$niveaux[$j]->apprentissage_critiques[$k]->intitule."<br/>";
      
    } 
  }  
  echo "<br/>";
  
}
//print_r($comp);

?>