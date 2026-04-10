
<?php
include('header.php');
session_start();

    if(empty($_SESSION['id'])):
    header('Location:./index.php');
    endif;

    if(array_key_exists("id", $_COOKIE)) {

        $_SESSION['id'] = $_COOKIE['id'];

    }
?>
<?php
include('connection.php');

$error="";
$notification="";

if(isset($_POST['submit'])){

        if(!$_POST['customer']){

            $error = '<div class="alert alert-danger" role="alert">Please select customer name</div>';
           
        } 

        if(!$_POST['truck']){

            $error = '<div class="alert alert-danger" role="alert">Please select your truck</div>';

        } 

        if(!$_POST['dname']){

            $error = '<div class="alert alert-danger" role="alert">Please select your truck driver</div>';

        } 

       
        if(!$_POST['help']){

            $error = '<div class="alert alert-danger" role="alert">Please choose at least one helper</div>';

        } 

        if(!$_POST['com']){

            $error = '<div class="alert alert-danger" role="alert">Please select Commodities</div>';

        } 

        if(!$_POST['to']){

            $error = '<div class="alert alert-danger" role="alert">Please select Origin</div>';

        } 

        if(!$_POST['tdest']){

            $error ='<div class="alert alert-danger" role="alert">Please select Destination</div>';

        } 

        if(!$_POST['brate']){

            $error = '<div class="alert alert-danger" role="alert">Please provide booking rate</div>';

        } 

        if(!$_POST['mallow']){

            $error = '<div class="alert alert-danger" role="alert">Please provide meal allowance</div>';

        } 

        if(!$_POST['fcost']){

            $error = '<div class="alert alert-danger" role="alert">Please provide Total fuel cost</div>';

        } 

        if(!$_POST['fliter']){

            $error = '<div class="alert alert-danger" role="alert">Please provide Total fuel</div>';

        } 

        if(!$_POST['pliter']){

            $error = '<div class="alert alert-danger" role="alert">Please provide price per liter of fuel</div>';

        } 

        if(!$_POST['taxw']){

            $error = '<div class="alert alert-danger" role="alert">Please provide Withholding Tax</div>';

        } 

        if(!$_POST['taxv']){

            $error = '<div class="alert alert-danger" role="alert">Please provide Tax VAT</div>';

        } 

        if(!$_POST['taxc']){

            $error = '<div class="alert alert-danger" role="alert">Please provide City Tax</div>';

        } 

        if(!$_POST['mbud']){

            $error = '<div class="alert alert-danger" role="alert">Please provide Maintenance budget</div>';

        } 

        if(!$_POST['tdate']){

            $error = '<div class="alert alert-danger" role="alert">Please provide Trip Date</div>';

        } 

        if(!$_POST['frate']){

            $error = '<div class="alert alert-danger" role="alert">Please calculate final rate</div>';

        } 

        if ($error != "") {
            
            $error = '<div class="alert alert-danger" role="alert">There were errors during booking creation</div>';

        } else 

        { //01 else

            $custid=$_POST['customer']; // 1. Get cust id from field            

            $getcustfullname ="SELECT CONCAT
            (`first_name` , ' ' , `last_name`)
             AS `Name`FROM `customers` WHERE `id`='$custid'"; // 2. Define query

            $result=mysqli_query($link,$getcustfullname);
            $row = mysqli_fetch_array($result);
            $fullname=$row['Name']; // 3. Customer fullname for insert


            $truckid=$_POST['truck']; // 1. Get truck id from field

            $gettruckid = "SELECT * FROM `trucks` WHERE `id` = '$truckid' "; //2. Define query

            $result=mysqli_query($link,$gettruckid);
            $row = mysqli_fetch_array($result);
            $truckplate=$row['truckplate'];//3. Truck plate # for insert

            $drivertableid=$_POST['dname']; // 1. Get driver name from field

            $getdrivername = "SELECT CONCAT
            (`first_name` , ' ' , `last_name`)
             AS `drivername`FROM `users` WHERE `id`='$drivertableid'"; //2. Define query

            $result=mysqli_query($link,$getdrivername);
            $row = mysqli_fetch_array($result);
            $drivername=$row['drivername'];//3. Driver name for insert

           // $driverwage=$_POST['dwage'];

            $gethelperid=$_POST['help']; // 1. Get helper data from field

            $gethelperfullname = "SELECT CONCAT
            (`first_name` , ' ' , `last_name`)
             AS `helpername`FROM `users` WHERE `id`='$gethelperid'"; //2. Define query

            $result=mysqli_query($link,$gethelperfullname);
            $row = mysqli_fetch_array($result);
            $helperfullname=$row['helpername'];//3. Data for insert

            $gethelpertwoid=$_POST['helpertwo']; // 1. Get helper two data from field

            $gethelpertwofullname = "SELECT CONCAT
            (`first_name` , ' ' , `last_name`)
             AS `helpername`FROM `users` WHERE `id`='$gethelpertwoid'"; //2. Define query

            $result=mysqli_query($link,$gethelpertwofullname);
            $row = mysqli_fetch_array($result);
            $helpertwofullname=$row['helpername'];//3. helper two Data for insert

            $gethelperthreeid=$_POST['helperthree']; // 1. Get helper three data from field

            $gethelperthreefullname = "SELECT CONCAT
            (`first_name` , ' ' , `last_name`)
             AS `helpername`FROM `users` WHERE `id`='$gethelperthreeid'"; //2. Define query

            $result=mysqli_query($link,$gethelperthreefullname);
            $row = mysqli_fetch_array($result);
            $helperthreefullname=$row['helpername'];//3. helper three Data for insert



            $getcommoditiesid=$_POST['com']; // 1. Get from field

            $getcommoditiesname = "SELECT * FROM `commodities` WHERE `id` = '$getcommoditiesid' "; //2. Define query

            $result=mysqli_query($link,$getcommoditiesname);
            $row = mysqli_fetch_array($result);
            $commoditiesname=$row['cname'];//3. data for insert

            $gettoid=$_POST['to']; // 1. Get from field

            $getoriginname = "SELECT * FROM `origins` WHERE `id` = '$gettoid' "; //2. Define query

            $result=mysqli_query($link,$getoriginname);
            $row = mysqli_fetch_array($result);
            $chosenorigin=$row['origin'];//3. data for insert

            $gettdestid=$_POST['tdest']; // 1. Get from field

            $getdestinationname = "SELECT * FROM `destinations` WHERE `id` = '$gettdestid'"; //2. Define query

            $result=mysqli_query($link,$getdestinationname);
            $row = mysqli_fetch_array($result);
            $destinationname=$row['dplace'];//3. data for insert

            $daytripno = $_POST['tno']; // Data for insert

            $bookedrate = $_POST['brate']; // Data for insert

            $bookeddiscount = $_POST['disc']; // Data for insert

            $getfinalrate = $_POST['frate'];  // Final rate for insert

            $getmealallowance = $_POST['mallow']; // Data for insert 

            $getfueltotalcost = $_POST['fcost']; // Data for insert

            $getfuelliter = $_POST['fliter']; // Data for insert

            $getfuelpriceperliter = $_POST['pliter']; // Data for insert

            $getfuelsupplierid=$_POST['fsup']; // 1. Get from field

            $getfuelsuppliername = "SELECT * FROM `fuelsupplier` WHERE `id` = '$getfuelsupplierid'"; //2. Define query

            $result=mysqli_query($link,$getfuelsuppliername);
            $row = mysqli_fetch_array($result);
            $fuelsuppliername=$row['fsup'];//3. data for insert

            $gettaxwithholding = $_POST['taxw']; // data for insert

            $gettaxvat = $_POST['taxv']; // data for insert

            $gettaxcity = $_POST['taxc']; // data for insert

            $getmaintenancebudget = $_POST['mbud']; // data for insert

            $getnotes = $_POST['notes']; // data for insert

            $getbookingdate = $_POST['tdate']; // data for insert



            $query = "INSERT INTO bookings(`customer`,`truck`,`driver`,`helper`,`helpertwo`,`helperthree`,`commodities`,`origin`
            ,`destination`,`daytripno`,`bookrate`,`bookdiscount`,`finalrate`,`mealallowance`,`fueltotalcost`,`fuelliter`,`fuelpriceperliter`,`fuelsupplier`,`taxwithholding`,`taxvat`,`citytax`,`maintenancebudget`
            ,`notes`,`bookingdate`,`customerid`,`driverid`)
            VALUES('$fullname','$truckplate','$drivername','$helperfullname','$helpertwofullname','$helperthreefullname','$commoditiesname','$chosenorigin','$destinationname','$daytripno','$bookedrate','$bookeddiscount','$getfinalrate'
            ,'$getmealallowance'
            ,'$getfueltotalcost','$getfuelliter','$getfuelpriceperliter','$fuelsuppliername','$gettaxwithholding'
            ,'$gettaxvat','$gettaxcity','$getmaintenancebudget','$getnotes','$getbookingdate','$custid','$drivertableid')";

                if(mysqli_query($link,$query)){

                    $notification = '<div class="alert alert-primary myalert" role="alert">Booking Created Successfully!</div>';
                } 

                else { // 02 else

                    $error = "<p>insert failed</p>";
                    
                } 

            }// end of 01 else
    
}

?>
<header>
           <div class="container box container-gap">  
                <div class="row">
                     <div id="error">
                        <?php echo $error; ?>
                        <?php echo $notification;?>   
                            </div>  

                            <div id="addbookingheader" class="pagination-centered">                    
                        <img src="./img/delright.png" id="acctlogo">
                        <h3 style="padding-left: 80px;">Add New Booking</h3>
                    </div>
                </div>                
            </div> 
           
</header> 

<section id="sidepanel">
    <div class="container" id="sidepanel-container">
        <div id="sidepanel-content">
            <div id="sidepanel-title">
                <p id="sidepanel-menu">Menu</p>
            </div>
            <div id="sidepanel-body">
                <a href="customers/customers.php" class="badge badge-primary my-badge">Customers</a>
                <a href="employees.php" class="badge badge-secondary my-badge">Employees</a>
                <a href="trucks.php" class="badge badge-info my-badge">Trucks</a>
                <a href="origins/origins.php" class="badge badge-success my-badge">Trip Origins</a>
                <a href="destinations/destinations.php" class="badge badge-danger my-badge">Trip Destinations</a>
                <a href="commodities/commodities.php" class="badge badge-warning my-badge">Commodities</a>
                <a href="rates/rates.php" class="badge badge-info my-badge">Booked Rates</a>        
                <a href="viewallbookings.php" class="badge badge-dark my-badge">View All Booking</a>
            </div>
        </div>
    </div>
    
</section>

<section>

            <div class="container box container-gap">
                 <br>
                             
                    <form method="post">
                        <div id="firstRow"><!--First Row Wrapper-->
                            <div class="row"> <!-- First Row -->                                
                                    <div class="col"> 
                                            <div class="form-group">
                                                    <label>Select Customer &nbsp;</label>
                                                        <?php
                                                            include('connection.php');
                                                            $sql = "SELECT * FROM customers";
                                                            $query = mysqli_query($link,$sql);
                                                            echo '<select name="customer" id="customer">';
                                                            echo '<option value="">Select</option>';
                                                            while ($row = mysqli_fetch_assoc($query)) {
                                                                $custid=$row['id'];
                                                                $fname=$row['first_name'];
                                                                $lname=$row['last_name'];           
                                                                echo '<option value='.$custid.'>'.$fname.' '.$lname.'</option>';
                                                            }
                                                            echo '</select>';
                                                        ?>                                                              
                                            </div>                                    
                                        </div>
                                            <div class="col">
                                               <div class="form-group">
                                                <label for="truck">Select Truck</label>
                                                    <?php
                                                        include('connection.php');
                                                        $sql = "SELECT * FROM trucks";
                                                        $query = mysqli_query($link,$sql);
                                                        echo '<select name="truck" id="truck">';
                                                        echo '<option value="">Select</option>';
                                                        while ($row = mysqli_fetch_assoc($query)) {
                                                        $truckid=$row['id'];
                                                        $tname=$row['truckname'];
                                                        $tplate=$row['truckplate'];   
                                                        $tcateg=$row['truckcateg'];          
                                                        echo '<option value='.$truckid.'>'.$tname.' '.$tplate.' '.$tcateg.'</option>';
                                                        }
                                                        echo '</select>';
                                                    ?>                 
                                                </div>                            
                                            </div>

                                        <div class="col">
                                            <div class="form-group">
                                                <label for="truck">Select Trip Date</label>
                                                <input type="date" name="tdate" id="tdate" style="width: 160px;">
                                            </div>
                                        </div>

                                             

                            </div> <!--End of First Row -->
                                    </div><!--End of First Row wrapper -->

                            <div class="row"> <!-- Second Row -->  

                                             

                                        <div class="col">
                                           <div class="form-group">
                                                <label for="to">Select Trip Origin</label>
                                                <?php
                                                    include('connection.php');
                                                    $sql = "SELECT * FROM origins";
                                                    $query = mysqli_query($link,$sql);
                                                    echo '<select name="to" id="to" style="width: 155px;">';
                                                    echo '<option value="">Select</option>';
                                                    while ($row = mysqli_fetch_assoc($query)) {
                                                    $id=$row['id'];    
                                                    $origin=$row['origin'];                             
                                                    echo '<option value='.$id.'>'.$origin.'</option>';
                                                    }
                                                    echo '</select>';
                                                ?>       
                                            </div>                            
                                        </div>
                                    <div class="col">
                                        <div class="form-group">
                                                <label for="tdest">Select Trip Destination</label>
                                                <?php
                                                include('connection.php');
                                                $sql = "SELECT * FROM destinations";
                                                $query = mysqli_query($link,$sql);
                                                echo '<select name="tdest" id="tdest" style="width: 115px;">';
                                                echo '<option value="">Select</option>';
                                                while ($row = mysqli_fetch_assoc($query)) {
                                                $id=$row['id'];    
                                                $destination=$row['dplace'];                             
                                                echo '<option value='.$id.'>'.$destination.'</option>';
                                                }
                                                echo '</select>';
                                                ?>      
                                            </div>
                                    </div>
                                     <div class="col">
                                    <div class="form-group">
                                                <label for="com">Select Commodities</label>
                                                <?php
                                                include('connection.php');
                                                $sql = "SELECT * FROM commodities";
                                                $query = mysqli_query($link,$sql);
                                                echo '<select name="com" id="com" style="width:130px;">';
                                                echo '<option value="">Select</option>';
                                                while ($row = mysqli_fetch_assoc($query)) {
                                                $id=$row['id'];
                                                $cname=$row['cname'];
                                                echo '<option value='.$id.'>'.$cname.'</option>';
                                                }
                                                echo '</select>';
                                                ?>      
                                            </div>
                                    </div>

                                     
                            </div> <!--End of Second Row -->

                            <div class="row"> <!-- Third Row -->  

                            <div class="col">
                                           <div class="form-group">
                                                <label for="brate">Enter Booked Rate</label>
                                                <input type="number" name="brate" id="brate" style="width: 140px;">

                                            </div>                            
                                        </div>                  
                               
                                       
                                    <div class="col">
                                        <div class="form-group">
                                                <label for="disc">Enter Discount</label>
                                                <input type="number" name="disc" id="disc" style="width: 170px;">
                                            </div>
                                </div>

                                <div class="col">
                                    <div class="form-group">
                                                <label for="dname">Select Driver Name</label>
                                                <?php
                                                include('connection.php');
                                                $sql = "SELECT * FROM users WHERE position='Driver'";
                                                $query = mysqli_query($link,$sql);
                                                echo '<select name="dname" id="dname" style="width:135px;">';
                                                echo '<option value="">Select</option>';
                                                while ($row = mysqli_fetch_assoc($query)) {
                                                $id=$row['id'];
                                                $fname=$row['first_name'];
                                                $lname=$row['last_name'];
                                                echo '<option value='.$id.'>'.$fname.' '.$lname.'</option>';
                                                }
                                                echo '</select>';
                                                ?>      
                                            </div>
                                    </div>

                                    
                                        
                                    
                            </div> <!--End Third Row -->

                            <div class="row"><!--Helper Row -->
                                <div class="col">
                                        <div class="form-group">
                                                <label for="help">Select Helper</label>
                                                <?php
                                                include('connection.php');
                                                $sql = "SELECT * FROM users WHERE position='Helper'";
                                                $query = mysqli_query($link,$sql);
                                                echo '<select name="help" id="help" style="width:180px;">';
                                                echo '<option value="">Select</option>';
                                                while ($row = mysqli_fetch_assoc($query)) {
                                                $id=$row['id'];
                                                $fname=$row['first_name'];
                                                $lname=$row['last_name'];
                                                echo '<option value='.$id.'>'.$fname.' '.$lname.'</option>';
                                                }
                                                echo '</select>';
                                                ?>     
                                            </div>
                                    </div>
                                 <div class="col">
                                        <div class="form-group">
                                                <label for="help">Additional Helper (Optional)</label>
                                                <?php
                                                include('connection.php');
                                                $sql = "SELECT * FROM users WHERE position='Helper'";
                                                $query = mysqli_query($link,$sql);
                                                echo '<select name="helpertwo" id="helpertwo">';
                                                echo '<option value="">Select</option>';
                                                while ($row = mysqli_fetch_assoc($query)) {
                                                $id=$row['id'];
                                                $fname=$row['first_name'];
                                                $lname=$row['last_name'];
                                                echo '<option value='.$id.'>'.$fname.' '.$lname.'</option>';
                                                }
                                                echo '</select>';
                                                ?>     
                                            </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-group">
                                                <label for="help">Additional Helper (Optional)</label>
                                                <?php
                                                include('connection.php');
                                                $sql = "SELECT * FROM users WHERE position='Helper'";
                                                $query = mysqli_query($link,$sql);
                                                echo '<select name="helperthree" id="helperthree">';
                                                echo '<option value="">Select</option>';
                                                while ($row = mysqli_fetch_assoc($query)) {
                                                $id=$row['id'];
                                                $fname=$row['first_name'];
                                                $lname=$row['last_name'];
                                                echo '<option value='.$id.'>'.$fname.' '.$lname.'</option>';
                                                }
                                                echo '</select>';
                                                ?>     
                                            </div>
                                    </div>
                            </div>

                            <div class="row"> <!--Extra Row-->

                                <div class="col">
                                        <div class="form-group">
                                            <label for="mbud">Enter Maintenance Budget</label>
                                            <input type="number" name="mbud" id="mbud" style="width: 80px;">           
                                        </div>
                                    </div>
                                
                                 <div class="col">
                                    <div class="form-group">
                                                <label for="mallow">Enter Meal Allowance</label>
                                                <input type="number" name="mallow" id="mallow" style="width: 120px;">
                                                
                                            </div>
                                    </div>

                                    <div class="col">
                                           <div class="form-group">
                                                <label for="fcost">Enter Fuel Cost</label>
                                                <input type="number" name="fcost" id="fcost" style="width: 165px;">
                                                
                                            </div>                            
                                        </div>
                                    
                            </div> <!--End of Extra Row-->

                            <div class="row"> <!-- Fourth Row -->                    
                                
                                        
                                    <div class="col">
                                        <div class="form-group">
                                                <label for="fliter">Enter Total Liters of Fuel</label>
                                                <input type="number" name="fliter" id="fliter" style="width: 95px;">        
                                            </div>
                                    </div>

                                    <div class="col">
                                    <div class="form-group">
                                                <label for="pliter">Enter Fuel Price/Liter</label>
                                                <input type="number" name="pliter" id="pliter" style="width: 120px;">
                                                
                                            </div>
                                    </div>

                                     <div class="col">
                                           <div class="form-group">
                                                <label for="fsup">Select Fuel Supplier</label>
                                               <?php
                                               include('connection.php');
                                                $sql = "SELECT * FROM fuelsupplier";
                                                $query = mysqli_query($link,$sql);
                                                echo '<select name="fsup" id="fsup" style="width:130px;">';
                                                echo '<option value="">Select</option>';
                                                while ($row = mysqli_fetch_assoc($query)) {
                                                $id=$row['id'];
                                                $fsup=$row['fsup'];
                                                
                                                echo '<option value='.$id.'>'.$fsup.'</option>';
                                                }
                                                echo '</select>';
                                                ?>  
                                            </div>                            
                                        </div>
                            </div> <!--End Fourth Row -->

                            <div class="row"> <!-- Fifth Row -->                    
                                 
                                       
                                    <div class="col">
                                        <div class="form-group">
                                                <label for="taxw">Enter Tax Withholding</label>
                                                <input type="number" name="taxw" id="taxw" style="width: 100px;">
                                                
                                            </div>
                                    </div>

                                 <div class="col">
                                    <div class="form-group">
                                                <label for="taxv">Enter Tax VAT</label>
                                                 <input type="number" name="taxv" id="taxv" style="width: 170px;">
                                                
                                            </div>
                                    </div>

                                    <div class="col">
                                           <div class="form-group">
                                                <label for="taxc">Enter Tax City</label>
                                                <input type="number" name="taxc" id="taxc" style="width: 175px;">
                                                
                                            </div>                            
                                        </div>
                                    

                            </div> <!--End Fifth Row -->

                            <div class="row"> <!--Just one component-->
                                <div class="col">
                                                 <div class="form-group">
                                                    <label for="tno">Enter Day Trip No.</label>
                                                    <input type="text" name="tno" id="tno" style="width: 120px;">
                                                </div>
                                             </div>  
                            </div>

                            <div class="row"> <!-- Sixth Row -->                    
                                
                                        
                                    
                                          <div class="col">
                                                <div class="form-group">
                                                    <label for="notes">Notes</label>
                                                     <textarea name="notes" id="notes"></textarea> 
                                                    
                                                </div>
                                         </div>      

                                         <div class="col">
                                             <div id="fratefield">
                                                    <input class="form-control" type="text" name="frate" id="frate" placeholder="Final Computed Rate" readonly>
                                                    </div>
                                        </div>

                                        <div class="col mycompute">
                                            <div id="buttoncompute">
                                            <button type="button" name="compute" id="compute" class="btn btn-success btn">Compute</button>
                                            <button type="reset" class="btn btn-danger" name="reset" id="reset" value="reset" >Reset</button>
                                            <input type="submit" name="submit" value="submit" class="btn btn-primary">
                                            </div>
                                        </div>
                                                               
                                         
                            </div> <!--End Sixth Row -->                           

                            <div class="row"> <!--Seventh Row -->                           
                                      
                                       
                                         
                                        
                            </div>  <!--End Seventh Row -->

                            </form>
            </div> <!--End of Container --><br \><br \><br \>
            </section>
            <script type="text/javascript" src="./js/myscript.js"></script>
<?php
include('footer.php');
?> 
 