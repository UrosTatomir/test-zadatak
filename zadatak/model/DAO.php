<?php
require_once '../config/db.php';
// require_once '/home/estavela/scs/config/db.php';  //OBAVEZNO ZAPAMTITI

class DAO{

   private $db;
   private $GETALLUSERS="SELECT * FROM users";
   private $REGISTER= "INSERT INTO users(name,surname,email,password,active) VALUES(?,?,?,?,?)";
   private $LOGIN="SELECT * FROM users WHERE name =? ";
   private $GETSTUDGRADES="SELECT grade FROM grades WHERE id_user=?";


public function __construct(){
    $this->db=DB::createInstance();
}
public function getAllUsers(){
  
    $statement=$this->db->prepare($this->GETALLUSERS);
    $statement->execute();
    $result= $statement->fetchAll();
    return $result;
}
public function register($name,$surname ,$email,$password,$active) {
    $statement = $this->db->prepare($this->REGISTER);
    $statement->bindValue(1,$name);
    $statement->bindValue(2,$surname);
    $statement->bindValue(3,$email);
    $statement->bindValue(4,$password);
    $statement->bindValue(5,$active);
    $statement->execute();    
}
public function login($name){
    $statement=$this->db->prepare($this->LOGIN);
    $statement->bindValue(1,$name);
    $statement->execute();
    $result=$statement->fetch() ;
    return $result;
}
public function getStudGrades($id_user){
    $statement=$this->db->prepare($this->GETSTUDGRADES);
    $statement->bindValue(1,$id_user);
    $statement->execute();
    $result=$statement->fetchAll() ;
    return $result;
}






}//end DAO class

?>