<?php

	require_once('setting.php');

	class Database{
		private $conn;

		private $db_server;
		private $db_username;
		private $db_password;
		private $db_name;

		public function __construct(){
			$this->db_server = Setting::$db_server;
			$this->db_username = Setting::$db_username;
			$this->db_password = Setting::$db_password;
			$this->db_name = Setting::$db_name;

			$this->connectToDB();
			$this->createDB();
			$this->createUsersTable();
		}
		private function connectToDB(){
			// Create connection
			$this->conn = new mysqli($this->db_server, $this->db_username, $this->db_password);
			// Check connection
			if ($this->conn->connect_error) {
			    die("Connection failed: " . $conn->connect_error);
			} 
		}
		private function createDB(){
			/* Create Database */
			mysqli_query($this->conn, "CREATE DATABASE IF NOT EXISTS ".$this->db_name.";");
			/* Select Database */
			mysqli_select_db($this->conn, $this->db_name);
		}

		private function createUsersTable(){
			/* Get Tables */
			$tables = mysqli_query($this->conn,"SHOW TABLES;");
			$rows = mysqli_fetch_array($tables,MYSQLI_NUM);
			/* Create table users */
			mysqli_query($this->conn, "CREATE TABLE users ( 
				user_id int PRIMARY KEY NOT null AUTO_INCREMENT,
	    		email varchar(255) NOT null,
	    		password varchar(255) NOT null 
	    	)");
		}

		private function isHasEmail($user_email){
			$rows = mysqli_query($this->conn, "SELECT * FROM `users` WHERE email='$user_email'");
			$result = mysqli_fetch_array($rows,MYSQLI_NUM);
			if( empty($result) ){
				return false;
			}else return true;
			
		}

		public function insertUser($user_email, $user_password){
			if( !$this->isHasEmail($user_email) ){
				$result = mysqli_query($this->conn, "INSERT INTO `users` VALUES ( '', '$user_email','$user_password')");
				if($result == 1) return true;
				else return false;
			}else return "Email";
		}
	}
?>