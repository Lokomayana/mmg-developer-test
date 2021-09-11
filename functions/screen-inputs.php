<?php

function no_Input($data){
	if(empty($data)){
		return true;
	}
}

function wrong_Alpha_NoSpace_Input($Alnsdata){
	if(!preg_match("/^[a-zA-Z]+$/",$Alnsdata)){
		return true;
	}
}

function wrong_Alpha_Space_Input($Asdata){
	if(!preg_match("/^[a-zA-Z ]+$/",$Asdata)){
		return true;
	}
}

function wrong_Num_Input($Numdata){
	if(!preg_match("/^[0-9]+$/",$Numdata)){
		return true;
	}
}	

function wrong_AlphaNumeric_NoSpace_Input($Alnsdata){
	if(!preg_match("/^[a-zA-Z0-9]+$/",$Alnsdata)){
		return true;
	}
}

function wrong_AlphaNumeric_Space_Input($Asdata){
	if(!preg_match("/^[a-zA-Z0-9 ]+$/",$Asdata)){
		return true;
	}
}

function wrong_AlphaNumericSpecialChar_Space_Input($data){
	if(!preg_match("/^[a-zA-Z0-9@,. ]+$/",$data)){
		return true;
	}
}

function wrong_AlphaNumericSpecialChar_NoSpace_Input($data){
	if(!preg_match("/^[a-zA-Z0-9@,.]+$/",$data)){
		return true;
	}
}

function wrong_Addr($data){
	if(!preg_match("/^[a-zA-Z0-9@,. ]+$/",$data)){
		return true;
	}
}


function wrong_Password_Secial_Char_Input($Passdata){
	if(!preg_match("/^[a-zA-Z0-9]+$/",$Passdata)){
		return true;
	}
}


function wrong_Email_Input($Emaildata){
	if(!filter_var($Emaildata,FILTER_VALIDATE_EMAIL)){
		return true;
	}
}

function no_Com_Extention($Emaildata){
	if(false == strpos($Emaildata,'com')){
		return true;
	}
}

function data_length_More_Than($Excessdata,$Emorelength){
	if(strlen($Excessdata) > $Emorelength){
		return true;
	}
}

function data_Length_Less_Than($data,$required_length){
	if(strlen($data) < $required_length){
		return true;
	}
}

function password_Not_Verified($data1,$data2){
	if(!password_verify($data1,$data2)){
		return true;
	}
}


function encrypt_data($data){
	$Gateway = ['cost'=>11,'salt'=> mcrypt_create_iv(22,MCRYPT_DEV_URANDOM),];
    return password_hash($data,PASSWORD_BCRYPT,$Gateway);
}
?>
