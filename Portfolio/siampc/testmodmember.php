<?php
include('header.php');

?>
<section id="sidepanel">
    <div class="container" id="sidepanel-container" style="margin-top: -1px;">
        <div id="sidepanel-content">
            <div id="sidepanel-title">
                <p id="sidepanel-menu">Menu</p>
            </div>
            <div id="sidepanel-body">
                <a href="members.php" class="badge badge-primary my-badge">Members</a>
                <a href="testaddmemberpage.php" class="badge badge-info my-badge">Add member</a>
                <a href="sce.php" class="badge badge-success my-badge">SCE</a>
                <a href="#.php" class="badge badge-danger my-badge">Empty</a>
                <a href="#.php" class="badge badge-warning my-badge">Empty</a>
                <a href="#.php" class="badge badge-info my-badge">Empty</a>
                <a href="#.php" class="badge badge-warning my-badge">Empty</a>
                <a href="#.php" class="badge badge-dark my-badge">Empty</a>
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



    <br>
    <table class="table table-bordered table-hover table-sm" id="mytable">
        <thead>
        <tr>
            <!--<th scope="col"><h6>Image</h6></th>-->
            <th scope="col"><h6>Account Number </h6></th>
            <th scope="col"><h6>First Name</h6></th>
            <th scope="col"><h6>Middle Name</h6></th>
            <th scope="col"><h6>Last Name</h6></th>
            <th scope="col"><h6>Address</h6></th>
            <th scope="col"><h6>Civil Status</h6></th>
            <th scope="col"><h6>Gender</h6></th>
            <th scope="col"><h6>Mobile</h6></th>
            <th scope="col"><h6>T.I.N</h6></th>
            <th scope="col"><h6>Available</h6></th>
            <th scope="col"><h6>Current</h6></th>
            <th scope="col"><h6>Business Sector </h6></th>
            <th scope="col"><h6>Transaction</h6></th>
            <th scope="col"><h6>Details</h6></th>

        </tr>
        </thead>
</div>


<?php

$error = isset($error) ? $error : '';
$notification = isset($notification) ? $notification : '';

if(array_key_exists("submit", $_POST)){


    include('connection.php');


    if(!$_POST['search']){

        $error = '<div class="alert alert-danger">Search field is empty!</div>';

    } else

    {
        $searchString = "";

        $searchString = mysqli_real_escape_string($link, $_POST['search']);
        $query = "SELECT * FROM `members` WHERE `fname` LIKE '%$searchString%' OR `mname` LIKE '%$searchString%' OR `lname` LIKE '%$searchString%' OR `address` LIKE '%$searchString'";
        $result = mysqli_query($link, $query);
        $queryResult = mysqli_num_rows($result);

        $notification = '<div class="alert alert-success">There are '.$queryResult.' result(s)!</div>';

        //echo "There are ".$queryResult." result(s)!";

        if($queryResult > 0 ){
            while($row = mysqli_fetch_assoc($result)){

    $getMemberId=$row['id'];
    $getAcct=$row['acct'];
    $getFname=$row['fname'];
    $getMname=$row['mname'];
    $getLname=$row['lname'];
    $getMobile=$row['mobile'];
    $getAddress=$row['address'];
    $getCstatus=$row['cstatus'];
    $getGender=$row['gender'];
    $getMobile=$row['mobile'];
    $getTin=$row['tin'];
    $getAvailable=$row['available'];
    $getCurrent=$row['current'];
    $getBsector=$row['bsector'];




    ?>
    <tr>
        <td><?php echo $getAcct; ?></td>
        <td><?php echo $getFname; ?></td>
        <td><?php echo $getMname; ?></td>
        <td><?php echo $getLname; ?></td>
        <td><?php echo $getAddress; ?></td>
        <td><?php echo $getCstatus; ?></td>
        <td><?php echo $getGender; ?></td>
        <td><?php echo $getMobile; ?></td>
        <td><?php echo $getTin; ?></td>
        <td><?php echo $getAvailable; ?></td>
        <td><?php echo $getCurrent; ?></td>
        <td><?php echo $getBsector; ?></td>


        <td><a href="sce.php?Details=<?php echo "$getMemberId";?>">SCE</a></td>
        <td><a href="memberfulldetails.php?Details=<?php echo "$getMemberId";?>">Details</a></td>
    </tr>

<?php }}}}
// include('footer.php');
?>

<section id="filter-section">
    <div class="container">
        <div class="row">

            <div class="col">

            </div>

            <div class="col">
                <form name="filter-form" method="POST" action="testmodmember.php">
                    <label for="search_box">Search</label>
                    <input type="text" name="search" id="search" value="">
                    <input type="submit" name="submit">
                </form>
            </div>

            <div class="col">

            </div>

        </div>
</section>
    <br>
<?php
include('footer.php');
?>