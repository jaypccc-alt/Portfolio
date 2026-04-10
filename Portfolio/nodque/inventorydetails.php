<?php
include('./header.php');
?>

<?php



$getProductId=$_GET['Details'];
//$customerFullDetailsQuery="SELECT * FROM `customers` WHERE `id`='$getCustomersId' ";
$productFullDetailsQuery="
SELECT * 
FROM `inventory` 
WHERE `id`='$getProductId'";

include('connection.php');
$result=mysqli_query($link,$productFullDetailsQuery);

if(!$result){
	echo "Cannot Load Member Details";
} else {

$row = mysqli_fetch_array($result);
    $getId=$row['id'];
    $getProductName=$row['productname'];
    $getProductBrand=$row['productbrand'];
    $getProductDescription=$row['productdescription'];
    $getStock=$row['stock'];
   

?>

<div class="container">
    <p class="account-category font-weight-bold">Inventory Details</p><br>
    <table class="table">
        <thead>
            <tr>
          
            <th scope="col">Name:</th>
            <th scope="col">Brand</th>
            <th scope="col">Stock</th>
            <th scope="col">Price</th>
            
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $getProductName.""; ?></td>
                <td><?php echo $getProductBrand; ?></td>
                <td><?php echo $getProductDescription; ?></td>
                <td><?php echo  $getStock; ?></td>
                <div class="btn-group-vertical">
                    <td><a class="btn btn-primary" href="editinventory.php?Update=<?php echo "$getProductId";?>">Edit Inventory</a></td>
                    <td><a class="btn btn-info" href="addstock.php">ADD stock</a></td>
                    <td><a class="btn btn-warning" href="inventory.php">MINUS stock</a></td>
                    <td><a class="btn btn-success" href="inventory.php">Back to Inventory</a></td>
                </div>    
        </tr>
          
        </tbody>
    </table>
     
</div> <br>
<?php }
include('./footer.php');
?>
