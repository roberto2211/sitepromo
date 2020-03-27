<?php

class Profile{
 
    // database connection and table name
    private $conn;
    private $table_name = "Profile";
 
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
    $query = "SELECT email, message
            FROM " . $this->table_name . "
            ORDER BY created DESC
            ";
 
    // prepare query statement
 try {
    $stmt = $this->conn->prepare( $query );
    $stmt->execute();
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {

        return $result;
      
    }
    //$stmt = null;
  }
  catch (PDOException $e) {
    print $e->getMessage();
  }
}
 


}