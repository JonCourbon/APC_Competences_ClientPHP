<?php 
require(dirname(__FILE__).'/configuration/config.php');
// Import de la classe
require(dirname(__FILE__).'/lib/APC_API_Connection.class.php');

$apicon = APC_API_Connection::getInstance($apiurl);
$competences=$apicon->getCompetencesDiplome($diplome);
$nbcompetences=count($competences);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Portfolio Jean Pierre</title>
  <!-- Favicon-->
  <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
  <!-- Core theme CSS (includes Bootstrap)-->
  <link href="css/styles.css" rel="stylesheet" />
</head>
<body>
  <!-- Responsive navbar-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="index.php">Accueil</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item"><a class="nav-link" href="index.php">Accueil</a></li>
          <li class="nav-item"><a class="nav-link active" href="referentiel.php">Référentiel</a></li>
          <li class="nav-item"><a class="nav-link" aria-current="page" href="portfolio.php">Portfolio</a></li>
          <li class="nav-item"><a class="nav-link" href="about.php">A propos</a></li>
          
        </ul>
      </div>
    </div>
  </nav>
  <!-- Page header with logo and tagline-->
  <header class="py-5 bg-light border-bottom mb-4">
    <div class="container">
      <div class="text-center my-5">
        <h1 class="fw-bolder">Référentiel de compétences de ma formation</h1>
      </div>
    </div>
  </header>
  <!-- Page content-->
  <div class="container">
    <div class="row">
      <?php for($i=0;$i<$nbcompetences;$i++):
        $composantes=$apicon->getComposantes($competences[$i]->id);
        $nbcompo=count($composantes);
        $niveaux=$apicon->getNiveauxCompetences($competences[$i]->id);
        $nbniveaux=count($niveaux);
        ?>
        <!-- Preuve-->
        <div class="col-lg-6 card mb-4">
          <!-- <img class="card-img-top" src="https://dummyimage.com/700x350/dee2e6/6c757d.jpg" alt="..." /> -->
          <div class="card-body">
            <h2 class="card-title h4"><?php echo $competences[$i]->intitule; ?></h2>
            <p class="card-text">
              Composantes:
              <ul>
                <?php 
                for($j=0;$j<$nbcompo;$j++){
                  echo '<li>'.$composantes[$j]->intitule.'</li>'."\n";
                }
                ?>
              </ul>
              Niveaux de compétence et apprentissages critiques
              <div class="accordion" id="accordionNiveaux">
                <?php 
                for($j=0;$j<$nbniveaux;$j++):
                  $apprentissages_critiques=$apicon->getApprentissages($niveaux[$j]->id);
                  $nbapprentissages=count($apprentissages_critiques);
                  ?>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#niveaucomp<?php echo $niveaux[$j]->id;?>" aria-expanded="true" aria-controls="collapseOne">
                        <?php echo $niveaux[$j]->intitule; ?>
                      </button>
                    </h2>
                    <div id="niveaucomp<?php echo $niveaux[$j]->id;?>" class="accordion-collapse collapse" aria-labelledby="niveaucomp<?php echo $niveaux[$j]->id;?>" data-bs-parent="#accordionNiveaux">
                      <div class="accordion-body">
                        <ul>
                            <?php
                            for($k=0;$k<$nbapprentissages;$k++){
                              echo '<li>AC: '.$apprentissages_critiques[$k]->intitule.'</li>';
                            }
                            ?>
                        </ul>
                      </div>
                    </div>
                  </div>
                <?php endfor; ?>
              </div>             
            </p>
          </div>
        <?php endfor;?>
        
      </div>
    </div>
  </div>
  <!-- Footer-->
  <footer class="py-5 bg-dark">
    <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Jean Pierre 2021</p></div>
  </footer>
  <!-- Bootstrap core JS-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Core theme JS-->
  <script src="js/scripts.js"></script>
</body>
</html>
