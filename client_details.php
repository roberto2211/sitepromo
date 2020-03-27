<link rel="stylesheet" type="text/css" href="libs/css/custom.css">
<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">
<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap-theme.min.css">

<link rel="stylesheet" type="text/css" href="libs/css/custom.css">

<script type="text/javascript" src="https://code.jquery.com/jquery.min.js"></script>
<script src="https://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
<?php 

include "header.php";
include_once "config/database.php";
include_once "objects/Form.php";
// get database connection
$database = new Database();
$db = $database->getConnection();



/* instance ya objet profile, qui unitialise la connexion */
   

   $form = new Form($db);
   $rows = $form->readInfo();   

   
   foreach ($rows as  $detailInfo) {
   if( $detailInfo['email'] != '' && $detailInfo['firstname'] != ''){ 
  ?>
<div class="container">
  <div class="row">
<div class="list-group">
  <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
    <div class="d-flex w-100 justify-content-between">
      <h5 class="mb-1"><?php echo $detailInfo['firstname'].' '.$detailInfo['lastname']; ?></h5>
      <small><?php echo $detailInfo['created'] ?></small>
    </div>
    <p class="mb-1"><?php echo $detailInfo['message'] ?></p>
    <small><?php echo $detailInfo['email'] ?></small>
  </a>
  
</div>
</div>
</div>

<?php }
}
 ?>