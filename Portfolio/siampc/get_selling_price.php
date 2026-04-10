<?php
if(isset($_POST['product_name'])) {
    $code = $_POST['product_name'];
    $sql = "SELECT sellingprice FROM inventory WHERE code='$code'";
    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_assoc($result);
    $selling_price = $row['selling_price'];
    echo $selling_price;
}
?>