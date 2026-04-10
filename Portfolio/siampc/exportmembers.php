<?php 

include('./header.php');
include('connection.php');


header('Content-type: application/vnd-ms-excel');
$filename="members.xls";
header("Content-Disposition:attachment;filename=\"$filename\" ");

?>
<table class="table table-bordered table-hover table-sm" id="mytable">
    <th style="border:2px solid black;"><?php
// Set the default time zone to the current location
date_default_timezone_set('Asia/Manila');

// Create a new DateTime object with the current date and time
$datetime = new DateTime();

// Output the date and time in Philippine time zone
echo  $datetime->format('Y-m-d H:i:s');
?>
 </th>
        <thead>
            <tr>
                <th style="border:2px solid black;">First Name</th>
                <th style="border:2px solid black;">Middle Name</th>
                <th style="border:2px solid black;">Last Name</th>
                <th style="border:2px solid black;">Accoun #</th>
                <th style="border:2px solid black;">Gender</th>
                <th style="border:2px solid black;">Birthday</th>
                <th style="border:2px solid black;">Civil Status</th>
                <th style="border:2px solid black;">TIN</th>
                <th style="border:2px solid black;">Address</th>
                <th style="border:2px solid black;">Mobile no. 1</th>
                <th style="border:2px solid black;">Moble no. 2</th>
                <th style="border:2px solid black;">LandLine</th>
                <th style="border:2px solid black;">Occupation</th>
                <th style="border:2px solid black;">CBU Amount</th>
                <th style="border:2px solid black;">MSO Account</th>
                <th style="border:2px solid black;">CBU Date Update</th>
                <th style="border:2px solid black;">ARB Member</th>
                <th style="border:2px solid black;">RSBSA Member</th>

            </tr>
        </thead>
        <tbody>
            <?php 
            $sn = 1;
            $query = "SELECT * FROM members";
            $result=mysqli_query($link, $query);
            while($productdata=mysqli_fetch_assoc($result)){
                ?>
                <tr>
                    
                    <td style="border:2px solid black;"><?php echo $productdata['fname']; ?></td>
                    <td style="border:2px solid black;"><?php echo $productdata['mname']; ?></td>
                    <td style="border:2px solid black;"><?php echo $productdata['lname']; ?></td>
                    <td style="border:2px solid black;"><?php echo $productdata['acct']; ?></td>
                    <td style="border:2px solid black;"><?php echo $productdata['gender']; ?></td>
                    <td style="border:2px solid black;"><?php echo $productdata['bday']; ?></td>
                    <td style="border:2px solid black;"><?php echo $productdata['cstatus']; ?></td>
                    <td style="border:2px solid black;"><?php echo $productdata['tin']; ?></td>
                    <td style="border:2px solid black;"><?php echo $productdata['address']; ?></td>
                    <td style="border:2px solid black;"><?php echo $productdata['mobile']; ?></td>
                    <td style="border:2px solid black;"><?php echo $productdata['mobile2']; ?></td>
                    <td style="border:2px solid black;"><?php echo $productdata['telephone']; ?></td>
                    <td style="border:2px solid black;"><?php echo $productdata['occupation']; ?></td>
                    <td style="border:2px solid black;"><?php echo $productdata['cbu']; ?></td>
                    <td style="border:2px solid black;"><?php echo $productdata['msoaccount']; ?></td>
                    <td style="border:2px solid black;"><?php echo $productdata['cbudateupdate']; ?></td>
                    <td style="border:2px solid black;"><?php echo $productdata['arb']; ?></td>
                    <td style="border:2px solid black;"><?php echo $productdata['rsbsa']; ?></td>

                </tr>
                <?php
                $sn++;
            }

            ?>
        </tbody>
    </table>