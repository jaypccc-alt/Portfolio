<?php

	include('header.php');
	$error = isset($error) ? $error : '';
	$notification = isset($notification) ? $notification : '';
	?>

	<?php

	session_start();	

	$error = "";

	if(array_key_exists("logout", $_GET))

	{ //This is what happens after pressing logout
		unset($_SESSION['id']);
		setcookie("id", "", time() - 60*60);
		$_COOKIE["id"] = "";
	} 

	else if(array_key_exists("id", $_SESSION) OR array_key_exists("id", $_COOKIE))

	{ //If there is an existing session forward it here
		header("Location: menu.php");
	}	

	if(array_key_exists("submit", $_POST))

	{

		include('connection.php');

		if (mysqli_connect_error())

		{

		die("Database connect error");

		}

		// field validation
		if(!$_POST['email']){

			$error = "<p>Email is required</p>";

		}

		if(!$_POST['password']){

			$error = "<p>Password is required</p>";
		} 

		if ($error != "") {
			
			$error = "<p> There were errors during submission</p>". $error;
		} 

		else //if no errors during submission perform this

		{ // Check if there is a match of email on the DB, if there is a match perform this

			if($_POST['registered'] == '1' ){

			$query = "SELECT id FROM `users` WHERE email = 
			'".mysqli_real_escape_string($link, $_POST['email'])."' LIMIT 1";
			
			$result = mysqli_query($link, $query);

			if(mysqli_num_rows($result) > 0){

				$error = "<p>That email address is already registered</p>";
			} 

			else

			{ // if email has no match on the DB insert the email and password

				$query = "INSERT INTO `users` (`email`, `password`) 
				VALUES ('".mysqli_real_escape_string($link,$_POST['email'])."',
				'".mysqli_real_escape_string($link,$_POST['password'])."')";
			
			if(!mysqli_query($link, $query)){ 
				// for whatever reason if query fails to insert do this

				$error = "<p>Cannot register try again later</p>";
				
			} 

			else

			 {

				$query = "UPDATE `users` SET password = '".md5(md5(mysqli_insert_id($link)).$_POST['password'])."' WHERE id = ".mysqli_insert_id($link)." LIMIT 1";

				mysqli_query($link, $query);


				$_SESSION['id'] = mysqli_insert_id($link);

				if($_POST['stayLoggedIn'] == '1'){

					setcookie("id", mysqli_insert_id($link), time() + 60*60*24);
				}

				header("location: testaddmemberpage.php");

			} 

			}

			}else {

					$query = "SELECT * FROM `users` WHERE email = 
					'".mysqli_real_escape_string($link, $_POST['email'])."'";

					$result = mysqli_query($link, $query);

					$row = mysqli_fetch_array($result);

					if(isset($row)){						

						$hashedPassword = md5(md5($row['id']).$_POST['password']);

						if($hashedPassword == $row['password']){

							$_SESSION['id'] = $row['id'];

							if($_POST['stayLoggedIn'] == '1'){

							setcookie("id", $row['id'], time() + 60*60*24);	

								}

									header("location: testaddmemberpage.php");

								} else{

									$error = "Email and Password is incorrect";
									
								}

					} else {

						$error = "Email and Password is incorrect";						

					}
				}
			}
		}
	?>

<div class="registercontainer container">


	<div>
		<img src="./img/test.jpg" id="complogo">
		<h2><strong>Please register or login</strong></h2>
		
		<div id="error" style="color: red;"><?php echo $error; ?></div>

	<form method="POST" id="registerForm">		

		<div class="form-group">			
				<input type="email" class="form-control" name="email" id="inputEmail" placeholder="Enter email">
		</div>
		


		<div class="form-group">				
			<input type="password" class="form-control" id="inputPassword" name="password" placeholder="Enter password">
		</div>

		<div class="form-group form-check">			
			<input type="checkbox" class="form-check-input" id="tickBox" name="stayLoggedIn" value=1>
			<label class="form-check-label" for="tickBox"><i>Stay logged in for 24 hours</i></label>
		</div>

		<div class="form-group">
			<input type="hidden" name="registered" value="1"> 
		</div>

		<div >
		<input class="btn btn-primary" type="submit" name="submit" value="Register">		
		</div>

		<p><a class="toggleForms">Login</a></p>

	</form>
	</div>

	

	<div>		
	<form method="POST" id="loginForm">		

		<div class="form-group">			
			<input type="email" name="email" class="form-control" id="inputEmail2" placeholder="E-Mail" >
		</div>


		<div class="form-group">			
			<input  type="password" class="form-control" name="password" id="inputPassword2" placeholder="Password">
		</div>

		<div class="form-group form-check">			
			<input  type="checkbox" class="form-check-input" id="tickBox2" name="stayLoggedIn" value=1>
			<label class="form-check-label" for="tickBox2"><i>Stay logged in for 24 hours</i></label>
		</div>

		<div class="form-group">
			<input type="hidden" name="registered" value="0">

		</div>

		<div class="form-group">
		<input type="submit" class="btn btn-primary" name="submit" value="Login">		
		</div>

		<p><a class="toggleForms">Register</a></p>

	</form>
	</div>

	</div>

	<script type="text/javascript">		
		
		$(".toggleForms").click(function(){

			$("#registerForm").toggle();
			$("#loginForm").toggle();

		});
	</script>

<?php
include('footer.php');
?>

