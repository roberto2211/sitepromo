<?php

// require ReCaptcha class
require('recaptcha-master/src/autoload.php');

// include classes
include_once "config/database.php";
include_once "objects/Profile.php";
// get database connection
$database = new Database();
$db = $database->getConnection();
 

// message that will be displayed when everything is OK :)
$okMessage = 'Enregistrement reussi, connectez vous !';



try {
   // if (!empty($_POST)) {



        
//traitement du formulaire 
    /*  ushobora gu testa niba toutes les valeurs za formulaire zabaye transmises */ /*isset(var)*/
if (isset($_POST['firstname']) && !empty($_POST['firstname']) && isset($_POST['lastname']) && !empty($_POST['lastname']) && isset($_POST['password']) && !empty($_POST['password']) && isset($_POST['email']) && !empty($_POST['email']))
{
    			$firstname =     stripslashes(trim($_POST['firstname']));
    			$lastname  =     stripslashes(trim($_POST['lastname']));
                $email     =     stripslashes(trim($_POST['email']));
                $password  =     $_POST['password'];
                $phone     =     $_POST['phone'];
                $gender    =     stripslashes(trim($_POST['gender']));
 

                $profile = new Profile($db);

                	$passwordhashed = password_hash($password, PASSWORD_DEFAULT);
                    // set product property values
                    $profile->setFirstName($firstname);
                    $profile->setLastName($lastname);
                    $profile->setEmail($email);
                    $profile->setPassword($passwordhashed);
                    $profile->setPhone($phone);
                    $profile->setGender($gender);
                    $profile->setCreated(date('Y-m-d H:i:s'));
                 
                    $profile->create();




        $responseArray = array('type' => 'success', 'message' => $okMessage);


    }



    else {
    	            throw new \Exception('Données incomplètes');
        }
    }
 catch (\Exception $e) {
    $responseArray = array('type' => 'danger', 'message' => $e->getMessage());
}

if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    $encoded = json_encode($responseArray);

    header('Content-Type: application/json');

    echo $encoded;
} else {
    echo $responseArray['message'];
}


if ($okMessage){
	header("location:form.php"); 
}