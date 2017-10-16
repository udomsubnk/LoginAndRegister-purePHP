<?php 

	$type = $_POST['type'];
	if( $type == "isLoggedin"){
		if( isset($_COOKIE["email"]) ){
			echo "loggedin";
		}else echo "notloggedin";
	}else if( $type == "logout" ){
		setcookie ("email", null, time() - (3600*24));//unset cookie
		echo "done";
	}
 ?>