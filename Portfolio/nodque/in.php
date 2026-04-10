<?php
include('header.php');

$error = isset($error) ? $error : '';
$notification = isset($notification) ? $notification : '';

include('connection.php');

if(isset($_POST['submit'])){

    if(!$_POST['Iquantity']){

        $error = '<div class="text-danger" role="alert">Quantity is required</div>';

    }

    if($error !=""){

        $error= '<div class="text-danger" role="alert">Some fields are blank</div>';
    } else {

        include('connection.php');
        
        $iquantity= mysqli_real_escape_string($link,$_POST['Iquantity']);
       
      
      

        $Iquery = "INSERT INTO `products` (`stock`)VALUES('$iquantity')";        

        if(mysqli_query($link, $Iquery)){

            $notification = '<div class="text-primary" role="alert">Add Stocks Successful!</div>';           

        } else

        {
            $error = '<div class="text-warning" role="alert">Add New Stocks Failed!</div>'. mysqli_error($link);
        }
    }
}

?>        

<body>
<div class="container mt-5">
    <a href="menu.php"><img src="./images/test.JPG" id="complogo"></a>
    <?php echo $notification; ?>
    <?php echo $error; ?>

    <h1>Scan Products to ADD</h1>
    <div class="row">

    <form method="POST" class="row g-3 form-margin">

         <div class="col-md-12">
            <label for="Iquantity" class="form-label">Quantity</label>
            <input type="text" class="form-control" id="Iquantity" name="Iquantity">
        </div>             

        <div class="row oc-row">
            <div class="col-md-4"></div>
            <div class="col-md-4"></div>
            <div class="col-md-4">
              
    
            </div>
        </div> <!--End of occupation row  -->

        <div class="col-md-12">
            <button type="submit" class="btn btn-primary" name="submit" value="submit">Add Stocks</button>
        </div>
    </form>
</div>
<script type="text/javascript">
   

</script>
<?php

include('footer.php');
?>

