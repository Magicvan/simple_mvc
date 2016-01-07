<?php
class EntradasController extends BaseController{    
  public function __construct() {
    $table = 'entradas';
    parent::__construct($table);
  }    
  public function index(){        
    //New object 'Entrada'
    $entrada = new Entrada();      
    //All entries
    $entradas = $entrada->selectAll();     
    
    //Cargamos la vista index y le pasamos valores
    $this->view("entradas", array(
      "entradas" => $entradas,
      "yunbit" => "Prueba de Iván Méndez López"
    ));
  }    
  public function create(){
    if (isset($_POST["name"])){ 
      $entrada = new Entrada();
      $entrada->setName($_POST["name"]);
      $entrada->setDescription($_POST["description"]);
      $result_e = $entrada->insert();
    }
    $this->redirect("Entradas", "index");
  }    
  public function delete(){ 
    if (isset($_GET["id"])){ 
      $id = (int)$_GET["id"];      
      $entrada = new Entrada();
      $entrada->deleteReg($id); 
    }
    $this->redirect("Entradas", "index");
  }   

  public function edit(){ 
    if (isset($_GET["id"])){ 
      $id = (int)$_GET["id"];      
      $entrada = new Entrada();
      $entradas = $entrada->selectId($id); 
      $reltags = $entrada->reltagsId($id);
      $this->view("editEntradas", array(
        "entradas" => array($entradas),
        "reltags" => $reltags,
        "yunbit" => "Prueba de Iván Méndez López"
      ));
    }else{
      $this->redirect("Entradas", "index");
    }    
  } 
  // Update function 
  public function update(){ 
    if (isset($_POST["id"])){ 
      $id = (int)$_POST["id"];      
      $name = $_POST["name"];      
      $description = $_POST["description"]; 
      //If the words contains the description are not as tag, create it, switch pattern.
      $words = explode(" ", $description); 
      $notags = array("a", "ante", "bajo", "cabe", "con", "contra", "de", "desde", "durante", "en", "entre", "hasta", "hacia", "mediante", "para" , "por", "segundo", "sin", "sobre", "tras");  
      $tags = array_diff($words, $notags);
      $entrada = new Entrada();
      $entrada->checktags($tags, $id);
      $entrada->updateReg($id, 'NAME', $name); 
      $entrada->updateReg($id, 'DESCRIPTION', $description); 
    }
    $this->redirect("Entradas", "index");
  } 
}
?>