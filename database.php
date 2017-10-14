<?php

	include "setting.php";


	// Create connection
	$conn = new mysqli($server_name, $username, $password);

	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 
	

	function createDatabaseAndTables(){
		/* Create Database */
		mysqli_query($conn, "CREATE DATABASE IF NOT EXISTS ".$database_name.";");
		
		/* Select Database */
		mysqli_select_db($conn, $database_name);

		/* Get Tables */
		$tables = mysqli_query($conn,"SHOW TABLES;");
		$rows = mysqli_fetch_array($tables,MYSQLI_NUM);
		
		/* Create table users */
		mysqli_query($conn,"CREATE TABLE users ( 
			user_id int PRIMARY KEY NOT null AUTO_INCREMENT,
    		email varchar(255) NOT null,
    		password varchar(255) NOT null 
    	)");
	}
	function insertUser($email, $password){
		mysqli_query($conn, "INSERT INTO 'users' VALUES (,".$email.",".$password.")");
	}

	createDatabaseAndTables();
?>