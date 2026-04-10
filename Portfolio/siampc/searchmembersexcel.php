<?php
// Set headers for downloading the Excel file
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="search_results.xls"');
header('Cache-Control: max-age=0');

// Connect to the database
include('connection.php');

// Get the search term from the form
$search = mysqli_real_escape_string($link, $_POST['search']);

// Build the SQL query to fetch the search results
$sql = "SELECT * FROM `members` WHERE id LIKE '%$search%' OR acct LIKE '%$search%' OR fname LIKE '%$search%' OR lname LIKE '%$search%' OR address LIKE '%$search%'";
$result = mysqli_query($link, $sql);

// Get the current date and time in Asia/Manila time zone
date_default_timezone_set('Asia/Manila');
$date = date('Y-m-d H:i:s');

// Create the Excel file with black borders
echo '<table border="1" style="border-collapse: collapse;">';
echo '<thead>';
echo '<tr>';
echo '<th colspan="18" style="text-align: center;"> '.$date.'</th>';
echo '</tr>';
echo '<tr>';
echo '<th>ID no.</th>';
echo '<th>Acct no.</th>';
echo '<th>First name</th>';
echo '<th>Middle name</th>';
echo '<th>Last Name</th>';
echo '<th>Gender</th>';
echo '<th>Address</th>';
echo '<th>Mobile</th>';
echo '<th>Mobile 2</th>';
echo '<th>Telephone</th>';
echo '<th>Occupation</th>';
echo '<th>Birthday</th>';
echo '<th>Account Status</th>';
echo '<th>CBU</th>';
echo '<th>TIN</th>';
echo '<th>CBU last update</th>';
echo '<th>ARB</th>';
echo '<th>RSBSA</th>';
echo '</tr>';
echo '</thead>';
echo '<tbody>';

while($row = mysqli_fetch_assoc($result)) {
    echo '<tr>';
    echo '<td>' . $row['id'] . '</td>';
    echo '<td>' . $row['acct'] . '</td>';
    echo '<td>' . $row['fname'] . '</td>';
    echo '<td>' . $row['mname'] . '</td>';
    echo '<td>' . $row['lname'] . '</td>';
    echo '<td>' . $row['gender'] . '</td>';
    echo '<td>' . $row['address'] . '</td>';
    echo '<td>' . $row['mobile'] . '</td>';
    echo '<td>' . $row['mobile2'] . '</td>';
    echo '<td>' . $row['telephone'] . '</td>';
    echo '<td>' . $row['occupation'] . '</td>';
    echo '<td>' . $row['bday'] . '</td>';
    echo '<td>' . $row['acctstatus'] . '</td>';
    echo '<td>' . $row['cbu'] . '</td>';
    echo '<td>' . $row['tin'] . '</td>';
    echo '<td>' . $row['cbudateupdate'] . '</td>';
    echo '<td>' . $row['arb'] . '</td>';
    echo '<td>' . $row['rsbsa'] . '</td>';
    echo '</tr>';
}

echo '</tbody>';
echo '</table>';

// Close the database connection
mysqli_close($link);

?>