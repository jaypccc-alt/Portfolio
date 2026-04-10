<?php
include 'header.php';
include 'connection.php';

// Check if the filter form has been submitted
if (isset($_POST['filter'])) {
    $filter = mysqli_real_escape_string($link, $_POST['filter']);
    $sql = "SELECT * FROM purchase WHERE itemdescription LIKE '%$filter%'";
} else {
    $sql = "SELECT * FROM purchase";
}

$result = mysqli_query($link, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purchase Table</title>
    <!-- Include your CSS and JavaScript files here -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
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
                        <h2 style="padding-left: 30px;"> </h2>
                        <?php echo @$_GET['Updates']; ?>

                    </div>
                </div>

                <div class="col" style="padding-top: 40px;">
                    <!-- Empty 3rd Column-->
                </div> <!-- End of Third Column-->

            </div>
        </div>  
    <div class="container">
        <h1>Purchase Table</h1>
        <form action="purchasetable.php" method="post">
            <div class="form-group">
                <label for="filter">Filter by Item Name:</label>
                <input type="text" name="filter" id="filter" class="form-control" value="<?php if (isset($filter)) { echo $filter; } ?>">
            </div>
            <button type="submit" class="btn btn-primary">Filter</button>
            <a href="purchasetable.php" class="btn btn-secondary">Clear Filter</a>
            <button type="button" class="btn btn-success" onclick="convertToExcel()">Convert to Excel</button>
        </form>
        <br>
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
    </div>

    <script>
        function convertToExcel() {
            // Get the table element
            var table = document.querySelector('table');

            // Create a new workbook
            var wb = XLSX.utils.table_to_book(table);

            // Convert the workbook to a binary Excel file
            var wbout = XLSX.write(wb, { bookType: 'xlsx', type: 'binary' });

            // Save the Excel file
            var date = new Date().toLocaleString('en-US', { timeZone: 'Asia/Manila' });
            saveAs(new Blob([s2ab(wbout)], { type: 'application/octet-stream' }), 'purchasetable_' + date + '.xlsx');
        }

        function s2ab(s) {
            var buf = new ArrayBuffer(s.length);
            var view = new Uint8Array(buf);
            for (var i = 0; i < s.length; i++) {
                view[i] = s.charCodeAt(i) & 0xFF;
            }
            return buf;
        }
    </script>
</body>
</html>

<?php
include 'footer.php';
?>
