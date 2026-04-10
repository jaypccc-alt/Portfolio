<?php
include('./header.php');
?>

<?php



        $getProductId=$_GET['Data'];
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

<div class="container">
    <br>
    <div class="row">
        <div class="col-sm-4">       
        
 
        </div>

        <div class="col-sm-4">            
            <a href="#"><img src="./img/test.jpg" id="acctlogo" style="padding-left: 0;margin-left: 40px; height: 170px;"></a>
        </div>

       <div class="col-sm-4">
           <a href="editproduct.php?Update=<?php echo "$getProductId";?>">Edit Product</a><br>
           <a href="product.php">Back to Products</a><br>
           <a href="deleteproduct.php?Pid=<?php echo "$getId";?>" onclick="return confirm('Are You Sure ?')">Delete Product</a>
        </div>
    
     </div>

     <section id="customer-details"><br>
        <p class="account-category font-weight-bold">Product Details</p><br>
        <div class="row">
            <div class="col-sm-4">              
               
               <label>Supplier :</label>
                <?php echo $getSupplier.""; ?> <br>             
               
            </div>

            <div class="col-sm-4">              
               
               <label>Code :</label>
                <?php echo $getCode.""; ?> <br>             
               
            </div>

             <div class="col-sm-4">              
               
               <label>Item Category :</label>
                <?php echo $getItemCategory.""; ?> <br>             
               
            </div>


            <div class="col-sm-4">              
                <p></p>
                <label>Item Description :</label>
                <?php echo $getItemDescription.""; ?> <br>    

                 <p> </p>

                <?php 
                
                

                ?> <br>
       
            </div>
            <div class="col-sm-4">
                 <p></p>

                <label>Unit Price :</label>
                <?php echo $getUnitPrice; ?><br>
                
            </div>

            <div class="col-sm-4">
                 <p></p>

                <label>Selling Price :</label>
                <?php echo $getSellingPrice; ?><br>
                
            </div>

            <div class="col-sm-4">

                <label>Product Quantity :</label>
                <?php echo $getQtyOn; ?><br>
                
            </div>

            <div class="col-sm-4">

                <label>Product Amount :</label>
                <?php echo $getAmount; ?><br>
                
            </div>

            <div class="col-sm-4">

                <label>Notes :</label>
                <?php echo $getNotes; ?><br>
                
            </div>

        </div>        
     </section>   <br>

     
</div> <br>
<?php }
include('./footer.php');
?>