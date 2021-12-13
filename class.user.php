<?php

include 'db_config.php';
class User
{
    public $db;

    public function __construct()
    {
        $this->db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

        if (mysqli_connect_errno()) {
            echo 'Error: Could not connect to database.';

            exit;
        }
    }

    /*** for registration process ***/

    public function reg_user($name, $password, $email)
    {
        
        $password = password_hash($password, PASSWORD_DEFAULT);
        $sql = 'SELECT * FROM users WHERE  uemail=$email';

        //checking if the username or email is available in db

        $check = $this->db->query($sql);

        $count_row = $check->num_rows;

        //if the username is not in db then insert to the table

        if ($count_row == 0) {
            $sql1 = "INSERT INTO users SET uemail='$email', upass='$password', fullname='$name' ";

            $result = mysqli_query($this->db, $sql1) or die(mysqli_connect_errno() . 'Data cannot inserted');

            return $result;
        } else {
            return false;
        }
    }

    /*** for login process ***/

    public function check_login($emailusername, $password)
    {
        $secure = password_hash($password, PASSWORD_DEFAULT);

        $sql2 = "SELECT * FROM users WHERE  fullname='$emailusername' OR uemail='$emailusername'";
        //checking if the username is available in the table

        $results = mysqli_query($this->db, $sql2);

        $user_datas = mysqli_fetch_array($results);
        $userpass = $user_datas['upass'];

        $count_row = $results->num_rows;

        if ($count_row == 1 && password_verify($password, $userpass)) {
            // this login var will use for the session thing

            $_SESSION['login'] = true;

            $_SESSION['uid'] = $user_datas['uid'];

            return true;
        } else {
            return false;
        }
        echo $user_datas['fullname'];
    }

    /*** for showing the username or fullname ***/

    public function get_fullname($uid)
    {
        $sql3 = "SELECT * FROM users WHERE uid = $uid";

        $result2 = mysqli_query($this->db, $sql3);

        $user_data = mysqli_fetch_array($result2);

        echo $user_data['fullname'];
    }

  
    /*** starting the session ***/

    public function get_session()
    {
        return $_SESSION['login'];
    }

    public function user_logout()
    {
        $_SESSION['login'] = false;
        session_destroy();
    }


}


?>
