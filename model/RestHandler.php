<?php
class RestHandler extends SimpleRest {

	public function getAllEntries() {	

		$entrada = new Entrada();
		$rawData = $entrada->selectAll();

		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('error' => 'No entries found!');		
		} else {
			$statusCode = 200;
		}

		$requestContentType = $_SERVER['HTTP_ACCEPT'];
		$this ->setHttpHeaders($requestContentType, $statusCode);
				
		if(strpos($requestContentType,'application/xml') !== false){
			$response = $this->encodeXml($rawData);
			echo $response;
		}
	}
	
	public function encodeXml($responseData) {
		// New object of SimpleXMLElement
		$xml = new SimpleXMLElement('<?xml version="1.0"?><entrada></entrada>');
		foreach($responseData as $key=>$value) {
			$xml->addChild($key, $value);
		}
		return $xml->asXML();
	}
	
	public function getEntry($id) {

		$entrada = new Entrada();
		$rawData = $entrada->selectId($id);

		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('error' => 'No entries found!');		
		} else {
			$statusCode = 200;
		}

		$requestContentType = $_SERVER['HTTP_ACCEPT'];
		$this ->setHttpHeaders($requestContentType, $statusCode);
				
		if(strpos($requestContentType,'application/xml') !== false){
			$response = $this->encodeXml($rawData);
			echo $response;
		}
	}

  public function delEntry($id) {

    $entrada = new Entrada();
    $rawData = $entrada->deleteReg($id);

    if(empty($rawData)) {
      $statusCode = 404;
      $rawData = array('error' => 'No entries deleted!');   
    } else {
      $statusCode = 200;
    }

    $requestContentType = $_SERVER['HTTP_ACCEPT'];
    $this ->setHttpHeaders($requestContentType, $statusCode);
        
    if(strpos($requestContentType,'application/xml') !== false){
      $response = $this->encodeXml($rawData);
      echo $response;
    }
  }

  public function default(){
    //TODO: Default function
  }
}
?>