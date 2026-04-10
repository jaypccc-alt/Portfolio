<?php
include('connection.php');

if(isset($_GET['Pid'])) {
    $getProductId = $_GET['Pid'];
    
    // Get the product details before deleting it
    $productFullDetailsQuery = "SELECT * FROM `inventory` WHERE `id`='$getProductId'";
    $result = mysqli_query($link, $productFullDetailsQuery);
    $row = mysqli_fetch_array($result);

    // Prompt user to enter reason for deleting the product
    $delete_reason = '';
    if (isset($_POST['delete_reason'])) {
        $delete_reason = mysqli_real_escape_string($link, $_POST['delete_reason']);
    }
    else {
        // Display a form to enter the reason for deleting the product
        echo "<form method='post' action='deleteproduct.php?Pid=$getProductId'>
                  Reason for deleting product: <input type='text' name='delete_reason' required>
                  <input type='submit' value='Submit'>
              </form>";
        exit();
    }

    // Insert the product details into the archives table with the reason for deletion
    $archivesQuery = "INSERT INTO archives (supplier, code, itemcategory, itemdescription, unitprice, sellingprice, qtyon, amount, notes, reason)
                      VALUES ('{$row['supplier']}', '{$row['code']}', '{$row['itemcategory']}', '{$row['itemdescription']}', '{$row['unitprice']}', '{$row['sellingprice']}', '{$row['qtyon']}', '{$row['amount']}', '{$row['notes']}', '$delete_reason')";
    mysqli_query($link, $archivesQuery);

    // Delete the product from the inventory table
    $deleteQuery = "DELETE FROM `inventory` WHERE `id`='$getProductId'";
    mysqli_query($link,$deleteQuery);

    header("location: product.php");
}
else {
    echo "Product ID not found.";
}
?>