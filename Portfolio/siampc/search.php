<?php
        include('header.php');
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
                        <h3 style="padding-left: 55px;">Search Product</h3>
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
             
            </div>

   

            
        <form method="POST">
        <input type="text" placeholder="Search Supplier/Category" name="search">
        <button class="btn btn-primary btn-sm" name="submit"> SEARCH</button>

         
        
    </form>
    <div class="container my-5">
        <table class="table">
            <div class="row">

                <div class="col">
    <form method="POST" action="searchexcel.php">
        <input type="hidden" name="search" value="<?php echo $_POST['search']; ?>">
        <button class="btn btn-primary" type="submit" name="submit">Convert to Excel</button>
    </form>
    <a href="product.php" class="btn btn-primary float-right">Back to Products</a>
</div>
            <?php 


            if(isset($_POST['submit'])){
                $search=$_POST['search'];
                $sql="SELECT * FROM `inventory`  WHERE id like '%$search%' or supplier like '%$search%' or itemcategory like '%$search%' or itemdescription like '%$search%'";
                $result=mysqli_query($link,$sql);
                if($result){
                   if(mysqli_num_rows($result)>0){
                    echo '<thead> 
                    <tr>
                    <th>ID no.</th>
                    <th>Supplier</th>
                    <th>Code</th>
                    <th>Item category</th>
                    <th>Item description</th>
                    <th>Unit price</th>
                    <th>Selling price</th>
                    <th>QTY on</th>
                    <th>Product Amount</th>
                    <th>Notes</th>

                    
                    </tr>
                    </thead>

      
       

     
     


                    

                    ';
                    while($row=mysqli_fetch_assoc($result)){
                    echo '<tbody>
                    <tr>
                    <td><a href="searchfulldetails.php?Data='.$row['id'].'">'.$row['id'].'</a></td>
                    <td>'.$row['supplier'].'</td>
                    <td>'.$row['code'].'</td>
                    <td>'.$row['itemcategory'].'</td>
                    <td>'.$row['itemdescription'].'</td>
                    <td>'.$row['unitprice'].'</td>
                    <td>'.$row['sellingprice'].'</td>
                    <td>'.$row['qtyon'].'</td>
                    <td>'.$row['amount'].'</td>
                    <td>'.$row['notes'].'</td>

                    

                    </tr>
                    </tbody>

                    ';
                }
                   } else{
                    echo '<h2 class=:text-danger> Data not found</h2>';
                   }

                 }
            
            $sql= "SELECT sum(amount) as sum FROM inventory WHERE id like '%$search%' or supplier like '%$search%' or itemcategory like '%$search%' or itemdescription like '%$search%'";
            $tresult = mysqli_query($link, $sql);
            if(mysqli_num_rows($tresult)>0);
            while($rows =mysqli_fetch_assoc($tresult)){
                echo '<tfoot> 
            <tr>
            <th> Total Product Amount : </th>
            <th> '.$rows['sum'].' </th>

             </tr>
            </tfoot>';
            

              
            }

       

        }

            ?>




        </table>

    </div>



    
    </section>
