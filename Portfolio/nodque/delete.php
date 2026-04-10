<?php
include('connection.php');
$db=mysqli_select_db($connection, 'inventory');

if(isset($_POST['delete']))
{
    $id=$_POST['id'];
    $query="DELETE FROM student WHERE id='$id'";
    $query_run=mysqli_query($connection, $query);

    if($query_run)
    {
        echo '<script> alert("data Deleted"); </script>';
        header("location:inventory.php");
    }
    else
    {   
        echo '<script> alert("data not Deleted"); </script>';
    }
}
?>

