<? 

//if there is no constant defined called __CONFIG__, do not loads this file
if(!defined('__CONFIG__')) {
    exit('You do not have a config file');
}

// Our config is below 

//INCLUDE DB FILE

include_once "classes/DB.php";


$con = DB::getConnection();

?>