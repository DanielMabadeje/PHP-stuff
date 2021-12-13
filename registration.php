<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registratio</title>
</head>
<body style="margin:0;">

<?php
include_once 'class.user.php'; 
$user = new User(); // Checking for user logged in or not
 if (isset($_REQUEST['submit'])) {
    
    
     extract($_REQUEST);
     $register = $user->reg_user($_POST['fullname'], $upass, $uemail);

     if ($register) {
         // Registration Success
         echo 'Registration successful <a href="login.php">Click here</a> to login';
         header('location: login.php');
     } else {
         // Registration Failed
         echo 'Registration failed. Email or Username already exits please try again';
     }
 }

 ?>
<script type="text/javascript" language="javascript">
 function submitreg() {
 var form = document.reg;
 if(form.name.value == ""){
 alert( "Enter name." );
 return false;
 }
 else if(form.upass.value == ""){
 alert( "Enter password." );
 return false;
 }
 else if(form.uemail.value == ""){
 alert( "Enter email." );
 return false;
 }
 }
</script>

<div  id="myDiv" class="animate-bottom col-md-12">
<section class="col-md-6 row" id="work">
<div class="col-md-4" id="works">
    
    <h5 id="top">Already have an account? <a href="login.php">Login</a></h5>
    </div>

<div id="container" class="col-md-8" >
<h1>Registration Here</h1>
<form action="" method="post" name="reg" >


     Full Name:
<input type="text" name="fullname" required=""/><br>
Email: <br>
<input type="text" name="uemail" required="" /><br>
Password:<br>
<input type="password" name="upass" required="" /><br>
<br>

<input onclick="return(submitreg());" type="submit" name="submit" value="Register" /><br>
</form>
</div>
</section>
</div>



 
</body>
</html>