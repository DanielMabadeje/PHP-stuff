<?php

include_once 'class.user.php';
$user = new User(); $uid = $_SESSION['uid'];

if (!$user->get_session()) {
    header('location:../form/login.php');
}
if (isset($_GET['q'])) {
   $user->user_logout();
   header('location:../form/login.php');
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page 2</title>
</head>
<body>
    <h1>Page 2</h1>    
</body>
</html>
