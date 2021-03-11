<?php

	$conn = mysqli_connect('remotemysql.com','an5XkSGi7t','MFkuLomlc3','BankSystem');

	if(!$conn){
		die("Could not connect to the database due to the following error --> ".mysqli_connect_error());
	}

?>