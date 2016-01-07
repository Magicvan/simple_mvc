<?php
class RestController extends BaseController{    
  public function __construct() {
  }    
  public function index(){   
    $restaction = "default";
		// POST Control 
		if(isset($_POST["restaction"])){
			$restaction = $_POST["restaction"];
		}
		/**
		* Controls the RESTful Services
		* URL Mapping
		*/
		switch($restaction){
			case "listAll":
				// to handle REST Url /rest/entradas
				$RestHandler = new RestHandler();
				$RestHandler->getAllEnties();
				break;		
			case "show":
				// to handle REST Url /rest/entradas + POST variable
				$RestHandler = new RestHandler();
				$RestHandler->getEntry($_POST["idEntry"]);
				break;
			case "delete" :
				// to handle REST Url /rest/entradas + POST variable
				$RestHandler = new RestHandler();
				$RestHandler->delEntry($_POST["idEntry"]);
				break;
			case "update" :
				// to handle REST Url /rest/entradas + POST variable
				$RestHandler = new RestHandler();
				$RestHandler->upEntry($_POST["idEntry"], $_POST["field"], $_POST["newValue"]);
				break;
			case "default" :
				// to handle REST Url /rest/entradas + POST variable
				$RestHandler = new RestHandler();
				$RestHandler->default();
				break;
		}
  }
}
		

?>
