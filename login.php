<?php
session_start();

    include_once 'class.user.php';

    $user = new User();

    if (isset($_REQUEST['submit'])) {
        extract($_REQUEST);

        $login = $user->check_login($_POST['emailusername'], $password);
        if ($login) {
            // Registration Success

            header('location: page2.php');
        } else {
            echo 'Wrong username or password';
        }
    }
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Log In</title>
</head>
<!-- <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> -->
<body onload="myFunction()" style="margin:0;">

 

<script type="text/javascript" language="javascript">

 

            function submitlogin() {

                var form = document.login;

                if(form.emailusername.value == ""){

                    alert( "Enter email or username." );

                    return false;

                }

                else if(form.password.value == ""){

                    alert( "Enter password." );

                    return false;

                }

            }

 

</script>

 

<span style="font-family: 'Courier 10 Pitch', Courier, monospace; font-size: 13px; font-style: normal; line-height: 1.5;">
<div id="container" class="">
<div style="display:none;" id="myDiv" class="animate-bottom style">
<h1 style="color:white;">Login Here</h1>

<form action="" method="post" class="" name="login">
UserName or Email:<br>
<input type="" name="emailusername" class="" required="" /><br>
Password:<br>
<td><input type="password" name="password" class="" required="" /><br>
<input onclick="return(submitlogin());" type="submit" name="submit" value="Login" /><br>
<a href="registration.php">Register new user</a>

</form></div>
</div>

</span>
        </body>
        </html>