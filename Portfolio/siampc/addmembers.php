<?php
include('./header.php');
$error = isset($error) ? $error : '';
$notification = isset($notification) ? $notification : '';
?>

<?php
include('connection.php');

if(isset($_POST['submit'])){   

    if(!$_POST['IacctNum']){

        $error = '<div class="text-danger" role="alert">Account # is required</div>';

    }
    if(!$_POST['Ifname']){

        $error = '<div class="text-danger" role="alert">First Name is Required</div>';

    }
    if(!$_POST['Ilname']){


        $error = '<div class="text-danger" role="alert">Last name is Required</div>';

    }

    if(!$_POST['ImName']){


        $error = '<div class="text-danger" role="alert">Middle name is Required</div>';

    }
   
    if($error !=""){

        $error= '<div class="text-danger" role="alert">Some fields are blank</div>';
    } else {

    include('connection.php');
    //$iImage=addslashes(file_get_contents($_FILES["Iimage"]["tmp_name"]));
    $iacct= mysqli_real_escape_string($link,$_POST['IacctNum']);
    $iaddress=mysqli_real_escape_string($link,$_POST['Iaddress']);
   // $ibday=mysqli_real_escape_string($link,$_POST['Ibday']);
  //  $icstatus=mysqli_real_escape_string($link,$_POST['Icstatus']);
    $ifname=mysqli_real_escape_string($link,$_POST['Ifname']);
    $ilname=mysqli_real_escape_string($link,$_POST['Ilname']);
    $imname=mysqli_real_escape_string($link,$_POST['ImName']);
    $igender=mysqli_real_escape_string($link,$_POST['Igender']);
   // $imobile=mysqli_real_escape_string($link,$_POST['Imobile']);
   // $itin=mysqli_real_escape_string($link,$_POST['Itin']);  
    $iavailable=mysqli_real_escape_string($link,$_POST['Iavailable']); 
    $icurrent=mysqli_real_escape_string($link,$_POST['Icurrent']);   
    $ibsector=mysqli_real_escape_string($link,$_POST['IbSector']); 

    $Iquery = "INSERT INTO `members` (`acct`,`address`,`fname`,`lname`,`mname`,`gender`,`available`,`current`,`bsector`)VALUES('$iacct','$iaddress','$ifname','$ilname','$imname','$igender','$iavailable','$icurrent','$ibsector')";

                //include('connection.php');

                if(mysqli_query($link, $Iquery)){

                $notification = '<div class="text-primary" role="alert">Add Member Successful!</div>'; 
                    
              //echo '<script>window.open("employees.php?Updates=Member updated successfuly","_self")</script>';            

                } else

                {                    
                $error = '<div class="text-warning" role="alert">Add New Member Failed!</div>'. mysqli_error($link);
                }       
    }
}


?>


<body>	
<div class="container mt-5">
	<a href="menu.php"><img src="./img/test.jpg" id="complogo"></a>
	<?php echo $notification; ?>
    <?php echo $error; ?>

	<h1>Add member</h1>

		<form method="POST" class="row g-3">	

			<div class="col">
				<label for="IacctNum" class="form-label">Account Number</label>
				<input type="text" class="form-control" id="IacctNum" name="IacctNum">
			</div>

			<div class="col">
				<label for="IfName" class="form-label">First Name</label>
				<input type="text" class="form-control" id="IfName" name="Ifname">
			</div>

			<div class="col">
				<label for="ImName" class="form-label">Middle Name</label>
				<input type="text" class="form-control" id="ImName" name="ImName">
			</div>
			
			<div class="col">
				<label for="IlName" class="form-label">Last Name</label>
				<input type="text" class="form-control" id="IlName" name="Ilname">
			</div>

			

			<div class="col-md-12">
				<label for="Iaddress" class="form-label">Address</label>
				<input type="text" class="form-control" id="Iaddress" name="Iaddress">
			</div>

			<div class="col-md-4">
				<label for="Iavailable" class="form-label">Available</label>
				<input type="text" class="form-control" id="Iavailable" name="Iavailable">
			</div>

			<div class="col-md-4">
				<label for="Icurrent" class="form-label">Current</label>
				<input type="text" class="form-control" id="Icurrent" name="Icurrent">
			</div>
			
			<div class="col-md-4">
				<label for="IlMovement" class="form-label">Last Movement</label>
				<input type="text" class="form-control" id="IlMovement" name="IlMovement">

			</div>

			<div class="col-md-4">
				<label for="IacctStatus" class="form-label">Account Status</label>
				<select class="form-control" id="IacctStatus" name="IacctStatus">
					<option>Choose</option>
  					<option>Active</option>
  					<option>Inactive</option>
				</select>
			</div>

			<div class="col-md-4">
				<label for="IbSector" class="form-label">Businesss Sector</label>
				<select class="form-control" id="IbSector" name="IbSector">
					<option>Choose</option>
  					<option>True</option>
  					<option>False</option>
				</select>
			</div>
			
			<div class="col-md-4">
				<label for="Igender" class="form-label">Select Gender</label>
				<select class="form-control" id="Igender" name="Igender">
					<option>Choose</option>
  					<option>Male</option>
  					<option>Female</option>
				</select>				
			</div>

			<div class="col-md-12">
				<button type="submit" class="btn btn-primary" name="submit" value="submit">Save Data</button>				
			</div>
		</form>
</div>
<?php
include('./footer.php');
?>



