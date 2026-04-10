<?php
include('./header.php');
?>
<?php
$getId=$_GET['Receive'];

$productReceiveQuery="
SELECT * 
FROM `inventory` 
WHERE `id`='$getId'";
?>
<?php
include('connection.php');
$receive = mysqli_query($link,"SELECT * FROM inventory");
$receive2 = mysqli_query($link,"SELECT * FROM receiving");
?>
<select>
<?php
while ($r = mysqli_fetch_array($receive))
{
    ?>
    <option><?php echo $r['productname'];?></option>
<?php
}
?>
</select>
<?php
include('connection.php');
    if(isset($_POST['submit'])){
        $s = "SELECT 'qtyon' FROM receiving";
        $s2 = "SELECT 'stock' FROM inventory";
        $s3 = $s + $s2; 
        $Iquery = "INSERT INTO `inventory` (`stock`)
        VALUES('$s3') WHERE 'id' = '$getId";
        
        include('connection.php');

        if(mysqli_query($link, $Iquery)){

            $notification = '<div class="text-primary" role="alert"><span id="notifyUpdate">Receive Successful!</span></div>';
            

        } else {

            $error = '<div class="text-warning" role="alert">Receive Failed!</div>'. mysqli_error($link);
            $error1 = '<div class="text-warning" role="alert">Error Code</div>' .mysqli_errno($link);

        }


    }
?>
<button style="margin-top: 5px;" type="submit" class="btn btn-primary" name="submit" value="submit">Save Data</button>
<?php 
include('footer.php');
?>