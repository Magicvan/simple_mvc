<?php
class TagsController extends BaseController{    
  public function __construct() {
    $table = 'tags';
    parent::__construct($table);
  }    
  public function index(){        
    //New object 'Tag'
    $tag = new Tag();      
    //All tags
    $tags = $tag->selectAll();     
    
    //Cargamos la vista index y le pasamos valores
    $this->view("tags", array(
      "tags" => $tags,
      "yunbit" => "Prueba de Iván Méndez López"
    ));
  }    
  public function create(){
    if (isset($_POST["tag"])){ 
      $tag = new Tag();
      $tag->setTag($_POST["tag"]);
      $result_e = $tag->insert();
    }
    $this->redirect("Tags", "index");
  }    
  public function delete(){ 
    if (isset($_GET["id"])){ 
      $id = (int)$_GET["id"];      
      $tag = new Tag();
      $tag->deleteReg($id); 
    }
    $this->redirect("Tags", "index");
  }   

  public function edit(){ 
    if (isset($_GET["id"])){ 
      $id = (int)$_GET["id"];      
      $tag = new Tag();
      $tags = $tag->selectId($id); 
      $this->view("editTags", array(
        "tags" => array($tags),
        "yunbit" => "Prueba de Iván Méndez López"
      ));
    }else{
      $this->redirect("Tags", "index");
    }    
  } 

  public function update(){ 
    if (isset($_POST["id"])){ 
      $id = (int)$_POST["id"];      
      $fieldtag = $_POST["tag"];      
      $tag = new Tag();
      $tag->updateReg($id, 'TAG', $fieldtag); 
    }
    $this->redirect("Tags", "index");
  } 

}
?>