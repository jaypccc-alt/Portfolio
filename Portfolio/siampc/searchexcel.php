<?php
include('connection.php');

// Fetch data from database
if(isset($_POST['submit'])){
    $search=$_POST['search'];
    $sql="SELECT * FROM `inventory`  WHERE id like '%$search%' or supplier like '%$search%' or itemcategory like '%$search%' or itemdescription like '%$search%'";
    $result=mysqli_query($link,$sql);

    // Create HTML table to hold data
    $table = '<table>';
    $table .= '<tr><th>Supplier</th><th>Code</th><th>Item category</th><th>Item description</th><th>Unit price</th><th>Selling price</th><th>QTY on</th><th>Product Amount</th><th>Notes</th></tr>';

    $totalAmount = 0; // Initialize total amount variable

    if($result && mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_array($result)) {
            $table .= '<tr>';
            $table .= '<td style="border: 1px solid black; padding: 5px;">' . $row['supplier'] . '</td>';
            $table .= '<td style="border: 1px solid black; padding: 5px;">' . $row['code'] . '</td>';
            $table .= '<td style="border: 1px solid black; padding: 5px;">' . $row['itemcategory'] . '</td>';
            $table .= '<td style="border: 1px solid black; padding: 5px;">' . $row['itemdescription'] . '</td>';
            $table .= '<td style="border: 1px solid black; padding: 5px;">' . $row['unitprice'] . '</td>';
            $table .= '<td style="border: 1px solid black; padding: 5px;">' . $row['sellingprice'] . '</td>';
            $table .= '<td style="border: 1px solid black; padding: 5px;">' . $row['qtyon'] . '</td>';
            $table .= '<td style="border: 1px solid black; padding: 5px;">' . $row['amount'] . '</td>';
            $table .= '<td style="border: 1px solid black; padding: 5px;">' . $row['notes'] . '</td>';
            $table .= '</tr>';

            $totalAmount += $row['amount']; // Add current row amount to total amount
        }
    }

    $table .= '<tr><td colspan="7" align="right" style="border: 1px solid black; padding: 5px;"><b>Total:</b></td><td style="border: 1px solid black; padding: 5px;">' . $totalAmount . '</td><td></td></tr>';
    $table .= '</table>';

    // Get current time and date in Asia/Manila timezone
    date_default_timezone_set('Asia/Manila');
    $currentDateTime = date('Y-m-d H:i:s');
    
    // Add the date and time to the table
    $table = '<p> ' . $currentDateTime . '</p>' . $table;

    // Convert HTML table to Excel format
    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=search_result.xls");
    echo $table;
    exit;
}
?>