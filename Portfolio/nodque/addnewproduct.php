<?php
include('./header.php');
$error = isset($error) ? $error : '';
$notification = isset($notification) ? $notification : '';
?>

<?php
include('connection.php');

if(isset($_POST['submit'])){ 
    if(!$_POST['Iproduct']){

        $error = '<div class="text-danger" role="alert">Product Name is Required</div>';

    }  

     if(!$_POST['Iproductbrand']){

        $error = '<div class="text-danger" role="alert">Product Brand is Required</div>';

    }
    if(!$_POST['iproductstock']){

        $error = '<div class="text-danger" role="alert">Product Description is Required</div>';

    }

  
    if(!$_POST['Iqtyon']){


        $error = '<div class="text-danger" role="alert">Quantity Item is Required</div>';

    }

	if ($error != "") {
			
		$error = "<p> There were errors during submission</p>". $error;
	} 

	else
	{
		$query = "SELECT * FROM `products` WHERE product = 
			'".mysqli_real_escape_string($link, $_POST['Iproduct'])."' LIMIT 1";
			
			$result = mysqli_query($link, $query);
			if(mysqli_num_rows($result) > 0){

				$error = "<p>That Product is already registered</p>";
			}
			else
			{
				include('connection.php');
    
					$iproductstock=mysqli_real_escape_string($link,$_POST['iproductstock']);  
					$iqtyon=mysqli_real_escape_string($link,$_POST['Iqtyon']);
					$iproductname=mysqli_real_escape_string($link,$_POST['Iproduct']);
					$iproductbrand=mysqli_real_escape_string($link,$_POST['Iproductbrand']);
					$Iquery = "INSERT INTO `products` (`product`,`brand`,`stock`,`price`)
								VALUES('$iproductname','$iproductbrand','$iproductstock','$iqtyon')";

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
}
?>


<body>	

  <div class="d-flex" id="wrapper">
    <!-- Sidebar-->
    <div class="border-end bg-white" id="sidebar-wrapper">
      <div class="sidebar-heading border-bottom bg-light">5N Plainfield Marketing</div>
        <div class="list-group list-group-flush">
            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="products.php">Products</a>
            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="scan.php">Scan</a>
            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="receiving.php">Receiving</a>
            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="outgoing.php">Outgoing</a>
            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="damages.php">Damages</a>
            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="bo.php">BO</a>
            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="returns.php">Returns</a>
			<a class="list-group-item list-group-item-action list-group-item-light p-3" href="addnewproduct.php">Add Product</a>
        </div>
    </div>
	<div id="page-content-wrapper">
                <!-- Top navigation-->
                <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                    <div class="container-fluid">
                        <button class="btn btn-outline-primary" id="sidebarToggle">Toggle Menu</button>
                      </div>
                </nav>
    <div id="page-content-wrapper">
        <!-- Top navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
          <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                <li class="nav-item"><a class="nav-link" href="index.php?logout=1.php">Log Out</a></li>
                
                </li>
              </ul>
            </div>
          </div>
        </nav>
<div class="container mt-5">

	<div class="row">

		<div class="col-md-4">
				
		</div>

		<div class="col-md-4">
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
				<label for="Iproduct" class="form-label">Product Name</label>
				<input type="text" class="form-control" id="Iproduct" name="Iproduct">
			</div>

			<div class="col-md-4">
				
			</div>		
			</div>	

			<div class="row">

			<div class="col-md-4">
				
			</div>

	

			<div class="col-md-4">
				<label for="Iproductbrand" class="form-label">Product Brand</label>
				<input class="form-control" id="Iproductbrand" name="Iproductbrand">
			</div>

			<div class="col-md-4">
				
			</div>		
			</div>



			<div class="row g-3">

				<div class="col-md-4">
					
				</div>	

				<div class="col-md-4">
					<label for="iproductstock" class="form-label">Item Description</label>
					<input type="text" class="form-control" id="iproductstock" name="iproductstock">
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
				<a class="btn btn-primary" href="products.php" role="button">Return to Products</a>
			</div>

			</div>

		</form>
</div>
<?php
include('./footer.php');
?>



