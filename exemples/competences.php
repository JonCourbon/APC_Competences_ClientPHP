<?php 
require(dirname(__FILE__).'/../configuration/config.php');
// Import de la classe
require(dirname(__FILE__).'/../lib/APC_API_Connection.class.php');

$apicon = APC_API_Connection::getInstance($apiurl);
$competences=$apicon->getCompetencesDiplome($diplome);
$nbcompetences=count($competences);

echo '************************'."<br/>";
echo '*       COMPETENCES       *'."<br/>";
echo '************************'."<br/>";

echo 'Il y a '.$nbcompetences.' competences dans le diplome '.$diplome.':'."<br/>";

for($i=0;$i<$nbcompetences;$i++){
  echo '> '.$competences[$i]->intitule."<br/>";
  
  $composantes=$apicon->getComposantes($competences[$i]->id);
  $nbcompo=count($composantes);
  for($j=0;$j<$nbcompo;$j++){
    echo '... '.$composantes[$j]->intitule."<br/>";
  }
  $niveaux=$apicon->getNiveauxCompetences($competences[$i]->id);
  $nbniveaux=count($niveaux);
  for($j=0;$j<$nbniveaux;$j++){
    echo '|-- Niv. : '.$niveaux[$j]->intitule.' ('.$niveaux[$j]->id.')'."<br/>";
    $apprentissages_critiques=$apicon->getApprentissages($niveaux[$j]->id);
    $nbapprentissages=count($apprentissages_critiques);
    for($k=0;$k<$nbapprentissages;$k++){
      echo '----> '.$apprentissages_critiques[$k]->intitule."<br/>";
      
    } 
  }  
  echo "<br/>";
  
}
//print_r($comp);

?>