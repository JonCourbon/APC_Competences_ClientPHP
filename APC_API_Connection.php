<?php
// Singleton
class APC_API_Connection {
  // Hold the class instance.
  private static $instance = null;
  
  private $apipath = 'http://localhost:1337';
  private $competences=null;
 
  
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
      
   
  // The db connection is established in the private constructor.
  private function __construct()
  {
  }
  
  public static function getInstance()
  {
    if(!self::$instance)
    {
      self::$instance = new APC_API_Connection();
    }
   
    return self::$instance;
  }
  
  public function getCompetences(){
	  if(is_null($this->competences)){
		  $this->competences=json_decode(self::$instance->getElements('/competences'));
	  }
	  return $this->competences;
	  
  }
  
}

$apicon=APC_API_Connection::getInstance();
$comp=$apicon->getCompetences();
print_r($comp);
?>
