<?php

class Form{
 
    // database connection and table name
    private $conn;
    private $table_name = "forminfo";
 
    // object properties
    public $id;
    public $firstName;
    public $lastName;
    public $email;
    public $message;
    public $ip;
    public $created;
    
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }





// creer
function save(){
 

 $query = "INSERT INTO " . $this->table_name . " (firstname, lastname, email, message, ip, created) VALUES (:name1, :name2, :email, :message, :ip, :created)";


    // prepare query
    $stmt = $this->conn->prepare($query);
 
    // sanitize
    $this->firstName=htmlspecialchars(strip_tags($this->firstName));
    $this->lastName=htmlspecialchars(strip_tags($this->lastName));
    $this->email=htmlspecialchars(strip_tags($this->email));
    $this->message=htmlspecialchars(strip_tags($this->message));
    $this->ip=htmlspecialchars(strip_tags($this->ip));
    $this->created=htmlspecialchars(strip_tags($this->created));
 
    // bind values
    $stmt->bindParam(":name1", $this->firstName);
    $stmt->bindParam(":name2", $this->lastName);
    $stmt->bindParam(":email", $this->email);
    $stmt->bindParam(":message", $this->message);
     $stmt->bindParam(":ip", $this->ip);
    $stmt->bindParam(":created", $this->created);
 
    // execute query
    if($stmt->execute()){
        return true;
    }
 
    return false;
     
}




function readInfo(){
 
    // select query
    $query = "SELECT firstname, lastname, email, message, created
            FROM " . $this->table_name . "
            ORDER BY created DESC
            ";
 
    // prepare query statement
 try {
    $stmt = $this->conn->prepare( $query );
    $stmt->execute();

/* Récupération de toutes les lignes d'un jeu de résultats grace à fetchAll, fetch permet de recuperer une seule ligne */
    $result = $stmt->fetchAll();

/*  return le resultat de la requete  */
return $result ;


    //$stmt = null;
  }
  catch (PDOException $e) {
    print $e->getMessage();
  }
}
 


}