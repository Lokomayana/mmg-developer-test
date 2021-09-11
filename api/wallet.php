<?php
define('PATH', dirname(dirname(__file__)) . '/');

include(PATH .'page_manager.php');
include(PATH .'credentials/db_connect.php');



if(strlen(URL) > 50){
	die('Invalid Request');
}

if($_SERVER['REQUEST_METHOD'] === 'GET' && true == strpos(URL, 'walletID') && !empty($_REQUEST["walletID"])) {
	$Id = trim(htmlentities($_REQUEST["walletID"]));
	$Id = htmlspecialchars($_REQUEST["walletID"]);
	$Id = mysqli_real_escape_string($con, $_REQUEST["walletID"]); 
	
	if(!preg_match("/^[A-Za-z0-9]+$/",$Id)){
		die('bad request');		
    }
		
    $wallet_search = mysqli_query($con, "SELECT * FROM wallets WHERE wallet_id  = '".$Id."'");
	$Wallet = mysqli_fetch_array($wallet_search);

    if(empty($Wallet)){
		die('Invalid Request');	
    }
	else{
		echo json_encode(array(
		'first_name' => $Wallet['owner_fname'], 
		'last_name' => $Wallet['owner_lname'], 'wallet_id' => $Wallet['wallet_id'], 
		'wallet_type' => $Wallet['wallet_type'], 
		'balance' => $Wallet['balance'], 
		'annual_rate' => $Wallet['annual_rate'], 
		'August_earnings' => $Wallet['Aug_interest'], 
		'September_earnings' => $Wallet['Sep_interest'], 
		'status' => $Wallet['status']
		));
    }

	
}else{
	die('Invalid Request');	
}
?>	 
