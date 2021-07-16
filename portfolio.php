<?php 
require(dirname(__FILE__).'/configuration/config.php');
// Import de la classe
require(dirname(__FILE__).'/lib/APC_API_Connection.class.php');

$apicon = APC_API_Connection::getInstance($apiurl);
$preuves= $apicon->getPreuves($iduser);
$nbpreuves=count($preuves);
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
      <a class="navbar-brand" href="#!">Accueil</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item"><a class="nav-link" href="index.php">Accueil</a></li>
          <li class="nav-item"><a class="nav-link" href="referentiel.php">Référentiel</a></li>
          <li class="nav-item"><a class="nav-link active" aria-current="page" href="portfolio.php">Portfolio</a></li>
          <li class="nav-item"><a class="nav-link" href="about.php">A propos</a></li>
          
        </ul>
      </div>
    </div>
  </nav>
  <!-- Page header with logo and tagline-->
  <header class="py-5 bg-light border-bottom mb-4">
    <div class="container">
      <div class="text-center my-5">
        <h1 class="fw-bolder">Voici mon portfolio de traces</h1>
      </div>
    </div>
  </header>
  <!-- Page content-->
  <div class="container">
    <div class="row">
      <!-- Les preuves-->
      <div class="col-lg-8">
        <div class="row">
          <?php for($i=0;$i<$nbpreuves;$i++): ?>
            <!-- Preuve-->
            <div class="col-lg-6 card mb-4">
              <!-- <img class="card-img-top" src="https://dummyimage.com/700x350/dee2e6/6c757d.jpg" alt="..." /> -->
              <div class="card-body">
                <div class="small text-muted">Comp.: <?php echo $preuves[$i]->niveau_competence->intitule; ?></div>
                <h2 class="card-title h4"><?php echo $preuves[$i]->intitule; ?></h2>
                <p class="card-text">Faite durant la situation <em><?php echo $preuves[$i]->situation->intitule; ?></em>, remplie le <?php echo $preuves[$i]->date; ?> </p>
                <a class="btn btn-primary" href="preuve.php?id=<?php echo $preuves[$i]->id;?>">Voir tous les éléments →</a>
              </div>
            <?php endfor;?>
            
            </div>
        </div>
      </div>
      <!-- Side widgets-->
      <div class="col-lg-4">
        
        <!-- Search widget
        <div class="card mb-4">
          <div class="card-header">Recherche</div>
          <div class="card-body">
            <div class="input-group">
              <input class="form-control" type="text" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" />
              <button class="btn btn-primary" id="button-search" type="button">Go!</button>
            </div>
          </div>
        </div>
      -->
        <!--  widget Compétence-->
        <div class="card mb-4">
          <div class="card-header">Niveau de compétence</div>
          <div class="card-body">
            <div class="row">
              <div class="col-sm-6">
                <ul class="list-unstyled mb-0">
                  <li><a href="#!">Web Design</a></li>
                  <li><a href="#!">HTML</a></li>
                  <li><a href="#!">Freebies</a></li>
                </ul>
              </div>
              <div class="col-sm-6">
                <ul class="list-unstyled mb-0">
                  <li><a href="#!">JavaScript</a></li>
                  <li><a href="#!">CSS</a></li>
                  <li><a href="#!">Tutorials</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <!-- Side widget
        <div class="card mb-4">
          <div class="card-header">Side Widget</div>
          <div class="card-body">You can put anything you want inside of these side widgets. They are easy to use, and feature the Bootstrap 5 card component!</div>
        </div>
        -->
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
