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
                   <!--     <h3 style="padding-left: 55px;">Filter and Search</h3>-->

                    </div>
                </div>

                <div class="col" style="padding-top: 40px;">
                    <!-- Empty 3rd Column-->
                </div> <!-- End of Third Column-->

            </div>
        </div>

    </section>
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
                echo "<tbody>";
                echo "<tr>";
                echo "<td>".$row['acct']."</td>";
                echo "<td>".$row['fname']."</td>";
                echo "<td>".$row['mname']."</td>";
                echo "<td>".$row['address']."</td>";
                echo "<td>".$row['bday']."</td>";
                echo "<td>".$row['cstatus']."</td>";
                echo "<td>".$row['gender']."</td>";
                echo "<td>".$row['mobile']."</td>";
                echo "<td>".$row['tin']."</td>";
                echo "<td>".$row['available']."</td>";
                echo "<td>".$row['current']."</td>";
                echo "<td>".$row['bsector']."</td>";

                echo "</tr>";
                echo "</tbody>";
            }

        } else{

            echo "no results found";
        }
    }
}





?>

        <section id="filter-section">
            <div class="container">
                <div class="row">

                    <div class="col">

                    </div>

                    <div class="col">
                        <form name="filter-form" method="POST" action="sce.php">
                            <label for="search_box">Search</label>
                            <input type="text" name="search" id="search" value="">
                            <input type="submit" name="submit">
                        </form>
                    </div>

                    <div class="col">

                    </div>

                </div>
        </section> <br>

<?php
include('footer.php');
?>

