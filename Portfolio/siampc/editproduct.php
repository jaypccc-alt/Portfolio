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
    echo "Cannot Load Member Details";
} else {

    $row = mysqli_fetch_array($result);
    $getSupplier=$row['supplier'];
    $getCode=$row['code'];
    $getItemCategory=$row['itemcategory'];
    $getItemDescription=$row['itemdescription'];
    $getUnitPrice=$row['unitprice'];
    $getSellingPrice=$row['sellingprice'];
    $getQtyOn=$row['qtyon'];
    $getAmount=$row['amount'];
    $getNotes=$row['notes'];
    ?>

    <?php

    if(isset($_POST['submit'])){

        
        if($error !=""){

            $error= '<div class="text-danger" role="alert">Some fields are blank</div>';
        }


       else {


                $icode = mysqli_real_escape_string($link,$_POST['Ucode']);
                $iitemdescription=mysqli_real_escape_string($link,$_POST['Uitemdescription']);
                $iunitprice=mysqli_real_escape_string($link,$_POST['Uunitprice']);
                $isellingprice=mysqli_real_escape_string($link,$_POST['Usellingprice']);
                $iqtyon=mysqli_real_escape_string($link,$_POST['Uqtyon']);
                $iamount=$iqtyon * $iunitprice;
                $inotes=mysqli_real_escape_string($link,$_POST['Unotes']);
                $isupplier=mysqli_real_escape_string($link,$_POST['Usupplier']);
                $iitemcategory=mysqli_real_escape_string($link,$_POST['Uitemcategory']);


                $Uquery = "UPDATE `inventory`  

                    SET  `supplier`= '$isupplier',
                         `code`= '$icode',
                         `itemcategory`= '$iitemcategory'
                        ,`itemdescription`='$iitemdescription'
                        ,`unitprice` = '$iunitprice'
                        ,`sellingprice` = '$isellingprice'
                        ,`qtyon` = '$iqtyon'
                        ,`amount` = '$iamount'
                        ,`notes` = '$inotes'      
                   
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
            <h3 style="padding-left: 109px;">Edit Product Details</h3>
            <?php echo $notification; ?>
            <?php echo $error; ?>
            <?php echo $error1; ?>
        </div>
        <div class="col-sm-4">

            <a href="product.php">Return to Products page.</a><br>
        
        </div>

    </div>
    <section id="customer-details"><br>
        <p class="account-category font-weight-bold">Product Details</p><br>
        <form method="POST">
             <div class="row"> <!-- row 1 -->

                <div class="col">

                    <label>Supplier</label>
                    <input type="text" class="form-control" name="Usupplier" id="Usupplier" value='<?php echo $getSupplier;?>'> <br>                                     
                </div>


            </div> <!-- end of row 1 -->
            <div class="row"> <!-- row 1 -->

                <div class="col">

                    <label>Code</label>
                    <input type="text" class="form-control" name="Ucode" id="Ucode" value='<?php echo $getCode;?>'> <br>                                     
                </div>


            </div> <!-- end of row 1 -->
             <div class="row"> <!-- row 1 -->
                <div class="col">
                    <label>Item Description</label>
                    <input type="text" class="form-control" name="Uitemdescription" id="Uitemdescription" value='<?php echo $getItemDescription; ?>'> <br>

                </div> 


                


            </div> <!-- end of row 1 -->

            <div class="row"><!-- row 2 -->
                <div class="col">

                    <label>Item Category</label><br>
                    <Select type="text" class="form-control" name="Uitemcategory" id="Uitemcategory" value='<?php echo $getItemCategory;?>'>
                    <option>*-Choose-*</option>
                    <option>Chemicals</option>
                    <option>Fertilizer</option>
                    <option>Rice</option>
                    <option>BY. Products</option>
                    <option>Palay Seeds</option>
                    <option>Palay</option>
                    <option>Others</option>
                    </select>                                      
                </div>

                 <div class="col-sm-4">
                    <label>Unit Price</label><br>
                    <input type="text" class="form-control" name="Uunitprice" id="Uunitprice" value='<?php echo $getUnitPrice; ?>'><br>
                </div>

                 <div class="col-sm-4">
                    
                    <label>Selling Price</label><br>
                    <input type="text" class="form-control" name="Usellingprice" id="Usellingprice" value='<?php echo $getSellingPrice; ?>'><br>
                </div>

                <div class="col-sm-4">
                    
                    <label>Product Quantity</label><br>
                    <input type="text" class="form-control" name="Uqtyon" id="Uqtyon" value='<?php echo $getQtyOn; ?>'><br>
                </div>


                <div class="col-sm-4">
                    
                    <label>Notes</label><br>
                    <input type="text" class="form-control" name="Unotes" id="Unotes" value='<?php echo $getNotes; ?>'><br>
                </div>

            </div> <!-- end of row 2-->
            
            <input type="submit" name="submit" value="submit" class="btn btn-primary" style="float: right;">
        </form>
    </section>

</div> <br>
<?php
include('./footer.php');
?>
