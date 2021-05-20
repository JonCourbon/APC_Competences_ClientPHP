<?php 
// Import de la classe
require(dirname(__FILE__).'/APC_API_Connection.class.php');

$apicon = APC_API_Connection::getInstance("http://localhost:1337");
$portfolio=$apicon->getPortfolio(1);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Portfolio de <?php echo $portfolio->Apprenant; ?></title>
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body>
<h1>Portfolio de <?php echo $portfolio->Apprenant; ?></h1>

<p><?php echo $portfolio->Description; ?></p>


<?php
$nbtraces=count($portfolio->traces);
for($i=0;$i<$nbtraces;$i++):
  ?>
  
<article>
    <h2><?php echo $portfolio->traces[$i]->Titre; ?></h2>
    <p><?php echo $portfolio->traces[$i]->Description; ?></p>    
    <p>Eléments de preuve:</p>
    <?php  
      $preuves=$apicon->getPreuves($portfolio->traces[$i]->id);
      $nbpreuves=count($preuves);
      for($j=0;$j<$nbpreuves;$j++):
        ?>
        <div class="card col-6">
            <div class="card-body">
              <blockquote class="blockquote mb-0">
              <?php echo $preuves[$j]->description; ?>
            </blockquote>
            </div>
            Apprentissages critiques:
            <ul>
                <?php 
                for($k=0;$k<count($preuves[$j]->apprentissage_critiques);$k++){
                  echo '<li>'.$preuves[$j]->apprentissage_critiques[$k]->intitule.'</li>';
                }
                 ?>
            </ul>
            Composantes essentielles:
            <ul>
              <?php 
              for($k=0;$k<count($preuves[$j]->composantes);$k++){
                echo '<li>'.$preuves[$j]->composantes[$k]->intitule.'</li>';
              }
               ?>    
            </ul>
        </div>
        <?php 
      endfor;
       ?>      
</article>

<?php 
endfor;
 ?>

</body>
</html>