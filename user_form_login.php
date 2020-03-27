<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<link rel="stylesheet" type="text/css" href="libs/css/profile.css">
<link rel="stylesheet" type="text/css" href="libs/css/custom.css">

<?php include "header.php"; ?>
<?php
// Initialize the session
session_start();
 

 include_once "config/database.php";
include_once "objects/Profile.php";

$database = new Database();
$db = $database->getConnection();


// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location:client_details.php");
    exit;
}
 

// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT * FROM `profile` WHERE email = :email";
  
        
        if($stmt = $db->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":email", $param_username, PDO::PARAM_STR);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){


                
                // verifier si le user exist et ko ari umwe, si ca remonte plusieur, no connection
                if($stmt->rowCount() == 1){
                    if($row = $stmt->fetch()){      //retourne la req executée

                        $id = $row["id"];

                        $username = $row["email"];
                        $hashed_password = $row["password"];

                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            // Redirect user to formulaire page
                            header("location: form.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "No account found with that username.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            unset($stmt);
        }
    }
    
    // Close connection
    unset($pdo);
}
?>
 
<div class="container register">
        <div class="row">

        
<div class="col-md-3"></div>
        <div class="col-md-6 log-left">
            <h3>Bienvenu</h3>
            <p>Connectez-vous</p>


        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>   

            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="form-control">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
            <p>Don't have an account? <a href="register.php">Sign up now</a>.</p>
        </form>
    </div>
</div>
</div> 


<!--
<div class="container register">
        <div class="row">

        
<div class="col-md-3"></div>
        <div class="col-md-6 log-left">
            <h3>Bienvenu</h3>
            <p>Connectez-vous</p>

<form id="user-form_log" method="post" action="user_login.php" role="form">
                <div class="row register-form">
                    <div class="col-md-12">
                        <div class="form-content">    
                            <div class="form-group">
                                <input type="text" name="username" class="form-control" placeholder="Email *" value=""/>
                            </div>
                            
                            <div class="form-group">
                                <input type="password" name="password"  class="form-control" placeholder="Password *" value=""/>
                            </div>

                            <input type="submit" name="" value="Login"/><br/>
                        </div>       
                    </div>
            </div>
</form>

</div>
<div class="col-md-3"></div>
</div>
</div>
-->