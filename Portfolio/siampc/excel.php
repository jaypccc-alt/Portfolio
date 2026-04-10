<?php
    include('./header.php');
    include('connection.php');

    
?>  

<div>
    <div class="text-center">
     
        <a href="export.php" class="btn btn-primary" target="_blank">Convert to Excel</a> <br>

        <th style="border:2px solid black;"><?php
// Set the default time zone to the current location
date_default_timezone_set('Asia/Manila');

// Create a new DateTime object with the current date and time
$datetime = new DateTime();

// Output the date and time in Philippine time zone
echo  $datetime->format('Y-m-d H:i:s');
?>
 </th>
    <table class="table table-bordered table-hover table-sm" id="mytable">


        <thead>
            <tr>
                <th style="border:2px solid black;">Supplier</th>
                <th style="border:2px solid black;">Code</th>
                <th style="border:2px solid black;">Item Category</th>
                <th style="border:2px solid black;">Item Description</th>
                <th style="border:2px solid black;">Unit Price</th>
                <th style="border:2px solid black;">Selling Price</th>
                <th style="border:2px solid black;">QTY. on</th>
                <th style="border:2px solid black;">Amount</th>
                <th style="border:2px solid black;">Notes</th>

            </tr>
        </thead>
        

        <tbody>
            <?php 
            $sn = 1;
            $query = "SELECT * FROM inventory";
            $result=mysqli_query($link, $query);
            while($productdata=mysqli_fetch_assoc($result)){
                ?>
                <tr>
                    
                    <td style="border:2px solid black;"><?php echo $productdata['supplier']; ?></td>
                    <td style="border:2px solid black;"><?php echo $productdata['code']; ?></td>
                    <td style="border:2px solid black;"><?php echo $productdata['itemcategory']; ?></td>
                    <td style="border:2px solid black;"><?php echo $productdata['itemdescription']; ?></td>
                    <td style="border:2px solid black;"><?php echo $productdata['unitprice']; ?></td>
                    <td style="border:2px solid black;"><?php echo $productdata['sellingprice']; ?></td>
                    <td style="border:2px solid black;"><?php echo $productdata['qtyon']; ?></td>
                    <td style="border:2px solid black;"><?php echo $productdata['amount']; ?></td>
                    <td style="border:2px solid black;"><?php echo $productdata['notes']; ?></td>
                </tr>
                <?php
                $sn++;
            }

            ?>
        </tbody>
          <tbody></tbody>
     <tfoot>
      <tr>
        <th colspan="7" style="border:2px solid black;">Total Product Amount</th>
        <th style="border:2px solid black;">
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
    </table>

    
        
    </div>
</div>

    