<?php
        include('header.php');

        session_start();

        if(empty($_SESSION['id'])):
            header('Location:./index.php');
        endif;

        if(array_key_exists("id", $_COOKIE)) {

            $_SESSION['id'] = $_COOKIE['id'];
}

                include('connection.php');
                

?>
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
                <a href="#.php" class="badge bg-info my-badge">Empty</a>
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
                        <h2 style="padding-left: 30px;">Inventory</h2>
                        <?php echo @$_GET['Updates']; ?>

                    </div>
                </div>

                <div class="col" style="padding-top: 40px;">
                    <!-- Empty 3rd Column-->
                </div> <!-- End of Third Column-->

            </div>
        </div>

    </section>
    
    <br>

    <section id="filter-section">
        <div class="container">
            <div class="row">

                 <div class="col">
                
                    <a class="btn btn-primary" href="excel.php" role="button">Convert to Excel</a>
                </form>


            </div>

            <div class="col">
                
                    <a class="btn btn-primary" href="search.php" role="button">Search Inventory</a>
                </form>

                <a  role="button" class="btn btn-primary" href="purchaseinventory.php">Purchase Inventory</a>



            </div>

                <div class="col">
                    <a class="btn btn-primary" href="addproduct.php" role="button">Add Products</a>
                </div>


              

                


            </div>
    </section>

    <br>
    <table class="table table-bordered table-hover table-sm" id="mytable">
        <thead>
        <tr>
            <!--<th scope="col"><h6>Image</h6></th>-->
            
            <th scope="col"><h6>Supplier </h6></th>
            <th scope="col"><h6>Code</h6></th>
            <th scope="col"><h6>Item Category</h6></th>
            <th scope="col"><h6>Item Description</h6></th>
            <th scope="col"><h6>Unit Price</h6></th>
            <th scope="col"><h6>Selling Price</h6></th> 
            <th scope="col"><h6>QTY on</h6></th>
            <th scope="col"><h6></h6>Product Amount</th>           
            <th scope="col"><h6>Notes</h6></th>
            <th scope="col"><h6>Details </h6></th>


        </tr>
        </thead>
        <tbody></tbody>
     <tfoot>
      <tr>
        <th colspan="7">Total Product Amount</th>
        <th>
             <?php 

       $tresult = "SELECT sum(amount) FROM inventory";
       $tamount = mysqli_query($link, $tresult);
       while($rows = mysqli_fetch_array($tamount)){
        ?><?php echo $rows['sum(amount)'];
       }

       
      


       


       ?>
        </th>
       

      </tr>
     </tfoot>




 
    





</div>

<?php
include('connection.php');
$displayInventory= "SELECT `id`,`supplier`,`code`,`itemcategory`,`itemdescription`,`unitprice`,`sellingprice`,`qtyon`,`amount`,`notes` FROM `inventory`";


$result=mysqli_query($link,$displayInventory);
while($row = mysqli_fetch_array($result)){
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
    <tr>
        
        <td><?php echo $getSupplier; ?></td>
        <td><?php echo $getCode; ?></td>
        <td><?php echo $getItemCategory; ?></td>
        <td><?php echo $getItemDescription; ?></td>
        <td><?php echo $getUnitPrice; ?></td>
        <td><?php echo $getSellingPrice; ?></td>
        <td><?php echo $getQtyOn; ?></td>
        <td><?php echo $getAmount; ?></td>
        <td><?php echo $getNotes; ?></td>


        <td><a href="productfulldetails.php?Details=<?php echo "$getId";?>">Details</a></td>

    </tr>

    <div class="container box container-gap"> </div>




<?php }




include('footer.php');
?>
