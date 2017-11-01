<?php
  function ForceLogin() {
    
    if(isset($_SESSION['user_id'])) {
        //The user is allowed here
    } else {
        //user is not allowed.
        header("Location: /php_login_system/login.php"); 
        exit;
    }
    }

function ForceDashboard() {

    if(isset($_SESSION['user_id'])) {
        //The user is allowed here but redirect anyway
        header("Location: /php_login_system/dashboard.php"); 
    } else {
        //user is not allowed.
       
        exit;
    }

}


    ?> 