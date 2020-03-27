<?php

class Profile{
 
    // database connection and table name
    private $conn;
    private $table_name = "profile";
 
    // object properties
    private $id;
    private $firstname;
    private $lastname;
    private $email;
    private $password;
    private $phone;
    private $gender;
    private $created; 
    
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;



    }






// creer. une methode qui ne retourne rien car insertion pas de retour
function create(){
 

 $query = "INSERT INTO " . $this->table_name . " (firstname, lastname, email, password, phone, gender, created) VALUES (:firstname, :lastname, :email, :password, :phone, :gender, :created)";

    // prepare query
    $stmt = $this->conn->prepare($query);
 
    // sanitize
    $this->firstname=htmlspecialchars(strip_tags($this->firstname));
    $this->lastname=htmlspecialchars(strip_tags($this->lastname));
    $this->email=htmlspecialchars(strip_tags($this->email));
    $this->password=htmlspecialchars(strip_tags($this->password));
    $this->phone=htmlspecialchars(strip_tags($this->phone));
    $this->gender=htmlspecialchars(strip_tags($this->gender));
    $this->created=htmlspecialchars(strip_tags($this->created));
 
    // bind values
    $stmt->bindParam(":firstname", $this->firstname);
    $stmt->bindParam(":lastname",  $this->lastname);
    $stmt->bindParam(":email",     $this->email);
    $stmt->bindParam(":password",  $this->password);
    $stmt->bindParam(":phone",     $this->phone);
    $stmt->bindParam(":gender",    $this->gender);
    $stmt->bindParam(":created",   $this->created);
 
    // execute query
    if($stmt->execute()){
        return true;
    }
 
    return false;
     
}

    public function getByEmailU($value)
    {
     $query = "SELECT * FROM users WHERE email = ?" ;

    $stmt = $this->conn->prepare($query);

    $stmt->execute([$value]);
    $user = $stmt->fetch();
    }




















    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getfirstname()
    {
        return $this->firstname;
    }

    /**
     * @param mixed $firstname
     *
     * @return self
     */
    public function setfirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getlastname()
    {
        return $this->lastname;
    }

    /**
     * @param mixed $lastname
     *
     * @return self
     */
    public function setlastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     *
     * @return self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     *
     * @return self
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     *
     * @return self
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param mixed $gender
     *
     * @return self
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param mixed $created
     *
     * @return self
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }
}


