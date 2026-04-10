<?php
include "header.php";
include "connection.php";

// Query the sales table
$sql = "SELECT * FROM sales";
$result = mysqli_query($link, $sql);

// Retrieve user input
if(isset($_POST['month']) && isset($_POST['year'])){
    $month = $_POST['month'];
    $year = $_POST['year'];
    $sql = "SELECT * FROM sales WHERE datemonth = '$month' AND dateyear = '$year'";
    $result = mysqli_query($link, $sql);
}
?>
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
                <a href="sales.php" class="badge bg-info my-badge">Sales</a>
                <a href="#.php" class="badge bg-warning my-badge">Empty</a>
                <a href="#.php" class="badge bg-dark my-badge">Empty</a>    
            </div>
        </div>
    </div>

</section>


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
                        <a href="#"><img src="./img/siampclogo.jpg" id="acctlogo" style="padding-left: 0;margin-left: 0; height: 170px;"></a>
                        <h2 style="padding-left: 30px;">Sales Page </h2>
                        <?php echo @$_GET['Updates']; ?>

                    </div>
                </div>

                <div class="col" style="padding-top: 40px;">
                    <!-- Empty 3rd Column-->
                </div> <!-- End of Third Column-->

            </div>
        </div>

    </section>
    <a href="salesform.php" class="btn btn-primary">Add Sales</a>
    <form method="POST">
  <label for="month">Select Month:</label>
  <select id="month" name="month">
    <option value="">--Select--</option>
    <?php
      $months = array(
        '01' => 'January', 
        '02' => 'February', 
        '03' => 'March', 
        '04' => 'April', 
        '05' => 'May', 
        '06' => 'June', 
        '07' => 'July', 
        '08' => 'August', 
        '09' => 'September', 
        '10' => 'October', 
        '11' => 'November', 
        '12' => 'December'
      );
      foreach($months as $key => $value){
        echo '<option value="'.$key.'">'.$value.'</option>';
      }
    ?>
  </select>
<label for="year">Select Year:</label>
<select id="year" name="year">
<option value="">--Select--</option>
<?php
   $currentYear = date('Y');
   $pastYear = $currentYear - 10;
   $futureYear = $currentYear + 10;
   for($i=$futureYear;$i>=$pastYear;$i--){
     echo '<option value="'.$i.'">'.$i.'</option>';
   }
 ?>
</select>
    </select>

    <button type="submit">Submit</button>
</form>

 <table class="sales-table">
  <tr>
    <th>Year</th>
    <th>Month</th>
    <th>Date</th>
    <th>Sales</th>
    <th>Ctrl No</th>
    <th>Receipt No</th>
    <th>Member</th>
    <th>Name</th>
    <th>Quantity</th>
    <th>Product</th>
    <th>Unit Price</th>
    <th>Amount</th>
    <th>Out</th>
    <th>Notes</th>
  </tr>
    
   <?php
  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      echo "<tr>";
      echo "<td>" . $row["dateyear"] . "</td>";
      echo "<td>" . $row["datemonth"] . "</td>";
      echo "<td>" . $row["date"] . "</td>";
      echo "<td>" . $row["sales"] . "</td>";
      echo "<td>" . $row["ctrlno"] . "</td>";
      echo "<td>" . $row["receiptno"] . "</td>";
      echo "<td>" . $row["member"] . "</td>";
      echo "<td>" . $row["name"] . "</td>";
      echo "<td>" . $row["qty"] . "</td>";
      echo "<td>" . $row["product"] . "</td>";
      echo "<td>" . $row["unitprice"] . "</td>";
      echo "<td>" . $row["amount"] . "</td>";
      echo "<td>" . $row["wout"] . "</td>";
      echo "<td>" . $row["note"] . "</td>";
      echo "</tr>";
    }
  } else {
    echo "<tr><td colspan='14' class='no-records'>No records found.</td></tr>";
  }
  ?>

</table>
<?php include "footer.php"; ?>
<style type="text/css">
/* Center the table on the page */
table {
  margin: 0 auto;
  border-collapse: collapse;
  border: 1px solid #ddd;
  width: 100%;
}

/* Style the table header */
th {
  background-color: #f2f2f2;
  font-weight: bold;
  border: 1px solid #ddd;
  padding: 8px;
  text-align: left;
}

/* Style the table cells */
td {
  border: 1px solid #ddd;
  padding: 8px;
  text-align: left;
  vertical-align: top;
}

/* Add alternating row colors */
tr:nth-child(even) {
  background-color: #f2f2f2;
}

/* Style the "No records found" message */
.no-records {
  text-align: center;
  font-style: italic;
  color: #999;
}
 label {
    display: inline-block;
    width: 100px;
    font-weight: bold;
    margin-bottom: 10px;
  }

  select {
    padding: 5px;
    border-radius: 5px;
    border: none;
    background-color: #f2f2f2;
    margin-bottom: 10px;
    width: 200px;
  }
</style>