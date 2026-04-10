<?php
include 'header.php';
include 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purchase Form</title>
    <!-- Include your CSS and JavaScript files here -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
       $(document).ready(function() {
    $("#addItemModal").on('shown.bs.modal', function() {
        $("#itemSearch").focus();
    });

    $("#itemTable").on("click", "tr", function() {
        var category = $(this).find(".category").text();
        var itemDescription = $(this).find(".itemDescription").text();
        var unitPrice = $(this).find(".unitPrice").text();
        var qty = prompt("Enter quantity:");
        if (qty != null && qty != "") {
            var amount = parseFloat(unitPrice) * parseInt(qty);
            var row = "<tr><td>" + category + "</td><td>" + qty + "<input type='hidden' name='qty[]' value='" + qty + "'></td><td>" + itemDescription + "<input type='hidden' name='itemDescription[]' value='" + itemDescription + "'></td><td>" + unitPrice + "<input type='hidden' name='unitPrice[]' value='" + unitPrice + "'></td><td>" + amount.toFixed(2) + "</td></tr>";
            $("#itemList").append(row);
        }
        $("#addItemModal").modal("hide");
    });
});




    </script>
</head>
<body>
    <div class="container mt-5">

    <div class="row">

        <div class="col-md-4">
                
        </div>

        <div class="col-md-4">
        <a href="menu.php"><img src="./img/test.jpg" id="complogo"></a>
        

        <h1 class="text-center">Purchase</h1>
        </div>

        <div class="col-md-4">
                
        </div>
        <a href="product.php" class="btn btn-primary">Return to products</a> <br>

    </div>
    <form action="process_purchase.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="supplier">Supplier:</label>
            <input type="text" name="supplier" id="supplier" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label for="date">Date:</label>
            <input type="date" name="date" id="date" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label for="code">Code:</label>
            <input type="text" name="code" id="code" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label for="msrr">MSRR #:</label>
            <input type="text" name="msrr" id="msrr" class="form-control" required>
        </div>
        
        <div class="form-group">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addItemModal">Add Items</button>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>Category</th>
                    <th>Qty</th>
                    <th>Item Description</th>
                    <th>Unit</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody id="itemList">
            </tbody>
        </table>

        <div class="form-group">
            <label for="note">Note:</label>
            <textarea name="note" id="note" class="form-control"></textarea>
        </div>
        
        <input type="submit" value="Submit" class="btn btn-primary">
        <input type="reset" value="Clear" class="btn btn-secondary">
    </form>

    <!-- Add Item Modal -->
    <div class="modal fade" id="addItemModal" tabindex="-1" role="dialog" aria-labelledby="addItemModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addItemModalLabel">Add Item</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" name="itemSearch" id="itemSearch" class="form-control" placeholder="Search...">
                    </div>
                    <table class="table" id="itemTable">
                        <thead>
                            <tr>
                                <th>Category</th>
                                <th>Qty On Hand</th>
                                <th>Item Description</th>
                                <th>Unit Price</th>
                            </tr>
                        </thead>
                        <tbody id="itemList">
                            <?php
                            $sql = "SELECT * FROM inventory";
                            $result = mysqli_query($link, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td class='category'>" . $row['itemcategory'] . "</td>";
                                echo "<td>" . $row['qtyon'] . "</td>";
                                echo "<td class='itemDescription'>" . $row['itemdescription'] . "</td>";
                                echo "<td class='unitPrice'>" . $row['unitprice'] . "</td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php
if (isset($_GET['success'])) {
    if ($_GET['success'] == 1) {
        echo '<div class="alert alert-success">Transaction successful!</div>';
    } elseif ($_GET['success'] == 0) {
        echo '<div class="alert alert-danger">Failed to process the transaction. Please try again.</div>';
    }
}

include 'footer.php';
?>
<?php
include 'footer.php';
?>
