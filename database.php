<?php

	require_once('setting.php');

	class Database{
		private $setting;
		private $conn;

		private $db_server;
		private $db_username;
		private $db_password;
		private $db_name;

		public function __construct(){
			$setting = new Setting();
			$this->db_server = $setting->db_server;
			$this->db_username = $setting->db_username;
			$this->db_password = $setting->db_password;
			$this->db_name = $setting->db_name;


			// Create connection
			$this->conn = new mysqli($this->db_server, $this->db_username, $this->db_password);
			// Check connection
			if ($this->conn->connect_error) {
			    die("Connection failed: " . $conn->connect_error);
			} 
			/* Create Database */
			mysqli_query($this->conn, "CREATE DATABASE IF NOT EXISTS ".$this->db_name.";");
			
			/* Select Database */
			mysqli_select_db($this->conn, $this->db_name);

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
		public function insertUser($user_email, $user_password){
			mysqli_query($this->conn, "INSERT INTO 'users' VALUES ( '', '$user_email','$user_password')");
		}
	}
?>