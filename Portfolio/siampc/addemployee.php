<?php
include('./header.php');

    $error ='';
    $notification='';
?>

<?php

if(isset($_POST['submit'])){   

    if(!$_POST['Ifirstname']){

        $error = '<div class="text-danger" role="alert">First Name is Required</div>';

    }
    if(!$_POST['Ilastname']){

        $error = '<div class="text-danger" role="alert">Last Name is Required</div>';

    }
    if(!$_POST['Iposition']){


        $error = '<div class="text-danger" role="alert">Position is Required</div>';

    }

    if(!$_POST['Imobile']){


        $error = '<div class="text-danger" role="alert">Mobile is Required</div>';

    }
   
    if($error !=""){

        $error= '<div class="text-danger" role="alert">Some fields are blank</div>';
    } else {

    include('connection.php');
    $iImage=addslashes(file_get_contents($_FILES["Iimage"]["tmp_name"]));
    $ifirstname = mysqli_real_escape_string($link,$_POST['Ifirstname']);
    $ilastname=mysqli_real_escape_string($link,$_POST['Ilastname']);
    $iaddress=mysqli_real_escape_string($link,$_POST['Iaddress']);
    $iposition=mysqli_real_escape_string($link,$_POST['Iposition']);
    $isalary=mysqli_real_escape_string($link,$_POST['Isalary']);
    $imobile=mysqli_real_escape_string($link,$_POST['Imobile']);
    $isss=mysqli_real_escape_string($link,$_POST['Isss']);
    $ipagibig=mysqli_real_escape_string($link,$_POST['Ipagibig']);
    $iphilhealth=mysqli_real_escape_string($link,$_POST['Iphilhealth']);
    $imarried=mysqli_real_escape_string($link,$_POST['Imarried']);
    
    
    

    $Iquery = "INSERT INTO `users` (`first_name`,`last_name`,`address`,`position`,`salary`,`mobile`,`sss`,`pagibig`,`philhealth`,`married`,`dependents`,`companyid`,`image`,`emergencycontact`)VALUES('$ifirstname','$ilastname','$iaddress','$iposition','$isalary','$imobile','$isss','$ipagibig','$iphilhealth','$imarried','$idependents','$icompanyid','$iImage','$iemergency')";

                //include('connection.php');

                if(mysqli_query($link, $Iquery)){

                $notification = '<div class="text-primary" role="alert">Add Employee Successful!</div>'; 
                    
              //echo '<script>window.open("employees.php?Updates=Employee updated successfuly","_self")</script>';            

                } else

                {

                    
                $error = '<div class="text-warning" role="alert">Add New Employee Failed!</div>'. mysqli_error($link);
                }       
    }
}


?>

<div class="container">
    <br>
    <div class="row">
        <div class="col">
            
        </div>
        <div class="col">            
            <a href="#"><img src="./img/siampclogo.JPG" id="acctlogo"></a>
            <h3 style="padding-left: 87px;">Add Employee</h3>
            <?php echo $notification; ?>
            <?php echo $error; ?>
        </div>
        <div class="col">
           
           <a href="employees.php">Employees</a>
        </div>
    
     </div>
     <section id="customer-details"><br>
        <p class="account-category font-weight-bold">Employee Details</p><br>
        <form method="POST" enctype="multipart/form-data">
        <div class="row">
            
                <div class="col">                
                    <label>Upload Employee Image: </label>
                    <input type="file" name="Iimage" id="Iimage">                    
                    <p></p>
                   <label>Employee Name :</label><br>                     
                    <input type="text" name="Ifirstname" id="Ifirstname"><br>
                    <input type="text" name="Ilastname" id="Ilastname"><br>        

                    <label>Address :</label><br>
                    <input type="text" name="Iaddress" id=""><br>
                         

                    <label>Position :</label> <br>
                    <input type="text" name="Iposition" id=""> <br>    

                    <label>Salary :</label> <br>
                    <input type="text" name="Isalary" id=""> <br>                   
                    
                </div>

                <div class="col">
                    <p class="label-info">Company ID #: </p>  
                    <input type="text" name="Icompanyid" id="">   <br>            

                    <label>Mobile :</label><br>
                    <input type="text" name="Imobile" id=""><br>
                     

                    <label>In Case of Emergency Contact: </label><br>
                    <input type="text" name="Iemergency" id=""><br>

                    <label>Married: </label><br>
                    <input type="text" name="Imarried" id=""><br>
                     
                            
                </div>
                <div class="col">

                    <label>SSS :</label><br>
                    <input type="text" name="Isss" id=""><br>
                   

                    <label>PagIbig :</label><br>
                    <input type="text" name="Ipagibig" id=""><br>  

                     <label>PhilHealth :</label><br>
                    <input type="text" name="Iphilhealth" id=""><br>       

                    <label>Dependents :</label><br>
                    <textarea name="Idependents" id=""></textarea><br>            
                </div>            
             </div>  
             <input type="submit" name="submit" value="submit" class="btn btn-primary" style="float: right;">
        </form>
     </section>

</div> <br>

<?php 
include('./footer.php');
?>
