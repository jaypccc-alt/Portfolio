<?php
include 'header.php';
include 'connection.php';

// query to get items from inventory table
$query = "SELECT code, itemdescription, itemcategory, sellingprice FROM inventory";
$result = mysqli_query($link, $query);

// create an array of items
$items = array();
while ($row = mysqli_fetch_assoc($result)) {
    $items[] = $row;
}

// function to create dropdown list of items
function createDropdown($items) {
    $dropdown = '<select name="itemcode[]">';
    $dropdown .= '<option value="" selected disabled>-Select Item-</option>';
    $currentCategory = null;
    foreach ($items as $item) {
        if ($currentCategory !== $item['itemcategory']) {
            $dropdown .= '<optgroup label="'.$item['itemcategory'].'">';
            $currentCategory = $item['itemcategory'];
        }
        $dropdown .= '<option value="'.$item['code'].'-'.$item['itemdescription'].'" data-sellingprice="'.$item['sellingprice'].'">'.$item['itemdescription'].'</option>';
    }
    $dropdown .= '</optgroup></select>';
    return $dropdown;
}

// function to calculate amount
function calculateAmount($qty, $sellingprice) {
    return $qty * $sellingprice;
}

// function to calculate total amount
function calculateTotalAmount($amounts) {
    return array_sum($amounts);
}

// check if form is submitted
if (isset($_POST['submit'])) {
    // get data from form
    $itemcodes = $_POST['itemcode'];
    
    $qtys = $_POST['qty'];
    $sellingprices = $_POST['sellingprice'];
    $amounts = $_POST['amount'];
    $sales = $_POST['sales'];
    $member = $_POST['member'];
    $receiptno = $_POST['receiptno'];
    $ctrlno = $_POST['ctrlno'];
    $note = $_POST['note'];
    $wout = $_POST['wout'];
    $date = $_POST['date'];
    $name = $_POST['name'];

    // extract year, month, and complete date from input date
    $year = date('Y', strtotime($date));
    $month = date('m', strtotime($date));
    $completeDate = date('Y-m-d', strtotime($date));

    // insert data into sales table
    for ($i = 0; $i < count($itemcodes); $i++) {
    $query = "INSERT INTO sales (product, qty, unitprice, amount, sales, member, receiptno, ctrlno, dateyear, datemonth, date, note, wout, name) VALUES ('$itemcodes[$i]', '$qtys[$i]', '$sellingprices[$i]', '$amounts[$i]', '$sales', '$member', '$receiptno', '$ctrlno', '$year', '$month', '$completeDate', '$note', '$wout', '$name')";
    mysqli_query($link, $query);

    // update qtyon in inventory table
    $query = "UPDATE inventory SET qtyon = qtyon - '$qtys[$i]' WHERE code = '".explode('-', $itemcodes[$i])[0]."'";
    mysqli_query($link, $query);
}

    // calculate total amount
    $totalAmount = calculateTotalAmount($amounts);
}
?>

<div class="container mt-5">

    <div class="row">

        <div class="col-md-4">
                
        </div>

        <div class="col-md-4">
        <a href="menu.php"><img src="./img/test.jpg" id="complogo"></a>
        

        <h1 class="text-center">Sales</h1>
        </div>

        <div class="col-md-4">
                
        </div>

    </div>
    <a href="Sales.php" class="btn btn-primary">Return to Sales</a> <br>

<form method="post">
<td>
  <select name="sales" required >
    <option value="" selected disabled>-Sales-</option>
    <option value="Cash">Cash</option>
    <option value="Credit">Credit</option>
  </select>
</td>
  <td>
  <select name="member" required>
    <option value="" selected disabled>-Select Member Type-</option>
    <option value="Yes">Yes</option>
    <option value="No">No</option>
  </select>
  </td>
  <td>Receipt No.</td>
  <td><input type="text" name="receiptno" required></td>
  <td>Systems Ctrl No.</td>
  <td><input type="text" name="ctrlno" value="<?php echo uniqid(); ?>" readonly></td>
  <td>Name:</td>
<td><input type="text" name="name"></td>
<td>
  <label for="date">Date:</label>
<input type="date" id="date" name="date" required>

    <br><br>
<table>
<thead>
<tr>
<th>Qty</th>
<th>Items</th>
<th>Unit Price</th>
<th>Amount</th>
</tr>
</thead>
<tbody>
<?php for ($i = 0; $i < 10; $i++) { ?>
<tr>
<td><input type="number" name="qty[]" min="1" ></td>
<td><?php echo createDropdown($items); ?></td>
<td><input type="text" name="sellingprice[]" readonly></td>
<td><input type="text" name="amount[]" readonly></td>
</tr>
<?php } ?>
<tr>
<td colspan="3">Total Amount:</td>
<td><input type="text" id="totalamount" name="totalamount" value="<?php echo isset($totalAmount) ? $totalAmount : ''; ?>" readonly></td>
</tr>
<td>NOTE:</td>
<td><input type="text" name="note"></td>
<td>
  <select name="wout" required>
    <option value="" selected disabled>-Out-</option>
    <option value="Bodega">Bodega</option>
    <option value="Office">Office</option>
<tr>
<td colspan="4"><input type="submit" name="submit" value="Submit"></td>

</tr>

</tbody>
</table>

</form>

<button type="button" onclick="clearForm()">Clear</button>

<div id="message"></div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
    $('select[name^=itemcode]').change(function() {
        var sellingPrice = $(this).find(':selected').data('sellingprice');
        $(this).closest('tr').find('input[name^=sellingprice]').val(sellingPrice);
    });

    $('input[name^=qty]').change(function() {
        var qty = $(this).val();
        var sellingPrice = $(this).closest('tr').find('input[name^=sellingprice]').val();
        var amount = calculateAmount(qty, sellingPrice);
        $(this).closest('tr').find('input[name^=amount]').val(amount);

        // update total amount
        var totalAmount = 0;
        $('input[name^=amount]').each(function() {
            var amount = parseFloat($(this).val());
            if (!isNaN(amount)) {
                totalAmount += amount;
            }
        });
        $('#totalamount').val(totalAmount.toFixed(2));
    });

    function calculateAmount(qty, sellingPrice) {
        return qty * sellingPrice;
    }
});

function clearForm() {
    $('input[type=text], input[type=number], select').val('');
    $('input[type=text], input[type=number], select').prop('readonly', false);
    $('#totalamount').val('');
    $('#message').html('');
}

$('form').submit(function(e) {
    var requiredFields = ['sales', 'member', 'receiptno', 'name', 'date'];
    var allFilled = true;
    for (var i = 0; i < requiredFields.length; i++) {
        var field = requiredFields[i];
        if ($('select[name=' + field + ']').val() == '' && $('input[name=' + field + ']').val() == '') {
            allFilled = false;
            $('select[name=' + field + '], input[name=' + field + ']').addClass('error');
        } else {
            $('select[name=' + field + '], input[name=' + field + ']').removeClass('error');
        }
    }
    if (!allFilled) {
        $('#message').html('<div class="error-message">Please fill in all required fields.</div>');
        e.preventDefault();
    } else {
        $('#message').html('<div class="success-message">Form submitted successfully.</div>');
    }
});
</script>

<style>
    .return-link {
  color: blue;
  text-decoration: underline;
}
    body {
      font-family: Arial, sans-serif;
      font-size: 14px;
    }
    table {
      border-collapse: collapse;
      width: 100%;
    }
    th, td {
      padding: 8px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }
    th {
      background-color: #f2f2f2;
      font-weight: bold;
    }
    select, input[type="number"], input[type="text"], input[type="date"] {
      font-size: 14px;
      padding: 6px;
      border-radius: 4px;
      border: 1px solid #ccc;
      width: 100%;
      box-sizing: border-box;
    }
    select:focus, input[type="number"]:focus, input[type="text"]:focus, input[type="date"]:focus {
      outline: none;
      border: 1px solid #4CAF50;
    }
    select option[disabled] {
      color: #aaa;
    }
    input[type="submit"] {
      background-color: #4CAF50;
      border: none;
      color: white;
      padding: 10px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      border-radius: 4px;
      cursor: pointer;
    }
    input[type="submit"]:hover {
      background-color: #45a049;
    }
    .form-container {
      max-width: 800px;
      margin: auto;
      padding: 20px;
      background-color: #f2f2f2;
      border-radius: 10px;
      box-shadow: 0px 0px 10px #ddd;
    }
    .form-container h2 {
      text-align: center;
      margin-top: 0;
    }
    .form-row {
      display: flex;
      align-items: center;
      margin-bottom: 10px;
    }
    .form-row label {
      width: 150px;
      margin-right: 10px;
      font-weight: bold;
    }
    .form-row input[type="text"], .form-row input[type="number"], .form-row select {
      flex: 1;
      margin-right: 10px;
      width: auto;
    }
    .form-row input[type="text"][readonly], .form-row input[type="number"][readonly] {
      background-color: #ddd;
    }
    .form-row:last-child {
      margin-bottom: 0;
    }
    .form-row-group {
      border: 1px solid #ddd;
      border-radius: 4px;
      padding: 10px;
      margin-bottom: 10px;
    }
    .form-row-group table {
      width: 100%;
      margin-top: 10px;
    }
    .form-row-group th, .form-row-group td {
      border: none;
      padding: 5px;
      text-align: left;
    }
    .form-row-group th {
      background-color: #f2f2f2;
      font-weight: bold;
    }
    .form-row-group td:first-child {
      width: 50px;
    }
    .form-row-group td:last-child {
      text-align: right;
    }
    .form-row-group input[type="text"][readonly] {
      background-color: transparent;
      border: none;
      text-align: right;
}
.error-message {
color: #ff0000;
font-size: 12px;
margin-top: 5px;
}
.success-message {
color: #008000;
font-size: 12px;
margin-top: 5px;
}
.error {
border: 1px solid #ff0000;
}
</style>
