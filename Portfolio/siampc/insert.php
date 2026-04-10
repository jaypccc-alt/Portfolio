<?php
include 'header.php';
include 'connection.php';

// Fetch data from database
$sql = "SELECT * FROM items";
$result = mysqli_query($link, $sql);

// Display data in table with checkboxes
echo '<form method="POST">';
echo '<table>';
echo '<tr>';
echo '<th>Select</th>';
echo '<th>Supplier</th>';
echo '<th>Code</th>';
echo '<th>Item Category</th>';
echo '<th>Item Description</th>';
echo '<th>Unit Price</th>';
echo '<th>Selling Price</th>';
echo '<th>QTY</th>';
echo '<th>Amount</th>';
echo '<th>Notes</th>';
echo '</tr>';
while ($row = mysqli_fetch_assoc($result)) {
echo '<tr>';
echo '<td><input type="checkbox" name="selected_items[]" value="' . $row['code'] . '"></td>';
echo '<td>' . $row['supplier'] . '</td>';
echo '<td>' . $row['code'] . '</td>';
echo '<td>' . $row['itemcategory'] . '</td>';
echo '<td>' . $row['itemdescription'] . '</td>';
echo '<td>' . $row['unitprice'] . '</td>';
echo '<td>' . $row['sellingprice'] . '</td>';
echo '<td>' . $row['qtyon'] . '</td>';
echo '<td>' . $row['amount'] . '</td>';
echo '<td>' . $row['notes'] . '</td>';
echo '</tr>';
}
echo '</table>';
echo '<input type="submit" value="Insert">';
echo '</form>';

include 'footer.php';