<?php
define('PATH', dirname(dirname(__file__)) . '/');

include(PATH .'page_manager.php');
include(PATH .'credentials/db_connect.php');

 
if(strlen(URL) > 50){
	die('Invalid Request');
}

if($_SERVER['REQUEST_METHOD'] === 'GET' && true == strpos(URL, 'userID') && !empty($_REQUEST["userID"])) {
	$Id = trim(htmlentities($_REQUEST["userID"]));
	$Id = htmlspecialchars($_REQUEST["userID"]);
	$Id = mysqli_real_escape_string($con, $_REQUEST["userID"]); 
	
	if(!preg_match("/^[A-Za-z0-9]+$/",$Id)){
		die('bad request');		
    }
		
    $User_search = mysqli_query($con, "SELECT * FROM members WHERE uname  = '".$Id."'");
	$User = mysqli_fetch_array($User_search);

    if(empty($User)){
		die('Invalid Request');	
    }
	else{
		echo json_encode(array('first_name' => $User['fname'], 'middle_name' => $User['mname']));
    }

	
}else{
	die('Invalid Request');	
}
?>	 
