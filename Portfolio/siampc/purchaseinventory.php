

<section id="sidepanel">
    <div class="container" id="sidepanel-container" style="margin-top: -1px;">
        <div id="sidepanel-content">
            <div id="sidepanel-title">
                <p id="sidepanel-menu">Menu</p>
            </div>
            <div id="sidepanel-body">
            <a href="testaddmemberpage.php" class="badge bg-primary my-badge">Add Member</a>
                <a href="sce.php" class="badge bg-info my-badge">SCE</a>
                <a href="product.php" class="badge bg-success my-badge">Products</a>
                <a href="addproduct.php" class="badge bg-danger my-badge">Add products</a>
                <a href="editproduct.php" class="badge bg-warning my-badge">Empty</a>
                <a href="#.php" class="badge bg-info my-badge">Empty</a>
                <a href="#.php" class="badge bg-warning my-badge">Empty</a>
                <a href="#.php" class="badge bg-dark my-badge">Empty</a>    
            </div>
        </div>
    </div>

</section> <br> <br> <br>
 
<form method="GET">
  <input type="text" name="search" placeholder="Search Supplier">
  <select name="filter">
    <option value="">All Categories</option>
    <option value="Chemicals">Chemicals</option>
    <option value="Fertilizers">Fertilizers</option>
    <option value="Rice">Rice</option>
    <option value="BY. Products">BY. Products</option>
    <option value="Palay Seeds">Palay Seeds</option>
    <option value="Palay">Palay</option>
    <option value="Others">Others</option>
  </select>
  <button type="submit">Search</button>
</form>

<?php
// establish database connection
include 'connection.php';
// initialize variables
$search = isset($_GET['search']) ? $_GET['search'] : '';
$filter = isset($_GET['filter']) ? $_GET['filter'] : '';
$condition = '';

// build search condition
if (!empty($search)) {
$condition .= "supplier LIKE '%$search%'";
}
if (!empty($filter)) {
if (!empty($condition)) {
$condition .= ' AND ';
}
$condition .= "itemcategory = '$filter'";
}

// build query
$sql = "SELECT * FROM inventory";
if (!empty($condition)) {
$sql .= " WHERE $condition";
}
$result = mysqli_query($link, $sql);

// display table
echo '<table border="1">';
echo '<tr><th style="border:2px solid black;">Supplier</th><th style="border:2px solid black;">Code</th><th style="border:2px solid black;">Category</th><th style="border:2px solid black;">Description</th><th style="border:2px solid black;">Unit Price</th><th style="border:2px solid black;">Selling Price</th><th style="border:2px solid black;">Qty On</th><th style="border:2px solid black;">Amount</th><th>Notes</th>';
while ($row = mysqli_fetch_assoc($result)) {
echo '<tr>';

echo '<td>' . $row['supplier'] . '</td>';
echo '<td>' . $row['code'] . '</td>';
echo '<td>' . $row['itemcategory'] . '</td>';
echo '<td>' . $row['itemdescription'] . '</td>';
echo '<td>' . $row['unitprice'] . '</td>';
echo '<td>' . $row['sellingprice'] . '</td>';
echo '<td><form method="POST" action=""><input type="hidden" name="id" value="' . $row['id'] . '"><input type="number" name="qtyon"><button type="submit">Confirm</button></form></td>';
echo '<td>' . $row['amount'] . '</td>';
echo '<td>' . $row['notes'] . '</td>';

echo '</tr>';
}

echo '</table>';

// update qtyon and amount
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$id = $_POST['id'];
$qtyon = $_POST['qtyon'];
$existing_qtyon = mysqli_fetch_assoc(mysqli_query($link, "SELECT qtyon FROM inventory WHERE id=$id"))['qtyon'];
$new_qtyon = $existing_qtyon + $qtyon;
$unitprice = mysqli_fetch_assoc(mysqli_query($link, "SELECT unitprice FROM inventory WHERE id=$id"))['unitprice'];
$new_amount = $new_qtyon * $unitprice;



$update_query = "UPDATE inventory SET qtyon=$new_qtyon, amount=$new_amount WHERE id=$id";
mysqli_query($link, $update_query);

// redirect to current page to avoid form resubmission on refresh
header("Location: " . $_SERVER['REQUEST_URI']);
exit();
}

mysqli_close($link);
include 'footer.php';
include 'header.php';

?>




        
                



