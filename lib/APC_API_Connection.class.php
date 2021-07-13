<?php
// Singleton
class APC_API_Connection {
  // Hold the class instance.
  private static $instance = null;
  
  private $apipath = null;
  
  private function __construct($apipath="http://localhost:1337")
  {
    $this->apipath=$apipath;
  }
  
  public static function getInstance()
  {
    if(!self::$instance)
    {
      self::$instance = new APC_API_Connection();
    }
    
    return self::$instance;
  }
  
  private function getElements($entreypoint){
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $this->apipath.$entreypoint);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, [
      'Content-Type: application/json'
    ]); // Sets header information for authenticated requests
    
    $res = curl_exec($curl);
    curl_close($curl);
    return $res;
  }
  
  
  public function getAllCompetences(){
      return json_decode(self::$instance->getElements('/competences'));
  }
  public function getCompetencesDiplome($diplome){
      return json_decode(self::$instance->getElements('/competences?diplome='.$diplome));
  }
  
  public function getComposantes($idcompetence){
    return json_decode(self::$instance->getElements('/composantes?competence='.$idcompetence));
  }
  
  public function getNiveauxCompetences($idcompetence){
      return json_decode(self::$instance->getElements('/niveaux-competences?competence='.$idcompetence));
  }
  
  public function getApprentissages($idniveau){
    return json_decode(self::$instance->getElements('/apprentissages?niveau_competence='.$idniveau));
  }
  
  public function getAllSAES(){
      return json_decode(self::$instance->getElements('/saes'));
  }
  
  public function getSAESDiplome($diplome){
      return json_decode(self::$instance->getElements('/saes?diplome='.$diplome));
  }
  
  
  public function getPreuves($idUser){
    return json_decode(self::$instance->getElements('/preuves?created_by='.$idUser));
  }
  
  public function getPreuve($idpreuve){
    return json_decode(self::$instance->getElements('/preuves/'.$idpreuve));
  }
  
  public function getSituation($id){
    return json_decode(self::$instance->getElements('/situations/'.$id));
  }
  
  public function getSAE($id){
    return json_decode(self::$instance->getElements('/saes/'.$id));
  }
  
}
?>
