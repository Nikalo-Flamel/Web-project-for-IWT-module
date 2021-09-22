<?php
require('db.php');
if($connection_status){
	$C_Name = $_POST['name'];
	$C_Email  = $_POST['e-mail'];
	$C_Password  = $_POST['confirm_password'];
	$C_Username  = $_POST['username'];
	if(check_allready_have($C_Username,$C_Email)){
		$sql = "INSERT INTO customer (C_Name,C_Email,C_Password,C_Username)
	VALUES ('".$C_Name."','".$C_Email."','".$C_Password."','".$C_Username."')";
		if ($mysqli->query($sql) === TRUE) {
			$st = array("status"=>1,"msg"=>"Registered Successfully");
		} else {
			$st = array("status"=>0,"msg"=>$mysqli->error);
		}
		$mysqli->close();
	}else{
		$st = array("status"=>0,"msg"=>"E-mail OR User name already have");
	}
}else{
	$st = array("status"=>0,"msg"=>$mysqli -> connect_error);
}
echo json_encode($st);

function check_allready_have($C_Username,$C_Email){
	require('db.php');
	$sql = "SELECT * FROM customer WHERE C_Email='".$C_Email."' OR C_Username='".$C_Username."'";
	$result = $mysqli->query($sql);
	if ($result->num_rows > 0) { 
		return false;
	}else{
		return true;
	}
}

?>