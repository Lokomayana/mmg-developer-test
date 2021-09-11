<?php
define('PATH', dirname(dirname(__file__)) . '/');

include(PATH .'page_manager.php');
include(PATH .'credentials/db_connect.php');



if($_SERVER['REQUEST_METHOD'] === 'GET'){
	$URL = 	htmlspecialchars($_SERVER['REQUEST_URI']);
    if(true == strpos($URL, '?')){
		die('Invalid Request');
	} 
	
	$Total_balance = 0;
	
	$user_search = mysqli_query($con, "SELECT * FROM members");
	
	$wallets_search = mysqli_query($con, "SELECT * FROM wallets");
	
	$transactions_search = mysqli_query($con, "SELECT * FROM transactions");
		
    $Total_users = mysqli_num_rows($user_search);
	$Total_wallets = mysqli_num_rows($wallets_search);
	$Total_transactions = mysqli_num_rows($transactions_search);
	
	while($wallet_detail = mysqli_fetch_array($wallets_search)){
	$Total_balance += $wallet_detail["balance"]; 
    }
	
	echo json_encode(array('total_users' => number_format($Total_users), 'total_wallets' => number_format($Total_wallets), 'wallet_balance' => number_format($Total_balance), 'total_transactions' => number_format($Total_transactions)));
    
}


?>
