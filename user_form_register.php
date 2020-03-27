<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<link rel="stylesheet" type="text/css" href="libs/css/profile.css">
<link rel="stylesheet" type="text/css" href="libs/css/custom.css">

<?php include "header.php"; ?>


<div class="container register">
      


<form id="_user-form" method="post" action="user_register.php" role="form">

<div class="col-md-12 register-right">
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <h3 class="register-heading">Inscription</h3>

                

                    <div class="controls">
                    <div class="row register-form">

                        
                        <div class="col-md-6">

                            <div class="form-group">
                                <input type="text" class="form-control" placeholder=" Nom *" name="firstname" value="" />
                            </div>
                            
                            <div class="form-group">
                            <input type="text" class="form-control" placeholder="Prénom *"  name="lastname" value="" />
                            </div>
                           
                        
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder=" Email *" name="email" value="" />
                            </div>
                                                      
                           <div class="form-group">
                            <input type="password" class="form-control" placeholder="Mot de passe *" name="password" value="" />
                            </div>

                            <div class="form-group">
                                <input type="text" minlength="10" maxlength="10" name="phone" class="form-control" placeholder="Your Phone *" value="" name="phone" />
                            </div>
                    
                            <!--<input type="submit" class="btnRegister"  value="Register"/>-->
                            <input type="submit" class="btn btn-success btn-send" value="Inscription">
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                           
                            <label class="radio inline"> 
                                <input type="radio" name="gender" value="male" checked>
                                <span> Homme </span> 
                            </label>
                            
                            <label class="radio inline"> 
                                <input type="radio" name="gender" value="female">
                                <span>Femme </span> 
                            </label>
                        
                            </div>
                          </div>
                    </div>
                 </div>
            </div>
        </div>
        </div>
    </form>
</div>
        
        
<script src="javascript/validator.js"></script>


            
                