<?php
class YunbitBase {
  private $table;
  private $db;
  private $connect;

  public function __construct($table) {
    $this->table = (string) $table;    
    require_once 'Connect.php';
    $this->connect = new Connect();
    $this->db = $this->connect->connection();
  }
  
  public function getConnect(){
    return $this->connect;
  }  
  public function db(){
    return $this->db;
  }
  
  /**
  * Read functions
  */
  public function selectAll(){
    $results = $this->db->query( "SELECT * FROM $this->table ORDER BY ID DESC" );
    $resultsSet = array();
    while ($row = $results->fetch_object()) {
      $resultsSet[]=$row;
    }      
    return $resultsSet;   
  }  
  public function selectId($id){
    $results = $this->db->query("SELECT * FROM $this->table WHERE ID=$id");
    $resultsSet = array();
    if($row = $results->fetch_object()) {
      $resultsSet = $row;
    }    
    return $resultsSet;
  }  
  public function selectBy($field, $value){
    $results = $this->db->query("SELECT * FROM $this->table WHERE $field='$value'");
    $resultsSet = array();
    while($row = $results->fetch_object()) {
      $resultsSet[]=$row;
    }      
    return $resultsSet;
  }

  /**
  * Update functions
  */
  public function updateReg($id, $field, $newValue){
    $results = $this->db->query("UPDATE $this->table SET $field='$newValue' WHERE ID=$id;");
  }
  
  /**
  * Delete functions
  */
  public function deleteReg($id){
    $results = $this->db->query("DELETE FROM $this->table WHERE ID=$id"); 
    return $results;
  }  
  public function deleteBy($field, $value){
    $results = $this->db->query("DELETE FROM $this->table WHERE $field='$value'"); 
    return $results;
  }

}
?>
