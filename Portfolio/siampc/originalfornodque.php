<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<?php
    include('header.php');
    $error = "";
    $notification = "";
    if (array_key_exists("submit", $_POST)) {
        include('connection.php');
        $nameOfProduct = mysqli_real_escape_string($link, $_POST['Uproductname']);
        $quantityToBeReleased = mysqli_real_escape_string($link, $_POST['Uquantity']);
        if (mysqli_connect_error()) {
            die("Database connect error");
        }
        if (!$_POST['Uproductname']) {
            $error = "<p>Product field is required</p>";
        }
        if (!$_POST['Uquantity']) {
            $error = "<p>Quantity field is required</p>";
        } else {
            $query = "SELECT stock FROM products WHERE product = '$nameOfProduct'";
            $result = mysqli_query($link, $query);
            if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $currentStock = $row['stock'];
    if ($quantityToBeReleased < 0) {
        $error = "<div style='text-align:center;'><p>Product receive failed. Available stocks is only $currentStock.</p></div>";
    } else {
        $rquery = "UPDATE products SET stock = stock + $quantityToBeReleased WHERE product = '$nameOfProduct'";
        if (mysqli_query($link,$rquery)) {
            $notification = "<div style='text-align:center;'> Product successfuly received</div>";
        } else {
            $error = "<div style='text-align:center;'>Error: " . mysqli_error($link) . "</div>";
        }
    }
} else {
                $error = "<p>Failed to receive products. Product not found.</p>";
            }
        }
        if ($error != "") {
            $error = "<div style='text-align:center;'><p> There were errors during submission</p></div>". $error;
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
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="genbarcode.php">Generate Barcode</a>
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
                                <li class="nav-item"><aclass="nav-link" href="logout.php">Logout</a></li>
</ul>
</div>
</div>
</nav>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Receiving Products</h1>
        <form method="POST">
            <div class="form-group">
                <label for="productname">Product Name:</label>
                <input type="text" class="form-control" id="productname" name="Uproductname" placeholder="Enter product name">
            </div>
            <div class="form-group">
                <label for="quantity">Quantity:</label>
                <input type="number" class="form-control" id="quantity" name="Uquantity" placeholder="Enter quantity">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
        </form>
        <?php if ($error != "") { ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php } ?>
        <?php if ($notification != "") { ?>
            <div class="alert alert-success"><?php echo $notification; ?></div>
        <?php } ?>
    </div>
    </div>

    <script>
        $(document).ready(function() {
            $("#productname").on("input", function(e) {
                // Check if the input length is equal to the expected length of the barcode
                if ($(this).val().length === 10) {
                    // Fill in the input field with the barcode input
                    $(this).val("Barcode input: " + $(this).val());
                }
            });
        });
    </script>
</body>
<?php
 include('footer.php');
 ?>

</body>
</html>
