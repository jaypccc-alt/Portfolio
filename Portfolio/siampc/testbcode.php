<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            var i = 1;
            $("#addProduct").click(function() {
                $("#productTable").append('<tr id="row' + i + '">' +
                    '<td><input type="text" class="form-control" name="productname[]" placeholder="Enter product name"></td>' +
                    '<td><input type="number" class="form-control" name="quantity[]" placeholder="Enter quantity"></td>' +
                    '<td><button type="button" class="btn btn-danger" onclick="removeRow(' + i + ')">Remove</button></td>' +
                    '</tr>');
                i++;
            });
        }); function removeRow(id) {
        $("#row" + id).remove();
    }
</script>
</head>
<?php
include('header.php');
$error = "";
$notification = "";
if (array_key_exists("submit", $_POST)) {
    include('connection.php');
    if (mysqli_connect_error()) {
        die("Database connect error");
    }
    if (!isset($_POST['productname']) || !isset($_POST['quantity'])) {
        $error = "<p>At least one product must be added</p>";
    } else {
        $productnames = $_POST['productname'];
        $quantities = $_POST['quantity'];
        $productList = '';
        for ($i = 0; $i < count($productnames); $i++) {
            $nameOfProduct = mysqli_real_escape_string($link, $productnames[$i]);
            $quantityToBeReleased = mysqli_real_escape_string($link, $quantities[$i]);
            if (!$_POST['productname'][$i]) {
                $error = "<p>Product field is required</p>";
                break;
            }
            if (!$_POST['quantity'][$i]) {
                $error = "<p>Quantity field is required</p>";
                break;
            }
            $query = "SELECT stock FROM products WHERE product = '$nameOfProduct'";
            $result = mysqli_query($link, $query);
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $currentStock = $row['stock'];
               if ($quantityToBeReleased > $currentStock) {
    $error = "<div style='text-align:center; class=alert alert-success'><p>Product releasing failed. Available stocks for $nameOfProduct is only $currentStock.</p></div>";
    break;
} else {
    $rquery = "UPDATE products SET stock = stock - $quantityToBeReleased WHERE product = '$nameOfProduct'";
    if (mysqli_query($link,$rquery)) {
        $notification = "<div style='text-align:center; class=alert alert-success'><p>Product/products released</p></div>";
    } else {
        $error = "<div style='text-align:center;'><p>Product releasing failed. Please try again later</p></div>";
        break;
    }
}
            } else {
                $productList .= '<li>' . $nameOfProduct . '</li>';
                if ($error === '') {
                    $error = "<div style='text-align:center;'><p>Product releasing failed. The following products do not exist in our database:</p><ul>";
                }
            }
        }
        if ($productList !== '') {
            $error .= $productList . '</ul></div>';
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
    <div class="container">
        <h2 class="text-center mb-4">Release Products</h2>
        <?php
        if ($error !== '') {
            echo $error;
        }
        if ($notification !== '') {
            echo $notification;
        }
    ?>
        <form method="post">
            <table class="table table-bordered" id="productTable">
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="text" class="form-control" name="productname[]" placeholder="Enter product name"></td>
                        <td><input type="number" class="form-control" name="quantity[]" placeholder="Enter quantity"></td>
                        <td><button type="button" class="btn btn-success" id="addProduct">Add</button></td>
                    </tr>
                </tbody>
            </table>
            <button type="submit" class="btn btn-primary" name="submit">release</button>
        </form>
    </div>
</body>
</html>