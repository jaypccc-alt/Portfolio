<?php
include 'connection.php';

$supplier = isset($_POST['supplier']) ? mysqli_real_escape_string($link, $_POST['supplier']) : '';
$date = isset($_POST['date']) ? mysqli_real_escape_string($link, $_POST['date']) : '';
$code = isset($_POST['code']) ? mysqli_real_escape_string($link, $_POST['code']) : '';
$msrr = isset($_POST['msrr']) ? mysqli_real_escape_string($link, $_POST['msrr']) : '';
$note = isset($_POST['note']) ? mysqli_real_escape_string($link, $_POST['note']) : '';

// Set a flag to track if the transaction is successful
$success = true;

// Loop through the item data array and insert each item separately
if (isset($_POST['itemDescription']) && is_array($_POST['itemDescription'])) {
    $itemDescriptions = $_POST['itemDescription'];
    $qtys = $_POST['qty'];
    $unitPrices = $_POST['unitPrice'];

    for ($i = 0; $i < count($itemDescriptions); $i++) {
        $category = mysqli_real_escape_string($link, $_POST['itemcategory'][$i]);
        $qty = intval($qtys[$i]);
        $itemDescription = mysqli_real_escape_string($link, $itemDescriptions[$i]);
        $unitPrice = floatval($unitPrices[$i]);
        $amount = floatval($qty) * floatval($unitPrice);

        $sql = "INSERT INTO purchase (supplier, date, code, msrr, category, qty, itemdescription, unit, amount, note) VALUES ('$supplier', '$date', '$code', '$msrr', '$category', '$qty', '$itemDescription', '$unitPrice', '$amount', '$note')";
        $result = mysqli_query($link, $sql);

        if (!$result) {
            $success = false;
            break; // Stop processing if an error occurs
        }

        $sql = "UPDATE inventory SET qtyon = qtyon + '$qty' WHERE itemdescription = '$itemDescription'";
        $result = mysqli_query($link, $sql);

        if (!$result) {
            $success = false;
            break; // Stop processing if an error occurs
        }
    }
}

mysqli_close($link);

// Redirect to the appropriate page with a success or failure message
if ($success) {
    header('Location: purchaseform.php?success=1');
} else {
    header('Location: purchaseform.php?success=0');
}
exit();
?>
