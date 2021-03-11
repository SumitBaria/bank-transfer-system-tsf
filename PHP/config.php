<?php

	$conn = mysqli_connect('remotemysql.com','oyjnDeuZIQ','1vADy0lQqY','oyjnDeuZIQ');

	if(!$conn){
		die("Could not connect to the database due to the following error --> ".mysqli_connect_error());
	}

?>