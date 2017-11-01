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
    $password = ($_POST['password'] );

    //make sure the user does not exist

    $findUser = $con->prepare("SELECT user_id, password FROM users WHERE email = LOWER(:email) LIMIT 1"); 
    $findUser->bindParam(':email', $email, PDO::PARAM_STR);
    $findUser->execute();

    if($findUser->rowCount() == 1) {
        //USer Exists -- try and sign them in
        //Check to see they can login
        $User = $findUser->fetch(PDO::FETCH_ASSOC);
        
        $user_id = (int) $User['user_id'];
        $hash = (string) $User['password'];
        
        if(password_verify($password, $hash)) {
                //user is signed in
                $return['redirect'] = 'php_login_system/dashboard.php';
                $_SESSION['user_id'] = $user_id;
                
        } else {
        //invalid user/email password combo
            $return['error']= "Invalid user email password combo";
    }


        if(!$_SESSION['user_id'] = $user_id) { exit(); } else {
        $return['error'] = "You already have an account"; }
 
       } else {

        $return['error'] = "You do not have an account. <a href='php_login_system/register.php'>Create one now?</a>";
            //user does not exiit, they need to create an account
        
    } 

    echo json_encode($return, JSON_PRETTY_PRINT); exit;
//END IF SERVER REQUEST METHOD = POST
} else {

    //make sure user can be added and is added

    //return the proper information back to javascript to redirect us.$_COOKIE



    
     

    //DIE. Kill the script. Redirect the user. Do something regardless. 
    exit('Invalid URL'); }
   



?>