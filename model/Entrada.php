<?php
class Entrada extends YunbitBase{
  private $id;
  private $name;
  private $description;
  
  public function __construct() {
    $table = "entradas";
    parent::__construct($table);
  }
    
  public function getId() {
    return $this->id;
  } 
  public function setId($id) {
    $this->id = $id;
  }
    
  public function getName() {
    return $this->name;
  }
  public function setName($name) {
    $this->name = $name;
  }

  public function getDescription() {
    return $this->description;
  }
  public function setDescription($description) {
    $this->description = $description;
  }

  public function insert(){
    $query = "INSERT INTO entradas (ID, NAME, DESCRIPTION)
              VALUES (NULL,
                     '".$this->name."',
                     '".$this->description."');";
    $result = $this->db()->query($query);
    return $result;
  }
  //Return all tags related with ID Entrada.
  public function reltagsId($id){
    $query = "SELECT reltag.IDTAG, tags.tag
              FROM reltag
              INNER JOIN tags ON reltag.IDTAG = tags.ID
              WHERE reltag.IDENTRADA=$id";
    $tags = $this->db()->query($query);
    $reltags = array();
    while ($row = $tags->fetch_object()) {
      $reltags[] = $row;
    }  
    return $reltags;
  }

  //Check the tags contains the description of an entry
  public function checktags($tags, $idEntrada){
    $query = "SELECT * FROM tags";
    $results = $this->db()->query($query);
    $existTags = array();
    while ($row = $results->fetch_object()){
      $existTags[] = $row;
    }
    //There are tags
    if (isset($existTags)){
      $isnew = false;
      foreach ($tags as $tag) {
        foreach ($existTags as $etag) {
          //Check relation previous
          if ($tag == $etag->TAG){ 
            
            $query = "SELECT * FROM reltag WHERE IDENTRADA=$idEntrada AND IDTAG=$etag->ID";
            $results = $this->db()->query($query);
            //The relation is not created. It create!
            if ($results->num_rows == 0){
              $query = "INSERT INTO reltag (ID, IDTAG, IDENTRADA)
              VALUES (NULL,
                     '".$etag->ID."',
                     '".$idEntrada."');";
              $result = $this->db()->query($query);
            }
            $isnew = false;
            break;
          }else{
            $isnew = true;
          }
        }
        if ($isnew){
          //Insert new tag
          $query = "INSERT INTO tags (ID, tag)
                    VALUES (NULL,
                     '".$tag."');";
          $this->db()->query($query);
          $insertag = $this->db()->insert_id;

          //Insert relation with new tag created
          $query = "INSERT INTO reltag (ID, IDTAG, IDENTRADA)
                    VALUES (NULL,
                     '".$insertag."',
                     '".$idEntrada."');";
          $inserted = $this->db()->query($query);
        }
      }
    }
  }
}
?>