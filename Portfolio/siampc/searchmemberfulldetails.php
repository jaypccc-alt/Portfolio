<?php
include('./header.php');
?>

<?php



$getMembersId=$_GET['Data'];
//$customerFullDetailsQuery="SELECT * FROM `customers` WHERE `id`='$getCustomersId' ";
$memberFullDetailsQuery="
SELECT * 
FROM `members` 
WHERE `id`='$getMembersId'";

include('connection.php');
$result=mysqli_query($link,$memberFullDetailsQuery);

if(!$result){
    echo "Cannot Load Member Details";
} else {

$row = mysqli_fetch_array($result);
    $getAccountNo=$row['acct'];
    $getFirstName=$row['fname'];
    $getLastName=$row['lname']; 
    $getMiddleName=$row['mname']; 
    $getSuffix=$row['suffix'];
    $getAddress=$row['address']; 
    $getMobile=$row['mobile'];
    $getMobile2=$row['mobile2'];
    $getTelephone=$row['telephone'];
    $getCstatus=$row['cstatus'];
    $getDependents=$row['bday'];
    $getGender=$row['gender'];
    $getTin=$row['tin'];
    //$getAvailable=$row['available'];
    $getCurrent=$row['current'];
    //$getBsector=$row['bsector'];   
    $getbDay=$row['bday'];
    $getOccupation=$row['occupation'];
    $getCbuDateUpdate=$row['cbudateupdate'];
    $getMsoAcct=$row['msoaccount'];
    $getArb=$row['arb'];
    $getRsbsa=$row['rsbsa'];
    $getAccount=$row['acctstatus'];
    $getCbu=$row['cbu'];

?>

<div class="container">
    <br>
    <div class="row">
        <div class="col-sm-4">       
        
 
        </div>

        <div class="col-sm-4">            
            <a href="#"><img src="./img/test.jpg" id="acctlogo" style="padding-left: 0;margin-left: 40px; height: 170px;"></a>
        </div>

       <div class="col-sm-4">
           <a href="updatememberdetails.php?Update=<?php echo "$getMembersId";?>">Edit Mode</a><br>

           <a href="members.php">Back to Members</a>
        </div>
    
     </div>

     <section id="customer-details"><br>
        <p class="account-category font-weight-bold">Member Details</p><br>
        <div class="row">
            <div class="col-sm-4">              
               
               <label>Member Name :</label>
                <?php echo $getFirstName." ".$getMiddleName." ".$getLastName." ".$getSuffix." "; ?> <br>             
                <p></p>
                <label>Address :</label>
                <?php echo $getAddress; ?> <br>    
                <p></p>
                <label>Gender :</label>                
                <?php echo $getGender;?>

                 <p></p>
                <label>Civil Status :</label>                
                <?php echo $getCstatus;?>
            </div>

            <div class="col-sm-4">
                <p class="label-info">Account #: <?php echo $getAccountNo; ?></p>                 

                <p></p>
                <label>Primary Mobile no. :</label>
                <?php echo $getMobile; ?> <br>    

                <p></p>
                <label>Secondary Mobile no.  :</label>
                <?php echo $getMobile2; ?> <br>  

                <p></p>
                <label>Birthday :</label>

                <?php                    
                
                echo date("F j, Y", strtotime($getbDay));

                ?> <p> </p>

                <?php 
                
                $today = date("Y-m-d");
                $diff = date_diff(date_create($getbDay), date_create($today));
                echo 'Current Age : '.$diff->format('%y');

                ?> <br>
                

                   
                        
            </div>
            <div class="col-sm-4">

                <label>TIN :</label>
                <?php echo $getTin; ?><br>

               

                
                 <br><br>

                 <label>Occupation :</label>
                <?php echo $getOccupation; ?>
                <br> <br>
                <br> 

                 <label>Account Status :</label>
                <?php echo $getAccount; ?><br>

                
                
            </div>
        </div>        
     </section>   <br>

     <section>
                    <p class="account-category font-weight-bold">Coop Data</p><br>
                    <div class="row">
                        <div class="col-sm-4">
                            <label>CBU Amount :</label>
                            <?php echo $getCbu; ?>



                            <p></p>
                            <label>CBU Date Update :</label>
                            <?php                    
                
                            echo date("F j, Y", strtotime($getCbuDateUpdate));

                            ?> <p> </p>



                          
                        </div>
                        <div class="col-sm-4">
                            
                             


                            
                            <label>MSO Account :</label>
                             <?php echo $getMsoAcct;?>




                        </div>
                        <div class="col-sm-4">

                             
               

                        </div>
                    </div>
                </section>   <br>
                 <section>
                    <p class="account-category font-weight-bold">Farmer Category </p><br>
                    <div class="row">
                        <div class="col-sm-4">
                            <label>ARB Member :</label>
                            <?php echo $getArb; ?>



                            <p></p>
                            <label>RSBSA member :</label>
                            <?php    echo $getRsbsa; ?>                
                
                         <p> </p>



                          
                        </div>
                       
                        <div class="col-sm-4">

                             
               

                        </div>
                    </div>
                </section>   
</div> <br>
<?php }
include('./footer.php');
?>
