<?php
    include('./header.php');
    include('connection.php');

    
?>  

<div>
    <div class="text-center">
        <a href="exportmembers.php" class="btn btn-primary" target="_blank">Convert to Excel</a>
        
    </div>
    <table class="table table-bordered table-hover table-sm" id="mytable">
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
            $sn = 1;
            $query = "SELECT * FROM members";
            $result=mysqli_query($link, $query);
            while($productdata=mysqli_fetch_assoc($result)){
                ?>
                <tr>
                    
                    <td><?php echo $productdata['fname']; ?></td>
                    <td><?php echo $productdata['mname']; ?></td>
                    <td><?php echo $productdata['lname']; ?></td>
                    <td><?php echo $productdata['acct']; ?></td>
                    <td><?php echo $productdata['gender']; ?></td>
                    <td><?php echo $productdata['bday']; ?></td>
                    <td><?php echo $productdata['cstatus']; ?></td>
                    <td><?php echo $productdata['tin']; ?></td>
                    <td><?php echo $productdata['address']; ?></td>
                    <td><?php echo $productdata['mobile']; ?></td>
                    <td><?php echo $productdata['mobile2']; ?></td>
                    <td><?php echo $productdata['telephone']; ?></td>
                    <td><?php echo $productdata['occupation']; ?></td>
                    <td><?php echo $productdata['cbu']; ?></td>
                    <td><?php echo $productdata['msoaccount']; ?></td>
                    <td><?php echo $productdata['cbudateupdate']; ?></td>
                    <td><?php echo $productdata['arb']; ?></td>
                    <td><?php echo $productdata['rsbsa']; ?></td>

                </tr>
                <?php
                $sn++;
            }

            ?>
        </tbody>
    </table>
    
</div>
