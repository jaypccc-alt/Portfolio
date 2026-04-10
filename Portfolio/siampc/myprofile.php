<?php
include('header.php');

session_start();

if(empty($_SESSION['id'])):
    header('Location:./index.php');
endif;

if(array_key_exists("id", $_COOKIE)) {

    $_SESSION['id'] = $_COOKIE['id'];
}

include('connection.php');
$sql = "SELECT * FROM users";
$query = mysqli_query($link,$sql);
?>






<?php
include('footer.php');
?>
