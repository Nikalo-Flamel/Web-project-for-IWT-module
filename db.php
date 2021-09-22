<?php
$mysqli = new mysqli("localhost","root","","iwt_test");
// Check connection
$connection_status = 0;
if ($mysqli ->connect_errno) {
	$connection_status = 0;
	exit();
}else{
	$connection_status = 1;
}
?>