<?php 

//if there is no constant defined called __CONFIG__, do not loads this file
if(!defined('__CONFIG__')) {
    exit('You do not have a config file');
}

// Our config is below 
error_reporting(-1);
ini_set('display_errors', 'On');

//INCLUDE DB FILE

	
	include_once "classes/DB.php";
	include_once "classes/Filter.php";

$con = DB::getConnection();

?>