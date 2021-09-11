<?php
define('PATH', dirname(dirname(__file__)) . '/');

include(PATH .'page_manager.php');
include(PATH .'credentials/db_connect.php');



if($_SERVER['REQUEST_METHOD'] === 'GET'){
    if(true == strpos(URL, '?')){
		die('Invalid request');
	} 
	
	
	$users_search = mysqli_query($con, "SELECT * FROM members ");
    foreach($users_search as $users){
		echo json_encode(array('first_name' => $users['mname'], 'middle_name' => $users['mname'])).',';
    }
}
?>
