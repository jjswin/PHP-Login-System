<?php 

// ALLOW THE CONFIG 
define('__CONFIG__',TRUE);

//FEQUIRE THE CONFIG
require_once "../inc/config.php"; 
// require_once "../inc/classes/Filter.php"; 


if($_SERVER['REQUEST_METHOD'] == 'POST') {
  
   // header('Content-Type: application/json');

    $return = [];

    $email = Filter::String( $_POST['email'] );

    //make sure the user does not exist

    $findUser = $con->prepare("SELECT user_id FROM users WHERE email = LOWER(:email) LIMIT 1");
  
    $findUser->bindParam(':email', $email, PDO::PARAM_STR);
    $findUser->execute();

    if($findUser->rowCount() == 1) {
        //USer Exists
        // we can also check to see if they able to log in
        $return['error'] = "You already have an account"; 
        $return['is_logged_in'] = false;
       } else {

            //user does not exiit, add them now,

            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

            $addUser = $con->prepare("INSERT INTO users(email, password) VALUES (LOWER(:email), :password)");
            $addUser -> bindParam(':email', $email, PDO::PARAM_STR);
            $addUser -> bindParam(':password', $password, PDO::PARAM_STR);
            $addUser -> execute();

            $user_id = $con->lastInsertId();

            $_SESSION['user_id'] = (int) $user_id;

            $return['redirect'] = '/dashboard.php?message=welcome';
            $return['is_logged_in'] = TRUE;
         
            


        
    }

    //make sure user can be added and is added

    //return the proper information back to javascript to redirect us.$_COOKIE



    
      echo json_encode($return, JSON_PRETTY_PRINT); exit;

} else {
    //DIE. Kill the script. Redirect the user. Do something regardless. 
    exit('Invalid URL');
   

}

?>