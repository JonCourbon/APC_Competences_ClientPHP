<?php 
$idpreuve=$_GET["id"];
require(dirname(__FILE__).'/configuration/config.php');
// Import de la classe
require(dirname(__FILE__).'/lib/APC_API_Connection.class.php');

$apicon = APC_API_Connection::getInstance($apiurl);
$preuve= $apicon->getPreuve($idpreuve);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Portfolio de Jean Pierre</title>
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body>
<h1>Portfolio de Jean Pierre: <?php $preuve->intitule;?></h1>


<article>
    <h2><?php echo $preuve->intitule; ?></h2>
    <?php if($preuve->situation){
      echo '<p>Contexte: '.$preuve->situation->intitule.'</p>'."\n";
      if($preuve->situation->sae){
        $sae=$apicon->getSAE($preuve->situation->sae);
        echo '<p>SAE: '.$sae->intitule.'</p>'."\n";
      }
      echo '<div><h3>Démarche</h3>'.$preuve->demarche.'</div>';
      echo '<div><h3>Réflexivité</h3>'.$preuve->reflexions.'</div>';
      if($preuve->recul){
        echo '<div><h3>Prise de recul</h3>'.$preuve->recul.'</div>';
      }  
    } ?>
</article>

</body>
</html>