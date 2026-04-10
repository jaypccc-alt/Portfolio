<?php
include('./header.php');
include('connection.php');
?>



<html>
<head>
   
    <title>Print</title>
    <style type="text/css" media="print">
        @media print{
            .noprint, .noprint *{
                display: none; !important;
            }
        }
    </style>

</head>
<body onload="print()">
    <div class="container">
            <center>
             <h3 style="margin-top: 30px;">Product List</h3>
            <h3>


            </center>
         <table id="ready" class="table table-striped table-bordered" style="width:100%;">
            <thead>
                <tr>
                    <th>First Name</th>
                <th>Middle Name</th>
                <th>Last Name</th>
                <th>Accoun #</th>
                <th>Gender</th>
                <th>Birthday</th>
                <th>Civil Status</th>
                <th>TIN</th>
                <th>Address</th>
                <th>Mobile no. 1</th>
                <th>Moble no. 2</th>
                <th>LandLine</th>
                <th>Occupation</th>
                <th>CBU Amount</th>
                <th>MSO Account</th>
                <th>CBU Date Update</th>
                <th>ARB Member</th>
                <th>RSBSA Member</th>
                </tr>
            </thead>
            <tbody>
                
                <?php 
                 $get_product_list = mysqli_query($link, "SELECT * FROM members");
                 while($row = mysqli_fetch_array($get_product_list)){
                    ?>
                    <tr>
                        <td><?php echo $row['fname']; ?></td>
                    <td><?php echo $row['mname']; ?></td>
                    <td><?php echo $row['lname']; ?></td>
                    <td><?php echo $row['acct']; ?></td>
                    <td><?php echo $row['gender']; ?></td>
                    <td><?php echo $row['bday']; ?></td>
                    <td><?php echo $row['cstatus']; ?></td>
                    <td><?php echo $row['tin']; ?></td>
                    <td><?php echo $row['address']; ?></td>
                    <td><?php echo $row['mobile']; ?></td>
                    <td><?php echo $row['mobile2']; ?></td>
                    <td><?php echo $row['telephone']; ?></td>
                    <td><?php echo $row['occupation']; ?></td>
                    <td><?php echo $row['cbu']; ?></td>
                    <td><?php echo $row['msoaccount']; ?></td>
                    <td><?php echo $row['cbudateupdate']; ?></td>
                    <td><?php echo $row['arb']; ?></td>
                    <td><?php echo $row['rsbsa']; ?></td>

                    </tr>

                    <?php 

                 }
                ?>
            </tbody>
        </table>
     </div>
     <div>
         <button type="" class="btn btn-info noprint" style="width:100%" onclick="window.location.replace('members.php');">CANCEL PRINTING</button>
     </div>
    
        

    </body>
    </html>