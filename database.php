<?php

	include "setting.php";

	class Database{

		private $conn;
		private $server_name;
		private $username;
		private $password;
		private $database_name;
		private $setting;

		public function __construct(){
			$setting = new Settings;
			$server_name = $setting->server_name;
			$username = $setting->username;
			$password = $setting->password;
			$database_name = $setting->database_name;
			// Create connection
			$conn = new mysqli($server_name, $username, $password);
			// Check connection
			if ($conn->connect_error) {
			    die("Connection failed: " . $conn->connect_error);
			} 
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
		public function insertUser($email, $password){
			mysqli_query($conn, "INSERT INTO 'users' VALUES (,".$email.",".$password.")");
		}
	}
?>