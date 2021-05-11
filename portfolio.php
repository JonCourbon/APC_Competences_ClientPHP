<?php 
// Import de la classe
require(dirname(__FILE__).'/APC_API_Connection.class.php');

$apicon = APC_API_Connection::getInstance("http://localhost:1337");
$portfolio=$apicon->getPortfolio(1);

echo '************************'."<br/>";
echo '*       PORTOFOLIO de '.$portfolio->Apprenant."<br/>";
echo '************************'."<br/>";

echo $portfolio->Description."<br/>";

$nbtraces=count($portfolio->traces);
for($i=0;$i<$nbtraces;$i++){
  echo '> '.$portfolio->traces[$i]->Titre."<br/>";
  echo '<em>'.$portfolio->traces[$i]->Description.'</em>'."<br/>";
  $nbpreuves=count($portfolio->traces[$i]->Preuves);
  for($j=0;$j<$nbpreuves;$j++){
    echo '... Preuve '.($j+1).': '.$portfolio->traces[$i]->Preuves[$j]->Preuve."<br/>";
    echo '---> '.$portfolio->traces[$i]->Preuves[$j]->apprentissage_critique->intitule."<br/>";
    echo '---- '.$portfolio->traces[$i]->Preuves[$j]->Documents->url."<br/>";
  }
  echo "<br/>";
  
}
//print_r($comp);

?>