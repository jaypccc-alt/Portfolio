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
$sql = "SELECT * FROM members";


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
                <a href="addproducts.php" class="badge bg-danger my-badge">Addproducts</a>
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
                        <h3 style="padding-left: 55px;">Members</h3>
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
                
                    <a class="btn btn-primary" href="excelmembers.php" role="button">Convert to Excel</a>
                </form>


            </div>

            <div class="col">
                
                    <a class="btn btn-primary" href="searchmembers.php" role="button">Search Members</a>
                </form>


            </div>

                <div class="col">
                    <a class="btn btn-primary" href="testaddmemberpage.php" role="button">Add Members</a>
                </div>

               


            </div>
    </section>
    <br>
    <table class="table table-bordered table-hover table-sm" id="mytable">
        <thead>
        <tr>
            <!--<th scope="col"><h6>Image</h6></th>-->
            <th scope="col"><h6>Account Number </h6></th>
            <th scope="col"><h6>Member Full Name</h6></th>
            <th scope="col"><h6>Address</h6></th>
            <th scope="col"><h6>Birthday</h6></th>
            <th scope="col"><h6>Gender</h6></th>
            <th scope="col"><h6>Occupation</h6></th>
            <th scope="col"><h6>Civil Status</h6></th>
            <th scope="col"><h6>mobile no. 1</h6></th>
            <th scope="col"><h6>mobile no. 2</h6></th>
            <th scope="col"><h6>Landline</h6></th>
            <th scope="col"><h6>CBU</h6></th>
            <th scope="col"><h6>Tin</h6></th>
            <th scope="col"><h6>CBU last Update</h6></th>
            <th scope="col"><h6>ARB</h6></th>
            <th scope="col"><h6>RSBSA</h6></th>
            <th scope="col"><h6>Account Status</h6></th>





        </tr>
        </thead>
</div>


<?php
include('connection.php');
$displayMembers= "SELECT `id`,`acct`,`address`,`bday`,`cstatus`,`gender`,`mobile`,`mobile2`,`telephone`,`occupation`, `cbu`, `tin`, `cbudateupdate`, `arb`, `rsbsa`, `acctstatus`, CONCAT(`fname` ,' ',`mname`,' ', `lname`, `suffix`)
AS `membername` 
FROM `members`";


$result=mysqli_query($link,$displayMembers);
while($row = mysqli_fetch_array($result)){
    $getMemberId=$row['id'];
    $getAcct=$row['acct'];
    $getMemberName=$row['membername'];
    $getMobile=$row['mobile'];
    $getMobile2=$row['mobile2'];
    $getTelephone=$row['telephone'];
    $getAddress=$row['address'];
    $getCstatus=$row['cstatus'];
    $getGender=$row['gender'];
    $getOccupation=$row['occupation'];
    $getBday=$row['bday'];
    $getCbu=$row['cbu'];
    $getTin=$row['tin'];
    $getCbuupdate=$row['cbudateupdate'];
    $getArb=$row['arb'];
    $getRsbsa=$row['rsbsa'];
    $getAcctstat=$row['acctstatus'];

   
   
   




    ?>
    <tr>
        <td><?php echo $getAcct; ?></td>
        <td><?php echo $getMemberName; ?></td>
        <td><?php echo $getAddress; ?></td>
        <td><?php echo $getBday; ?></td>
        <td><?php echo $getGender; ?></td>
        <td><?php echo $getOccupation; ?></td>
        <td><?php echo $getCstatus; ?></td>
        <td><?php echo $getMobile; ?></td>
        <td><?php echo $getMobile2; ?></td>
        <td><?php echo $getTelephone; ?></td>
        <td><?php echo $getCbu; ?></td>
        <td><?php echo $getTin ;?></td>
        <td><?php echo $getCbuupdate ;?></td>
        <td><?php echo $getArb;?></td>
        <td><?php echo $getRsbsa ;?></td>
        <td><?php echo $getAcctstat ;?></td>

       
       
      


        <td><a href="sce.php?Details=<?php echo "$getMemberId";?>">SCE</a></td>
        <td><a href="memberfulldetails.php?Details=<?php echo "$getMemberId";?>">Details</a></td>
    </tr>
<?php }
include('footer.php');
?>
