<?php
class Tag extends YunbitBase{
  private $id;
  private $tag;
  
  public function __construct() {
    $table = "tags";
    parent::__construct($table);
  }
    
  public function getId() {
    return $this->id;
  } 
  public function setId($id) {
    $this->id = $id;
  }
    
  public function getTag() {
    return $this->tag;
  }
  public function setTag($tag) {
    $this->tag = $tag;
  }

  public function insert(){
    $query = "INSERT INTO tags (ID, TAG)
              VALUES (NULL,
                     '".$this->tag."');";
    $result = $this->db()->query($query);
    return $result;
  }

}
?>