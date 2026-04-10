<?php
include('./header.php');
include('connection.php');
?>



<html>
<head>
   
    <title>Print</title>
    <style type="text/css" media="print">
        @media print{
            .noprint, .noprint *{
                display: none; !important;
            }
        }
    </style>

</head>
<body onload="print()">
    <div class="container">
            <center>
             <h3 style="margin-top: 30px;">Product List</h3>
            <h3>


            </center>
         <table id="ready" class="table table-striped table-bordered" style="width:100%;">
            <thead>
                <tr>
                    <th>Supplier</th>
                    <th>Code</th>
                    <th>Item Category</th>
                    <th>Item Description</th>
                    <th>Unit Price</th>
                    <th>Selling Price</th>
                    <th>QTY on</th>
                    <th>Product Amount</th>
                    <th>Notes</th>
                </tr>
            </thead>
            <tbody>
                
                <?php 
                 $get_product_list = mysqli_query($link, "SELECT * FROM inventory");
                 while($row = mysqli_fetch_array($get_product_list)){
                    ?>
                    <tr>
                        <td><?php echo $row['supplier']?></td>
                        <td><?php echo $row['code']?></td>
                        <td><?php echo $row['itemcategory']?></td>
                        <td><?php echo $row['itemdescription']?></td>
                        <td><?php echo $row['unitprice']?></td>
                        <td><?php echo $row['sellingprice']?></td>
                        <td><?php echo $row['qtyon']?></td>
                        <td><?php echo $row['amount']?></td>
                        <td><?php echo $row['notes']?></td>
                    </tr>

                    <?php 

                 }
                ?>
            </tbody>
        </table>
     </div>
     <div>
         <button type="" class="btn btn-info noprint" style="width:100%" onclick="window.location.replace('product.php');">CANCEL PRINTING</button>
     </div>
    
        

    </body>
    </html>
