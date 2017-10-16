<?php 

	$type = $_POST['type'];
	if( $type == "isLoggedin"){
		if( isset($_COOKIE["email"]) ){
			echo "loggedin";
		}else echo "notloggedin";
	}else if( $type == "logout" ){
		unset( $_COOKIE['email'] );
		echo "done";
	}
 ?>