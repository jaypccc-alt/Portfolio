<?php
		$dbname = 'test1';
		//$dbusername = 'geanyuku_siampcadmin';
		$dbusername = 'root';
		//$dbusername = 'testuser';
		//$hostname = '192.168.0.141';
		$hostname = 'localhost';
		//$password = 'ESCbTxvkJfqh@v5';
		$password = '';



		$link = mysqli_connect("$hostname","$dbusername","$password","$dbname");		

		if(mysqli_connect_error()){

      	die('Database Connect Error: ' . $link->connect_error);

   		 } 

?>

