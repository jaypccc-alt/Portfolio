<?php
		$dbname = 'nodque';
		$dbusername = 'root';
		$hostname = 'localhost';
		$password = '';	



		$link = mysqli_connect("$hostname","$dbusername","$password","$dbname");		

		if(mysqli_connect_error()){

      	die('Database Connect Error: ' . $link->connect_error);

   		 }


?>

