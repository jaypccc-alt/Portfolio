<?php
include('./header.php');
$error = isset($error) ? $error : '';
$notification = isset($notification) ? $notification : '';
?>

<?php
			include('connection.php');

			if(isset($_POST['submit'])){ 
			    if(!$_POST['Isupplier']){

        $error = '<div class="text-danger" role="alert">Supplier Name is Required</div>';

    }  

    if(!$_POST['Icode']){

        $error = '<div class="text-danger" role="alert">Product Code # is Required</div>';

    }
     if(!$_POST['Iitemcategory']){

        $error = '<div class="text-danger" role="alert">Item Category is Required</div>';

    }
    if(!$_POST['Iitemdescription']){

        $error = '<div class="text-danger" role="alert">Item Description is Required</div>';

    }

    if(!$_POST['Iunitprice']){

        $error = '<div class="text-danger" role="alert">Unit Price is Required</div>';

    }
  

    if(!$_POST['Isellingprice']){


        $error = '<div class="text-danger" role="alert">Selling Price is Required</div>';

    }
    if(!$_POST['Iqtyon']){


        $error = '<div class="text-danger" role="alert">Quantity Item is Required</div>';

    }
    
   
    if($error !=""){

        $error= '<div class="text-danger" role="alert">Some fields are blank</div>';
    } else {

    include('connection.php');
    
    $icode= mysqli_real_escape_string($link,$_POST['Icode']);
    $iitemdescription=mysqli_real_escape_string($link,$_POST['Iitemdescription']);
    $iunitprice=mysqli_real_escape_string($link,$_POST['Iunitprice']);     
    $isellingprice=mysqli_real_escape_string($link,$_POST['Isellingprice']);
    $iqtyon=mysqli_real_escape_string($link,$_POST['Iqtyon']);
    $inotes=mysqli_real_escape_string($link,$_POST['Inotes']);
    $isupplier=mysqli_real_escape_string($link,$_POST['Isupplier']);
    $iitemcategory=mysqli_real_escape_string($link,$_POST['Iitemcategory']);
    $iamount= $iunitprice * $iqtyon;
    
    



    
    
    $Iquery = "INSERT INTO `inventory` (`supplier`,`code`,`itemcategory`,`itemdescription`,`unitprice`,`sellingprice`,`qtyon`,`amount`,`notes`)
    			VALUES('$isupplier','$icode','$iitemcategory','$iitemdescription','$iunitprice','$isellingprice','$iqtyon','$iamount','$inotes')";

                //include('connection.php');

                if(mysqli_query($link, $Iquery)){

                $notification = '<div class="text-primary" role="alert">Product Successfuly Added!</div>'; 
                    
              //echo '<script>window.open("employees.php?Updates=Member updated successfuly","_self")</script>';            

                } else

                {                    
                $error = '<div class="text-warning" role="alert">Failed to Add Product!</div>'. mysqli_error($link);
                }       
    }
	}


?>


<body>	
<div class="container mt-5">

	<div class="row">

		<div class="col-md-4">
				
		</div>

		<div class="col-md-4">
		<a href="menu.php"><img src="./img/test.jpg" id="complogo"></a>
		<?php echo $notification; ?>
	    <?php echo $error; ?>

		<h1 class="text-center">Add Product</h1>
		</div>

		<div class="col-md-4">
				
		</div>

	</div>

		<form method="POST">
		<div class="row">

			<div class="col-md-4">
				
			</div>

	

			<div class="col-md-4">
				<label for="Isupplier" class="form-label">Supplier</label>
				<input type="text" class="form-control" id="Isupplier" name="Isupplier">
			</div>

			<div class="col-md-4">
				
			</div>		
			</div>	

			<div class="row">

			<div class="col-md-4">
				
			</div>

	

			<div class="col-md-4">
				<label for="Icode" class="form-label">Code</label>
				<input type="text" class="form-control" id="Icode" name="Icode">
			</div>

			<div class="col-md-4">
				
			</div>		
			</div>
			<div class="row">

			<div class="col-md-4">
				
			</div>

	

			<div class="col-md-4">
				<label for="Iitemcategory" class="form-label">Item Category</label>
				<select class="form-control" id="Iitemcategory" name="Iitemcategory">
					<option value="" disabled="">*-Choose-*</option>
  					<option>Chemicals</option>
  					<option>Fertilizer</option>
  					<option>Rice</option>
  					<option>BY. Products</option>
  					<option>Palay Seeds</option>
  					<option>Palay</option>
  					<option>Others</option>
				</select>
			</div>

			<div class="col-md-4">
				
			</div>		
			</div>



			<div class="row g-3">

				<div class="col-md-4">
					
				</div>	

				<div class="col-md-4">
					<label for="Iitemdescription" class="form-label">Item Description</label>
					<input type="text" class="form-control" id="Iitemdescription" name="Iitemdescription">
				</div>

				<div class="col-md-4">
					
				</div>

			</div>

			

			<div class="row">
				<div class="col-md-4">
					
				</div>
			<div class="col-md-4">
				<label for="Iunitprice" class="form-label">Unit Price</label>
				<input type="text" class="form-control" id="Iunitprice" name="Iunitprice">
			</div>
			<div class="col-md-4">
					
				</div>
			</div>

			<div class="row">

				<div class="col-md-4">
					
				</div>

			<div class="col-md-4">
				<label for="Isellingprice" class="form-label">Selling Price</label>
				<input type="text" class="form-control" id="Isellingprice" name="Isellingprice">
			</div>

			<div class="col-md-4">
					
				</div>

			</div>

			<div class="row">

			<div class="col-md-4">
				
			</div>

			<div class="col-md-4">
				<label for="Iqtyon" class="form-label">Product Quantity</label>
				<input type="text" class="form-control" id="Iqtyon" name="Iqtyon">
			</div>

			<div class="col-md-4">
				
			</div>		
			</div>

			<div class="row">

				<div class="col-md-4">
					
				</div>


			<div class="col-md-4">
					
			</div>

			</div>

			

			<div class="row">

			<div class="col-md-4">
				
			</div>

			<div class="col-md-4">
				<label for="Inotes" class="form-label">Notes(Optional)</label>
				<input type="text" class="form-control" id="Inotes" name="Inotes">
			</div>

			<div class="col-md-4">
				
			</div>		
			</div>

			<div class="row">

				<div class="col-md-4">
					
				</div>


			<div class="col-md-4">
					
			</div>

			</div>

			<div class="row">

			<div class="col-md-4">
				
			</div>


			<div class="row g-4">

				<div class="col-md-4">
					
				</div>



			<div class="row">

			<div class="col-md-4">
					
			</div>

			<div class="col-md-4">
				<button style="margin-top: 5px;" type="submit" class="btn btn-primary" name="submit" value="submit">Save Data</button>		
				<a class="btn btn-primary" href="product.php" role="button">Return to Products</a>
			</div>

			</div>

		</form>
</div>
<?php
include('./footer.php');
?>



