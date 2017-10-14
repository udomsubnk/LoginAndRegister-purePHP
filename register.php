<?php 
	
	include "database.php";

	$user_email = $_POST['email'];
	$user_password = md5($_POST['password']);
	
	$database = new Database;
	$database->insertUser($user_email, $user_password);
 ?>