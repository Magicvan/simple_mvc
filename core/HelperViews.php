<?php
class HelperViews{
  public function url($controller='Home', $action='index'){
    $urlString = "index.php?controller=".$controller."&action=".$action;
     return $urlString;
  }
}
?>