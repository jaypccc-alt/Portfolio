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
    if(!$_POST['Iproductdescription']){

        $error = '<div class="text-danger" role="alert">Product Description is Required</div>';

    }

  
    if(!$_POST['Iqtyon']){


        $error = '<div class="text-danger" role="alert">Quantity Item is Required</div>';

    }
    
   
    if($error !=""){

        $error= '<div class="text-danger" role="alert">Some fields are blank</div>';
    } else {

    include('connection.php');
    
    $iproductdescription=mysqli_real_escape_string($link,$_POST['Iproductdescription']);  
    $iqtyon=mysqli_real_escape_string($link,$_POST['Iqtyon']);
    $iproductname=mysqli_real_escape_string($link,$_POST['Iproduct']);
    $iproductbrand=mysqli_real_escape_string($link,$_POST['Iproductbrand']);

    
    
    $Iquery = "INSERT INTO `inventory` (`productname`,`productbrand`,`productdescription`,`stock`)
    			VALUES('$iproductname','$iproductbrand','$iproductdescription','$iqtyon')";

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
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="addinventory.php">Add Inventory</a>
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
    </div>
	<section class="vh-100 bg-image">
		<div class="mask d-flex align-items-center h-100 gradient-custom-3">
			<div class="container h-100">
				<div class="row d-flex justify-content-center align-items-center h-100">
					<div class="col-12 col-md-9 col-lg-7 col-xl-6">
						<div class="card" style="border-radius: 15px;">
								<div class="card-body p-5">
									<h2 class="text-uppercase text-center mb-5">Add Inventory</h2>

								<form method="POST">
									<div class="form-outline mb-4">
										<label class="form-label" for="Iproduct">Product Name</label>
									<input type="text" id="Iproduct" name="Iproduct" class="form-control form-control-lg" />
									</div>

									<div class="form-outline mb-4">
										<label class="form-label" for="Iproductbrand">Product Brand</label>
									<input type="text" id="Iproductbrand" name="Iproductbrand" class="form-control form-control-lg" />
									</div>

									<div class="form-outline mb-4">
										<label class="form-label" for="Iproductbrand">Product Description</label>
									<input type="text" id="Iproductdescription" name="Iproductdescription" class="form-control form-control-lg" />
									</div>

									<div class="form-outline mb-4">
										<label class="form-label" for="Iqtyon">Stock</label>
									<input type="text" id="Iqtyon" name="Iqtyon" class="form-control form-control-lg" />
									</div> 

									<div class="d-flex justify-content-center">
										<button type="submit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body" name="submit" value="submit" >Submit</button>
										</div>
										<div class="d-flex justify-content-center">
										<a href="inventory.php" class="btn btn-light btn-lg active" role="button" aria-pressed="true">Go To Inventory</a>
									</div>

								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php 
include('./footer.php');
?>



