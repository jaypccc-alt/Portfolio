<?php
include('./header.php');

$error = isset($error) ? $error : '';
$error1 = isset($error1) ? $error1 : '';
$notification = isset($notification) ? $notification : '';
?>

<?php

$getProductId=$_GET['Update'];

$productFullDetailsQuery="
SELECT * 
FROM `inventory` 
WHERE `id`='$getProductId'";


include('connection.php');
$result=mysqli_query($link,$productFullDetailsQuery);

if(!$result){
    echo "Cannot Load Inventory Details";
} else {
    $row = mysqli_fetch_array($result);
    $getId=$row['id'];
    $getProductName=$row['productname'];
    $getProductBrand=$row['productbrand'];
    $getProductDescription=$row['productdescription'];
    $getStock=$row['stock'];
    ?>

    <?php

    if(isset($_POST['submit'])){

        
        if($error !=""){

            $error= '<div class="text-danger" role="alert">Some fields are blank</div>';
        }


       else {


                $iid = mysqli_real_escape_string($link,$_POST['Uid']);
                $iproductname=mysqli_real_escape_string($link,$_POST['Uproductname']);
                $iproductbrand=mysqli_real_escape_string($link,$_POST['Uproductbrand']);
                $iproductdescription=mysqli_real_escape_string($link,$_POST['Uproductdescription']);
                $istock=mysqli_real_escape_string($link,$_POST['Ustock']);
            

                $Uquery = "UPDATE `inventory`  

                    SET `id`= '$iid'
                        ,`productname`='$iproductname'
                        ,`productbrand` = '$iproductbrand'
                        ,`productdescription` = '$iproductdescription'
                        ,`stock` = '$istock'      
                   
                     WHERE `id` = '$getProductId' ";

                                include('connection.php');

                                if(mysqli_query($link, $Uquery)){

                                    $notification = '<div class="text-primary" role="alert"><span id="notifyUpdate">Update Successful!</span></div>';
                                    

                                } else {

                                    $error = '<div class="text-warning" role="alert">Update Failed!</div>'. mysqli_error($link);
                                    $error1 = '<div class="text-warning" role="alert">Error Code</div>' .mysqli_errno($link);

                                }
                      
                            }
                        }
                    }

?>

<div class="container">
    <br>
    <div class="row">
        <div class="col-sm-4">
            <h3>
                <!-- A php script was remove here that displays who created the member -->
              

            </h3>
        </div>
        <div class="col-sm-4">
            <a href="#"><img src="./img/test.jpg" id="acctlogo"></a>
            <h3 style="padding-left: 109px;">Edit Inventory Details</h3>
            <?php echo $notification; ?>
            <?php echo $error; ?>
            <?php echo $error1; ?>
        </div>
        <div class="col-sm-4">
            <a href="inventory.php">Back to Inventory</a>
                    
        </div>

    </div>
    <section id="customer-details"><br>
        <p class="account-category font-weight-bold">Inventory Details</p><br>
        <form method="POST">
            <div class="row"> <!-- row 1 -->

                <div class="col">

                    <label>ID</label>
                    <input type="text" class="form-control" name="Uid" id="Uid" value='<?php echo $getId; ?>'> <br>                                     
                </div>


            </div> <!-- end of row 1 -->

            <div class="row"><!-- row 2 -->
                <div class="col-sm-4">
                    <label>Product Name</label><br>
                    <input type="text" class="form-control" name="Uproductname" id="Uproductname" value='<?php echo $getProductName; ?>'>
                </div>

                 <div class="col-sm-4">
                    <label>Product Brand</label><br>
                    <input type="text" class="form-control" name="Uproductbrand" id="Uproductbrand" value='<?php echo $getProductBrand; ?>'><br>
                </div>

                 <div class="col-sm-4">
                    
                    <label>Product Description</label><br>
                    <input type="text" class="form-control" name="Uproductdescription" id="Uproductdescription" value='<?php echo $getProductDescription; ?>'><br>
                </div>

                <div class="col-sm-4">
                    
                    <label>Stock</label><br>
                    <input type="text" class="form-control" name="Ustock" id="Ustock" value='<?php echo $getStock; ?>'><br>
                </div>

            </div> <!-- end of row 2-->
            
            <input type="submit" name="submit" value="submit" class="btn btn-primary" style="float: right;">
        </form>
    </section>

</div> <br>
<?php
include('./footer.php');
?>
