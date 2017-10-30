<?php 

// ALLOW THE CONFIG 
define('__CONFIG__',TRUE);

//FEQUIRE THE CONFIG
require_once "../inc/config.php"; 


if($_SERVER['REQUEST_METHOD'] == 'POST') {
  
    header('Content-Type: application/json');

    $return = [];

    //make sure the user does not exist.$_COOKIE

    //make sure user can be added and is added

    //return the proper information back to javascript to redirect us.$_COOKIE

    $return['redirect'] = '/dashboard.php';

    $return['name'] = "James Swinburne";

      echo json_encode($return, JSON_PRETTY_PRINT); exit;

} else {
    //DIE. Kill the script. Redirect the user. Do something regardless. 
    exit('test');
   

}

?>