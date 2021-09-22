<?php
require 'session.php';
include('db.php');
if($connection_status){
	$username = $_POST['username'];
	$password = $_POST['password'];
	$sql = "SELECT * FROM customer WHERE C_Email='".$username."' OR C_Username='".$username."'";
	$result = $mysqli->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$C_ID=$row["C_ID"];
			$C_Email=$row["C_Email"];
			$C_Username=$row["C_Username"];
			$C_Password=$row["C_Password"];
		}
		if($username == $C_Email || $username == $C_Username){
			 if($password==$C_Password){
				$_SESSION['customer']['C_ID'] = $C_ID;
				$st = array("status"=>1,"msg"=>"Login success");
			 }else{
				 $st = array("status"=>0,"msg"=>"Password Not Valid");
			 }
		}else{
			$st = array("status"=>0,"msg"=>"Username or E-mail Not Valid");
		}
	}else{
		$st = array("status"=>0,"msg"=>"Username or E-mail Not Valid");
	}
}else{
	$st = array("status"=>0,"msg"=>$mysqli -> connect_error);
}
echo json_encode($st);
?>