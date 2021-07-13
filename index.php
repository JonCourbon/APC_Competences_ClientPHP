<?php 
require(dirname(__FILE__).'/configuration/config.php');
// Import de la classe
require(dirname(__FILE__).'/lib/APC_API_Connection.class.php');

$apicon = APC_API_Connection::getInstance($apiurl);
$preuves= $apicon->getPreuves($iduser);
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
<h1>Portfolio de Jean Pierre</h1>


<?php
$nbpreuves=count($preuves);
for($i=0;$i<$nbpreuves;$i++):
  ?>
  <article>
      <h2><?php echo $preuves[$i]->intitule; ?></h2>
      Compétence et niveau:
      <p><?php echo $preuves[$i]->niveau_competence->intitule; ?></p>  
      <a href="preuves.php?id=<?php echo $preuves[$i]->id;?>">En savoir plus</a>
  </article>

<?php 
endfor;
 ?>

</body>
</html>