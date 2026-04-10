<?php
include('header.php');

session_start();

if(empty($_SESSION['id'])):
    header('Location:./index.php');
endif;

if(array_key_exists("id", $_COOKIE)) {

    $_SESSION['id'] = $_COOKIE['id'];
}
$error = isset($error) ? $error : '';
$notification = isset($notification) ? $notification : '';

include('connection.php');

if(isset($_POST['submit'])){

    if(!$_POST['IacctNum']){

        $error = '<div class="text-danger" role="alert">Account # is required</div>';

    }
    if(!$_POST['Ifname']){

        $error = '<div class="text-danger" role="alert">First Name is Required</div>';

    }
    if(!$_POST['Ilname']){


        $error = '<div class="text-danger" role="alert">Last name is Required</div>';

    }

   
    if(!$_POST['Ibday']){


        $error = '<div class="text-danger" role="alert">Birthday is Required</div>';

    }

    if($error !=""){

        $error= '<div class="text-danger" role="alert">Some fields are blank</div>';
    } else {

        include('connection.php');
        //$iImage=addslashes(file_get_contents($_FILES["Iimage"]["tmp_name"]));
        $iacct= mysqli_real_escape_string($link,$_POST['IacctNum']);
        $iaddress=mysqli_real_escape_string($link,$_POST['Iaddress']);
        $ibday=mysqli_real_escape_string($link,$_POST['Ibday']);
          $icstatus=mysqli_real_escape_string($link,$_POST['Icstatus']);
        $ifname=mysqli_real_escape_string($link,$_POST['Ifname']);
        $ilname=mysqli_real_escape_string($link,$_POST['Ilname']);
        $imname=mysqli_real_escape_string($link,$_POST['ImName']);
        $igender=mysqli_real_escape_string($link,$_POST['Igender']);
        $isuffix=mysqli_real_escape_string($link,$_POST['Isuffix']);
        $imobile=mysqli_real_escape_string($link,$_POST['Imobile']); 
        $imobile2=mysqli_real_escape_string($link,$_POST['Imobile2']);
        $itelephone=mysqli_real_escape_string($link,$_POST['Itelephone']);
        $itin=mysqli_real_escape_string($link,$_POST['Itin']);        
        //$iavailable=mysqli_real_escape_string($link,$_POST['Iavailable']);
        //$icurrent=mysqli_real_escape_string($link,$_POST['Icurrent']);
        //$ibsector=mysqli_real_escape_string($link,$_POST['IbSector']);
        $ioccupation=mysqli_real_escape_string($link,$_POST['Ioccupation']);
        $icbuamount=mysqli_real_escape_string($link,$_POST['Icbuamount']);
        $icbudateupdate=mysqli_real_escape_string($link,$_POST['Icbudateupdate']);
        $imsoaccount=mysqli_real_escape_string($link,$_POST['Imsoaccount']);
        $iarb=mysqli_real_escape_string($link,$_POST['Iarb']);
        $irsbsa=mysqli_real_escape_string($link,$_POST['Irsbsa']);
       $iacctstatus=mysqli_real_escape_string($link,$_POST['IacctStatus']);
       

        $Iquery = "INSERT INTO `members` (`acct`,`address`,`fname`,`lname`,`mname`,`suffix`,`gender`,`bday`, `cstatus`,`mobile`,`mobile2`,`telephone`,`tin`,`occupation`,`cbu`,`cbudateupdate`,`msoaccount`, `arb`,`rsbsa`,`acctstatus`)VALUES('$iacct','$iaddress','$ifname','$ilname','$imname','$isuffix','$igender','$ibday','$icstatus','$imobile','$imobile2','$itelephone','$itin','$ioccupation','$icbuamount','$icbudateupdate','$imsoaccount','$iarb','$irsbsa','$iacctstatus')";

        //include('connection.php');

        if(mysqli_query($link, $Iquery)){

            $notification = '<div class="text-primary" role="alert">Add Member Successful!</div>';

            //echo '<script>window.open("employees.php?Updates=Member updated successfuly","_self")</script>';

        } else

        {
            $error = '<div class="text-warning" role="alert">Add New Member Failed!</div>'. mysqli_error($link);
        }
    }
}

?>

<section id="sidepanel">
    <div class="container" id="sidepanel-container" style="margin-top: -1px;">
        <div id="sidepanel-content">
            <div id="sidepanel-title">
                <p id="sidepanel-menu">Menu</p>
            </div>
            <div id="sidepanel-body">
              <!--  <span class="badge bg-primary my-badge" onclick="members.php">Members</span>-->
                <a href="members.php" class="badge bg-primary my-badge">Members</a>
                <a href="product.php" class="badge bg-danger my-badge">Product</a>
                <a href="sce.php" class="badge bg-info my-badge">SCE</a>
                <a href="#.php" class="badge bg-success my-badge">Human Resource</a>
                <a href="#.php" class="badge bg-danger my-badge">Vehicles</a>
                <a href="#.php" class="badge bg-warning my-badge">Request</a>
                <a href="#.php" class="badge bg-info my-badge">Network Files</a>
                <a href="#.php" class="badge bg-warning my-badge">My Profile</a>
                <a href="index.php?logout=1.php" class="badge badge-dark my-badge">Logout</a>
            </div>
        </div>
    </div>

</section>
        

<body>
<div class="container mt-5">
    <a href="menu.php"><img src="./img/test.jpg" id="complogo"></a>
    <?php echo $notification; ?>
    <?php echo $error; ?>

    <h1>Add Member</h1>
    <div class="row">

    <form method="POST" class="row g-3 form-margin">

         <div class="col-md-12">
            <label for="IacctNum" class="form-label">Account Number</label>
            <input type="text" class="form-control" id="IacctNum" name="IacctNum">
        </div>  

        <div class="row">
             

        <div class="col">
            <label for="IfName" class="form-label">First Name</label>
            <input type="text" class="form-control" id="IfName" name="Ifname">
        </div>

        <div class="col">
            <label for="ImName" class="form-label">Middle Name</label>
            <input type="text" class="form-control" id="ImName" name="ImName">
        </div>

        <div class="col">
            <label for="IlName" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="IlName" name="Ilname">
        </div>

        <div class="col">
            <label for="Isuffix" class="form-label">Suffix</label>
            <select class="form-control" id="Isuffix" name="Isuffix">
                <option value="">Select</option>
                <option>Jr</option>
                <option>Sr</option>
                <option>III</option>
            </select>
        </div>
    </div>
    <div>
        <div class="col-md-12">
            
            <label for="Iaddress" class="form-label">Address</label>
            <input type="text" class="form-control" id="Iaddress" name="Iaddress">
        </div>
    </div>
            <div class="col-sm-6">
              <label for="occup" class="form-label"> Select Occupation: </label>
                <select placeholder="select occupation" class="form-select" id="Ioccupation" name="Ioccupation">
                    
                    <option value="">*-Select-*</option>
                    <option value="Teacher">Teacher</option>
                    <option value="Business Man">Business Man</option>
                    <option value="Laborer">Laborer</option>                    
                    <option value="farmer arb">Farmer ARB</option>
                    <option value="farmer non arb">Farmer Non ARB</option>
                    <option value="farmer rsbsa">Farmer RSBSA</option>
                    <option value="farmer non rsbsa">Farmer Non RSBSA</option>
                    <option value="Government Employee">Government Employee</option>
                    <option value="Private Employee">Private Employee</option>
                    <option value="Housewife">Housewife</option>
                    <option value="Driver">Driver</option>
                    <option value="Engineer">Engineer</option>
                    <option value="Freelancer">Freelancer</option>
                    <option value="Self Employed">Self Employed</option>
                    <option value="Unemployed">Unemployed</option>
                    <option value="Seaman">Seaman</option>
                    <option value="Medical Practitioner">Medical Practitioner</option>
                    <option value="Fisherman">Fisherman</option>
                    <option value="Contractor">Contractor</option>
                        
                            

                    
                    
                </select>
            </div>

                <div class = "col-sm-6">
                  <label for="IbDay" class="form-label">Birth Date</label>
                    <div class= "input-group date">
                        <input type = "date" class = "form-control" name="Ibday" id="Ibday">    
                        <span class = "input-group-append">
                             <span class="input-group-text bg-white d-block">
                                <i class = "fa fa-calendar"></i>
                            </span>
                        </span>
                    </div>
                </div>               

            <div class="col-sm-4">
                <label for="Imobile" class="form-label">phone number 1</label>
                <input type="text" class="form-control" id="Imobile" name="Imobile">
            </div>

            <div class="col-sm-4">
                <label for="Imobile2" class="form-label">Phone number 2</label>
                <input type="text" class="form-control" id="Imodile2" name="Imobile2">
            </div>
            <div class="col-sm-4">
                <label for="Itelephone" class="form-label">Telephone</label>
                <input type="text" class="form-control" id="Itelephone" name="Itelephone">
            </div>
            <div class="col-md-4">
                <label for="Icstatus" class="form-label">Civil Status</label>
                <select class="form-control" id="Icstatus" name="Icstatus">
                    <option value="">*-Choose-*</option>
                    <option>Single</option>
                    <option>Married</option>
                    <option>Widow</option>
                    <option>Seperated</option>
                    
                </select>
            </div>
            <div class="col-sm-4">
                <label for="Itin" class="form-label">Tin No.</label>
                <input type="text" class="form-control" id="Itin" name="Itin">
            </div>

             <div class="col-md-4">
            <label for="Igender" class="form-label">Select Gender</label>
            <select class="form-control" id="Igender" name="Igender">
                <option>Select</option>
                <option>Male</option>
                <option>Female</option>
            </select>
        </div>
        <div class="col-md-4">
            <label for="IacctStatus" class="form-label">Account Status</label>
            <select class="form-control" id="IacctStatus" name="IacctStatus">
                <option>Choose</option>
                <option>Active</option>
                <option>Inactive</option>
            </select>
        </div>
            
<h1>Coop Data</h1>
        

        

        

       

        <div class="col-md-4">
            <label for="Icbuamount" class="form-label">CBU Amount</label>
            <input type="text" class="form-control" id="Icbuamount" name="Icbuamount">
        </div>

        <div class = "col-sm-4">
                <label for="IcbuDateAmount" class="form-label">CBU Date last Update</label>
                    <div class= "input-group date" id = "datepicker1">
                        <input type = "date" class = "form-control" name="Icbudateupdate" id="Icbudateupdate">
                        <span class = "input-group-append">
                             <span class="input-group-text bg-white d-block">
                                <i class = "fa fa-calendar"></i>
                            </span>
                        </span>
                    </div>
        </div>

        <div class="col-md-4">
            <label for="Imsoaccount" class="form-label">MSO Account number</label>
            <input type="text" class="form-control" id="Imsoaccount" name="Imsoaccount">

        </div>

        
<h1>Farmers Category</h1>

        <div class="col-md-4">
            <label for="Iarb" class="form-label">ARB Member</label>
            <select class="form-control" id="Iarb" name="Iarb">
                <option>*-Choose-*</option>
                <option>Yes</option>
                <option>No</option>
            </select>
        </div>
        <div class="col-md-4">
            <label for="Irsbsa" class="form-label">RSBSA Member</label>
            <select class="form-control" id="Irsbsa" name="Irsbsa">
                <option>*-Choose-*</option>
                <option>Yes</option>
                <option>No</option>
            </select>
        </div>

       

        <div class="row oc-row">
            <div class="col-md-4"></div>
            <div class="col-md-4"></div>
            <div class="col-md-4">
              
    
            </div>
        </div> <!--End of occupation row  -->

        <div class="col-md-12">
            <button type="submit" class="btn btn-primary" name="submit" value="submit">Save Data</button>
        </div>
    </form>
</div>
<script type="text/javascript">
   

</script>
<?php

include('footer.php');
?>
