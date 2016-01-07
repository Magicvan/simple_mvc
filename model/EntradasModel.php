<?php
class EntradasModel extends ModelBase{
  private $table;
  
  public function __construct(){
    $this->table = "entradas";
    parent::__construct($this->table);
  }
  
}
?>