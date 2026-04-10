<?php
include('./header.php');

?>
<section id="view-students">
	<div class="container">

							 <table class="table table-bordered table-hover table-sm " id="mytable">
							    <thead>
							    <tr class="table-info">
						
						        <th scope="col"><h5>Account #</h5></th>						      
						        <th scope="col"><h5>First Name</h5></th>
						        <th scope="col"><h5>Middle Name</h5></th>
						        <th scope="col"><h5>Last Name</h5></th>
						        <th scope="col"><h5>Gender</h5></th>
						        <th scope="col"><h5>Details</h5></th>
						             
						    </tr>
						    </thead>
				
			
			
							<?php
							include('connection.php');

							//$getstudents= "SELECT * FROM `students`";

							$getMembers = "SELECT id, acct, address, fname, mname, lname, gender FROM members";

							$result=mysqli_query($link,$getMembers);
							while($row = mysqli_fetch_array($result)){

							$getMemberId=$row['id'];
 						    $getAcct=$row['acct'];
  							$getFname=$row['fname'];
   							$getMname=$row['mname'];
   							$getLname=$row['lname'];
 							$getAddress=$row['address'];
    						$getGender=$row['gender'];
?>
    						<tr>
    							<td><?php echo $getAcct; ?></td>            
           						<td><?php echo $getFname; ?></td>
          						<td><?php echo $getMname; ?></td>
           						<td><?php echo $getLname; ?></td>           						
           						<td><?php echo $getGender; ?></td>

           						 <td><a href="memberfulldetails.php?Details=<?php echo "$getMemberId";?>">Details</a></td>

    						</tr>
							
							</div>
</section>	

<?php }
include('./footer.php');
?>

