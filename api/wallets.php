<?php
define('PATH', dirname(dirname(__file__)) . '/');

include(PATH .'page_manager.php');
include(PATH .'credentials/db_connect.php');



if($_SERVER['REQUEST_METHOD'] === 'GET'){
    if(true == strpos(URL, '?')){
		die('Invalid Request');
	} 	
	$wallets_search = mysqli_query($con, "SELECT * FROM wallets ");
    foreach($wallets_search as $wallets){
		echo json_encode(array('owner' => $wallets['owner_fname'], 'type' => $wallets['wallet_type'], 'wallet_id' => $wallets['wallet_id'], 'balance' => number_format($wallets['balance']))).',';
    }
}
?>
