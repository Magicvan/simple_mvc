<?php
class BaseController{
  public function __construct() {
    require_once 'YunbitBase.php';        
    require_once 'ModelBase.php';        
    //Models load
    foreach(glob("model/*.php") as $file){
      require_once $file;
    }
  }    
  //Plugins & Extras
  public function view($viewer, $data){
    foreach ($data as $key => $value) {
      ${$key} = $value; 
    }
    require_once 'core/HelperViews.php';
    $helper = new HelperViews();

    require_once 'view/'.$viewer.'View.php';
  }  
  
  public function redirect($controller, $action="index"){
    header("Location:index.php?controller=".$controller."&action=".$action);
  } 

}
?>