<?php

defined("DB_HOST") ? null : define("DB_HOST", "localhost");
defined("DB_USER") ? null : define("DB_USER","root");
defined("DB_PASS") ? null : define("DB_PASS", "");
defined("DB_NAME") ? null : define("DB_NAME",  "IWT_test");

$con = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

//Checking the connection
if($con->connect_error){
    die("Connection failed: ". $con->connect_error);
}

session_start();

?>