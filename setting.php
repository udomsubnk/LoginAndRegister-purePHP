<?php 
	
	class Setting{		
		public static $db_server = "localhost";
		public static $db_username = "root";
		public static $db_password = "";
		public static $db_name = "Bank";
	}

	class Error{
		public static $error = array(
			'0' => "success",
			'1' => "Database Error !",
			'2' => "Email is Exists !",
			'3' => "Wrong email or password !"
		);
	}

 ?>