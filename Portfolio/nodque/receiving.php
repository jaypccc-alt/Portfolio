<?php
include('header.php');

session_start();



if(array_key_exists("id", $_COOKIE)) {

    $_SESSION['id'] = $_COOKIE['id'];
}

include('connection.php');
$sql = "SELECT * FROM receiving";

if(isset($_POST['search'])) {
    $search_term = mysqli_real_escape_string($link,$_POST['search_box']);
    $sql .= "WHERE address = '$search_term' ";
}

$query = mysqli_query($link,$sql);
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
    <div class="container box container-gap">
        <section id="data-header">

            <div class="container">
                <div class="row">
                    <div class="col">
                        <!-- Empty First Column-->
                    </div>
                    <div class="col">
                        <div class="mid">
                            <br>
                            <h3 style="padding-left: 55px;">RECEIVING</h3>
                            <?php echo @$_GET['Updates']; ?>
                        </div>
                    </div>

                    <div class="col" style="padding-top: 40px;">
                        <!-- Empty 3rd Column-->
                    </div> <!-- End of Third Column-->

                </div>
            </div>

        </section>
        <br>

        <section id="filter-section">
            <div class="container">
                <div class="row">

                    <div class="col">

                    </div>

                <div class="col">

                </div>

                </div>
        </section>

        <br>
        <table class="table table-bordered table-hover table-sm" id="mytable">
            <thead>
            <tr>
                <!--<th scope="col"><h6>Image</h6></th>-->
                <th scope="col"><h6>Product Name </h6></th>
                <th scope="col"><h6>Product Brand</h6></th>
                <th scope="col"><h6>Product Description</h6></th>
                <th scope="col"><h6>QTY on</h6></th>

            </tr>
            </thead>
    </div>
</body>


<?php
include('connection.php');
$displayInventory= "SELECT 'id',`productname`,`productbrand`,`productdescription`,`qtyon` FROM `receiving`";


$result=mysqli_query($link,$displayInventory);
while($row = mysqli_fetch_array($result)){
    $getId=$row['id'];
    $getProduct=$row['productname'];
    $getProductBrand=$row['productbrand'];
    $getProductDescription=$row['productdescription'];
    $getQtyOn=$row['qtyon'];




    ?>
    <tr>
        <td><?php echo $getProduct; ?></td>
        <td><?php echo $getProductBrand; ?></td>
        <td><?php echo $getProductDescription; ?></td>
        <td><?php echo $getQtyOn; ?></td>      
        <td><a class="btn btn-success" href="receive.php?Receive=<?php echo "$getId";?>">Receive</a></td>
        

    </tr>
<?php }
include('footer.php');
?>
