<?php
function loadController($controller){
  $fileController = $controller.'Controller';
  $uriFileController = 'controller/'.$fileController.'.php';
  
  if(!is_file($uriFileController)){
    $uriFileController = 'controller/EntradasController.php';   
  }
  require_once $uriFileController;
  $controllerObj = new $fileController();
  return $controllerObj;
}

function loadAction($controllerObj, $action){
  $exec = $action;
  $controllerObj->$exec();
}
function runAction($controllerObj){
  if(isset($_GET["action"]) && method_exists($controllerObj, $_GET["action"])){
    loadAction($controllerObj, $_GET["action"]);
  }else{
    loadAction($controllerObj, 'index');
  }
}

?>