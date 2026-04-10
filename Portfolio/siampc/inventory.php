<?php
include('connection.php'); // include the database connection

// retrieve the products from the inventory table
$query = "SELECT id, code, itemcategory, sellingprice FROM inventory";
$result = mysqli_query($link, $query);

// start the HTML table
echo '<table>';
echo '<tr><th>Product Name</th><th>Unit Price</th><th>Select</th></tr>';

// loop through the products and create a row for each one
while ($row = mysqli_fetch_assoc($result)) {
  // retrieve the product information
  $product_id = $row['id'];
  $product_name = $row['code'] . ' - ' . $row['itemcategory'];
  $unit_price = $row['sellingprice'];

  // create the row
  echo '<tr>';
  echo '<td>' . $product_name . '</td>';
  echo '<td>' . $unit_price . '</td>';
  echo '<td><input type="checkbox" name="product[]" value="' . $product_id . '"></td>';
  echo '</tr>';
}

// end the HTML table
echo '</table>';

// create the submit button
echo '<button onclick="selectProducts()">Select Products</button>';
?>