<?php 

//if there is no constant defined called __CONFIG__, do not loads this file
if(!defined('__CONFIG__')) {
    exit('You do not have a config file');
}

//sessions are always on

if(!isset($_SESSION)) {
    session_start();
}

// Our config is below 
error_reporting(-1);
ini_set('display_errors', 'On');

//INCLUDE DB FILE

	
	include_once "classes/DB.php";
    include_once "classes/Filter.php";
    require_once "functions.php";

$con = DB::getConnection();

?>