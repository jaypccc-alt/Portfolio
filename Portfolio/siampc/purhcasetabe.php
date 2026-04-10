<?php
include 'header.php';
include 'connection.php';

$sql = "SELECT * FROM purchase";
$result = mysqli_query($link, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purchase List</title>
    <!-- Include your CSS and JavaScript files here -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <table class="table">
        <thead>
            <tr>
                <th>Supplier</th>
                <th>Date</th>
                <th>Code</th>
                <th>MSRR #</th>
                <th>Category</th>
                <th>Qty</th>
                <th>Item Description</th>
                <th>Unit</th>
                <th>Amount</th>
                <th>Note</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['supplier'] . "</td>";
                echo "<td>" . $row['date'] . "</td>";
                echo "<td>" . $row['code'] . "</td>";
                echo "<td>" . $row['msrr'] . "</td>";
                echo "<td>" . $row['category'] . "</td>";
                echo "<td>" . $row['qty'] . "</td>";
                echo "<td>" . $row['itemdescription'] . "</td>";
                echo "<td>" . $row['unit'] . "</td>";
                echo "<td>" . $row['amount'] . "</td>";
                echo "<td>" . $row['note'] . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>

<?php
include 'footer.php';
?>
