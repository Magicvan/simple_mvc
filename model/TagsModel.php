<?php
class TagsModel extends ModelBase{
  private $table;
  
  public function __construct(){
    $this->table = "tags";
    parent::__construct($this->table);
  }
  
  //Métodos
  public function getUnaTag(){
    $query = "SELECT * FROM tags WHERE id='0'";
    $tag = $this->sql($query);
    return $tag;
  }
}
?>