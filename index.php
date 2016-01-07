<?php
//Load the base controller
require_once 'core/BaseController.php';
//Load extra functions to front
require_once 'core/controller.extra.php';

//Load the controllers
if(isset($_GET["controller"])){
  $controllerObj = loadController($_GET["controller"]);
  runAction($controllerObj);
}else{
  $controllerObj = loadController('Home');
  runAction($controllerObj);
}
?>