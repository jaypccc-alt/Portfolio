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
                        <h3 style="padding-left: 55px;">Search Members</h3>
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
            
        <form method="POST">
        <input type="text" placeholder="Search" name="search">
        <button class="btn btn-primary btn-sm" name="submit"> SEARCH</button>

        
    </form>
    <div class="container my-5">
        <form method="POST" action="searchmembersexcel.php">
    <input type="hidden" name="search" value="<?php echo $_POST['search']; ?>">
    <button class="btn btn-primary" type="submit" name="submit">Convert to Excel</button>
</form>
        <table class="table">
            <?php 

            if(isset($_POST['submit'])){
                $search=$_POST['search'];
                $sql="SELECT * FROM `members` WHERE id like '%$search%' or acct like '%$search%' or fname like '%$search%' or lname like '%$search%' or address like '%$search%'";
                $result=mysqli_query($link,$sql);
                if($result){
                   if(mysqli_num_rows($result)>0){
                    echo '<thead> 
                    <tr>
                    <th>ID no.</th>
                    <th>Acct no.</th>
                    <th>First name</th>
                    <th>Middle name</th>
                    <th>Last Name</th>
                    <th>Gender</th>
                    <th>Address</th>
                    <th>Mobile</th>
                    <th>Mobile 2</th>
                    <th>Telephone</th>
                    <th>Occupation</th>
                    <th>Birthday</th>
                    <th>Account Status</th>
                    <th>CBU</th>
                    <th>TIN </th>
                    <th>CBU last update</th>
                    <thARB</th>
                    <th>RSBSA</th>

                    
                    
                   

                    
                    </tr>
                    </thead>
                    ';
                    while($row=mysqli_fetch_assoc($result)){
                    echo '<tbody>
                    <tr>
                    <td><a href="searchmemberfulldetails.php?Data='.$row['id'].'">'.$row['id'].'</a></td>
                    <td>'.$row['acct'].'</td>
                    <td>'.$row['fname'].'</td>
                    <td>'.$row['mname'].'</td>
                    <td>'.$row['lname'].'</td>                   
                    <td>'.$row['gender'].'</td>
                    <td>'.$row['address'].'</td>
                    <td>'.$row['mobile'].'</td>
                    <td>'.$row['mobile2'].'</td>
                    <td>'.$row['telephone'].'</td>
                    <td>'.$row['occupation'].'</td>
                    <td>'.$row['bday'].'</td>
                    <td>'.$row['acctstatus'].'</td>
                    <td>'.$row['cbu'].'</td>
                    <td>'.$row['tin'].'</td>
                    <td>'.$row['cbudateupdate'].'</td>
                    <td>'.$row['arb'].'</td>
                    <td>'.$row['rsbsa'].'</td>
                   
                    


                    

                    </tr>
                    </tbody>
                    ';
                }
                   } else{
                    echo '<h2 class=:text-danger> Data not found</h2>';
                   }

                 }
            }

            ?>



        </table>

    </div>



    
    </section>
