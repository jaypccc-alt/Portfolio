<?php
include('./header.php');

$error = isset($error) ? $error : '';
$error1 = isset($error1) ? $error1 : '';
$notification = isset($notification) ? $notification : '';
?>

<?php

$getMemberId=$_GET['Update'];

$memberFullDetailsQuery="
SELECT * 
FROM `members` 
WHERE `id`='$getMemberId'";


include('connection.php');
$result=mysqli_query($link,$memberFullDetailsQuery);

if(!$result){
    echo "Cannot Load Member Details";
} else {

    $row = mysqli_fetch_array($result);
    $getFirstName=$row['fname'];
    $getMiddleName=$row['mname'];
    $getLastName=$row['lname'];
    $getAddress=$row['address'];
    $getMobile=$row['mobile'];
    $getMobile2=$row['mobile2'];
    $getSuffix=$row['suffix'];
    ?>

    <?php

    if(isset($_POST['submit'])){

        if(!$_POST['Ufirstname']){

            $error = '<div class="text-danger" role="alert">First Name is Required</div>';

        }
        if(!$_POST['Ulastname']){

            $error = '<div class="text-danger" role="alert">Last Name is Required</div>';

        }


        if($error !=""){

            $error= '<div class="text-danger" role="alert">Some fields are blank</div>';
        } else {


                $ifirstname = mysqli_real_escape_string($link,$_POST['Ufirstname']);
                $imname=mysqli_real_escape_string($link,$_POST['Umname']);
                $ilastname=mysqli_real_escape_string($link,$_POST['Ulastname']);
                $iaddress=mysqli_real_escape_string($link,$_POST['Uaddress']);
                $imobile=mysqli_real_escape_string($link,$_POST['Umobile']);
                $imobile2=mysqli_real_escape_string($link,$_POST['Umobile2']);
                $isuffix=mysqli_real_escape_string($link,$_POST['Usuffix']);

                $Uquery = "UPDATE `members`  

                    SET `fname`= '$ifirstname'
                        ,`mname`='$imname'
                        ,`lname` = '$ilastname'
                        ,`address` = '$iaddress'
                        ,`mobile` = '$imobile'
                        ,`mobile2` = '$imobile2'
                        ,`suffix` = '$isuffix'      
                   
                     WHERE `id` = '$getMemberId' ";

                                include('connection.php');

                                if(mysqli_query($link, $Uquery)){

                                    $notification = '<div class="text-primary" role="alert"><span id="notifyUpdate">Update Successful!</span></div>';
                                    

                                } else {

                                    $error = '<div class="text-warning" role="alert">Update Failed!</div>'. mysqli_error($link);
                                    $error1 = '<div class="text-warning" role="alert">Error Code</div>' .mysqli_errno($link);

                                }
                      
                            }
                        }
                    }

?>

<div class="container">
    <br>
    <div class="row">
        <div class="col-sm-4">
            <h3>
                <!-- A php script was remove here that displays who created the member -->
              

            </h3>
        </div>
        <div class="col-sm-4">
            <a href="#"><img src="./img/test.jpg" id="acctlogo"></a>
            <h3 style="padding-left: 109px;">Update Member Details</h3>
            <?php echo $notification; ?>
            <?php echo $error; ?>
            <?php echo $error1; ?>
        </div>
        <div class="col-sm-4">

            <a href="members.php">Back to Members</a>
        </div>

    </div>
    <section id="customer-details"><br>
        <p class="account-category font-weight-bold">Member Details</p><br>
        <form method="POST">
            <div class="row"> <!-- row 1 -->

                <div class="col m-2">

                    <label>First Name</label>
                    <input type="text" class="form-control" name="Ufirstname" id="Ufirstname" value='<?php echo $getFirstName;?>'> <br>                  

                                    

                </div>

                <div class="col m-2">
                   
                    <label>Middle Name</label>
                    <input type="text" class="form-control" name="Umname" id="Umname" value='<?php echo $getMiddleName;?>'> <br>

                    
                </div>

                <div class="col m-2" >
                    <label>Last Name</label>
                    <input type="text" class="form-control" name="Ulastname" id="Ulastname" value='<?php echo $getLastName;?>'>                 
                </div>

                <div class="col" >
                    <label for="Usuffix" class="form-label">Suffix</label>
            <select class="form-control" id="Usuffix" name="Usuffix">
                <option value="<?php echo $getSuffix;?>">Select</option>
                <option>Jr</option>
                <option>Sr</option>
                <option>III</option>
            </select>                     
                </div>

            </div> <!-- end of row 1 -->

            <div class="row"><!-- row 2 -->
                <div class="col-sm-4">
                    <label>Address</label><br>
                    <input type="text" class="form-control" name="Uaddress" id="Uaddress" value='<?php echo $getAddress; ?>'>
                </div>

                 <div class="col-sm-4">
                    <label>Mobile</label><br>
                    <input type="text" class="form-control" name="Umobile" id="Umobile" value='<?php echo $getMobile; ?>'><br>
                </div>

                 <div class="col-sm-4">
                    
                    <label>Mobile</label><br>
                    <input type="text" class="form-control" name="Umobile2" id="Umobile2" value='<?php echo $getMobile2; ?>'><br>
                </div>
            </div> <!-- end of row 2-->
            
            <input type="submit" name="submit" value="submit" class="btn btn-primary" style="float: right;">
        </form>
    </section>

</div> <br>
<?php
include('./footer.php');
?>

