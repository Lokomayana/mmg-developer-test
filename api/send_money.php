<?php 
define('PATH', dirname(dirname(__file__)) . '/');

include(PATH .'page_manager.php');
include(PATH .'credentials/db_connect.php');

include_once(PATH . 'functions/screen-inputs.php');
include_once(PATH . 'functions/display-form-messages.php');

$error = false; $new_sender_wallet_Balance = 0; $new_receiver_wallet_Balance = 0; $Transaction_id = "";

		
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $Sender_wallet = mysqli_real_escape_string($con, $_POST['sender_wallet']);
	$Receiver_wallet = mysqli_real_escape_string($con, $_POST['receiver_wallet']);
	$Amount = mysqli_real_escape_string($con, $_POST['amount']);
	$Pin = mysqli_real_escape_string($con, $_POST['tPin']);
	$Transaction_date = date('d M Y');
	$Transaction_time = date('h:i:a');
	    
    $Rand_chars = rand(1111111, 9999999);
	$Transaction_id = 'TRS'.$Rand_chars; 
	
	
	// Engrypted transaction pin of user using the ARGON encryption algorithm
	$rowpin = '$2y$11$1GD2nAtyw/Yi8fOccxY64ejdOWfQWynEj.z8Fqk/CExt/KZAkWvY.';

	
		
	
    // Get sender's wallet details
    $sender_wallet_balance_search = mysqli_query($con, "SELECT * FROM wallets WHERE wallet_id = '".$Sender_wallet."'");
    $sender_wallet_balance = mysqli_fetch_array($sender_wallet_balance_search);		
    
	
    // Get receipient's wallet details
    $receiver_wallet_balance_search = mysqli_query($con, "SELECT * FROM wallets WHERE wallet_id = '".$Receiver_wallet."'");
    $receiver_wallet_balance = mysqli_fetch_array($receiver_wallet_balance_search);		
    
	

	
		
if(no_Input($Amount)){
	$error = true;
	err_Msg("Please enter the correct amount you wish to transfer!");
}	


elseif(wrong_Num_Input($Amount)){
	$error = true;
	err_Msg("Amount should be given in numbers only. No space, alphabet or special character is allowed in between.");
}	
	
// Minimum transfer amount	
if($Amount < 1000){
	$error = true;
	err_Msg("The minimum amount you can transfer is &#8358;1,000");
}	
	
	
// Check if sender has insufficient balance in wallet	
if($Amount > $sender_wallet_balance['balance']){
	$error = true;		
	err_Msg("You do not have sufficient balance to complete this transaction. Kindly fund your wallet or make payment with your debit card.");	 
}		
		
						
if(no_Input($Pin) || wrong_Num_Input($Pin)){
     $error = true;
	 err_Msg("Enter your transaction pin");	 
}


// Checks if sender 6-digit transaction pin is correct to prevent unauthorized transfer	
if(password_Not_Verified($Pin, $rowpin)){
	$error = true;
	err_Msg("You have entered an incorrect pin. Kindly note that your account will be suspended after 4 failed attempts.");
}		    
      
    

	
// If no error
if(!$error){
	// Update sender's wallet balance
	$new_sender_wallet_Balance = $sender_wallet_balance['balance'] - $Amount;
	mysqli_query($con, "UPDATE wallets SET balance = '".$new_sender_wallet_Balance."' WHERE wallet_id = '".$Sender_wallet."'");
	
	// Update receipient's wallet balance
	$new_receiver_wallet_Balance = $receiver_wallet_balance['balance'] + $Amount;
	mysqli_query($con, "UPDATE wallets SET balance = '".$new_receiver_wallet_Balance."' WHERE wallet_id = '".$Receiver_wallet."'");
	
	
   // Insert into transactions table 
    
	 	   		  
  echo succ_Msg("You have successfully transfered the sum of <b>₦".number_format($Amount).". Your new wallet balance is <b>₦".number_format($new_sender_wallet_Balance)); 
  

}}

?>
