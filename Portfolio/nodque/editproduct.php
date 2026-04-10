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
FROM `products` 
WHERE `id`='$getProductId'";


include('connection.php');
$result=mysqli_query($link,$productFullDetailsQuery);


if(!$result)
    {
        echo "Cannot Load Inventory Details";
    } 
    else 
        {
            $row = mysqli_fetch_array($result);
            $getId=$row['id'];
            $getProductName=$row['product'];
            $getProductBrand=$row['brand'];
            $getProductDescription=$row['stock'];
            $getStock=$row['price'];
            ?>

            <?php
            

            if(isset($_POST['submit'])){

        
        if($error !=""){

            $error= '<div class="text-danger" role="alert">Some fields are blank</div>';
        }

                else 
                    {
                        $iproductname=mysqli_real_escape_string($link,$_POST['Uproduct']);
                        $iproductbrand=mysqli_real_escape_string($link,$_POST['Ubrand']);
                        $iproductdescription=mysqli_real_escape_string($link,$_POST['Ustock']);
                        $istock=mysqli_real_escape_string($link,$_POST['Uprice']);
                    
                        $Uquery = "UPDATE `products`  

                            SET 
                            `product`='$iproductname'
                                ,`brand` = '$iproductbrand'
                                ,`stock` = '$iproductdescription'
                                ,`price` = '$istock'      
                        
                            WHERE `id` = '$getProductId' ";

                                        include('connection.php');

                                        if(mysqli_query($link, $Uquery))
                                        {
                                            $notification = '<div class="text-primary" role="alert"><span id="notifyUpdate">Update Successful!</span></div>';
                                        } 
                                        else {
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
            <h3 style="padding-left: 109px;">Edit Product Details</h3>
            <?php echo $notification; ?>
            <?php echo $error; ?>
            <?php echo $error1; ?>
        </div>
        <div class="col-sm-4">
            <td><a class="btn btn-danger" href="delete.php">Delete this Product</a></td>
        </div>

    </div>
    <section id="customer-details"><br>
        <p class="account-category font-weight-bold">Inventory Details</p><br>
        <form method="POST">
            <div class="row"> <!-- row 1 -->

                <div class="col">

                    <label>ID: </label>
                 
                    <td><?php echo $getId; ?></td>                                   
                </div>


            </div> <!-- end of row 1 -->

            <div class="row"><!-- row 2 -->
                <div class="col-sm-4">
                    <label>Product Name</label><br>
                    <input type="text" class="form-control" name="Uproduct" id="Uproduct" value='<?php echo $getProductName; ?>'>
                </div>

                 <div class="col-sm-4">
                    <label>Product Brand</label><br>
                    <input type="text" class="form-control" name="Ubrand" id="Ubrand" value='<?php echo $getProductBrand; ?>'><br>
                </div>

                 <div class="col-sm-4">
                    
                    <label>Product Description</label><br>
                    <input type="text" class="form-control" name="Ustock" id="Ustock" value='<?php echo $getProductDescription; ?>'><br>
                </div>

                <div class="col-sm-4">
                    
                    <label>Stock</label><br>
                    <input type="text" class="form-control" name="Uprice" id="Uprice" value='<?php echo $getStock; ?>'><br>
                </div>

            </div> <!-- end of row 2-->
            <td><a class="btn btn-primary" href="products.php">Go to Products</a></td>
            <input type="submit" name="submit" class="btn btn-success" value="submit" class="btn btn-primary" style="float: right;">
        </form>
    </section>

</div> <br>
<?php
include('./footer.php');
?>
