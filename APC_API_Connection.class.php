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
  
  
  public function getCompetences(){
      return json_decode(self::$instance->getElements('/competences'));
  }
  
  public function getNiveauxCompetences($idcompetence){
      return json_decode(self::$instance->getElements('/niveau-competences?competence='.$idcompetence));
  }
  
  public function getSAES(){
      return json_decode(self::$instance->getElements('/saes'));
  }
  
  public function getPortfolio($id){
      return json_decode(self::$instance->getElements('/portfolios/'.$id));
  }
  
  public function getPreuves($idTrace){
    return json_decode(self::$instance->getElements('/preuves?trace='.$idTrace));
  }
  
}
?>
