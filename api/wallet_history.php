<?php
define('PATH', dirname(dirname(__file__)) . '/');

include(PATH .'page_manager.php');
include(PATH .'credentials/db_connect.php');


if(strlen(URL) > 60){
	die('Invalid Request');
}


if($_SERVER['REQUEST_METHOD'] === 'GET' && true == strpos(URL, 'walletID') && !empty($_REQUEST["walletID"])) {
	$Id = trim(htmlentities($_REQUEST["walletID"]));
	$Id = htmlspecialchars($_REQUEST["walletID"]);
	$Id = mysqli_real_escape_string($con, $_REQUEST["walletID"]); 
	
	if(!preg_match("/^[A-Za-z0-9]+$/",$Id)){
		die('bad request');		
    }
		
    $transaction_search = mysqli_query($con, "SELECT * FROM transactions WHERE wallet_id  = '".$Id."'");
	$Transaction = mysqli_fetch_array($transaction_search);

    if(empty($Transaction)){
		die('Invalid Request');	
    }
	else{
		echo json_encode(array(
		'first_name' => $Transaction['owner_fname'], 
		'first_name' => $Transaction['owner_fname'], 
		'last_name' => $Transaction['owner_lname'],
		'wallet_type' => $Transaction['wallet_type'], 
		'amount' => $Transaction['amount'], 
		'type' => $Transaction['transaction_type'], 
		'date' => $Transaction['transaction_date'], 
		'time' => $Transaction['transaction_time'], 
		'status' => $Transaction['status']
		));
    }

	
}else{
	die('Invalid Request');	
}
?>	 
