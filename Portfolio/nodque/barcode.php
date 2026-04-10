<?php


include 'barcode128.php';
echo '<center><div style="height: 30%; width: 50%;">';
echo '<p style="margin-top: 200px;">'.bar128(stripcslashes($_POST['generate'])).'</p>';
echo '</div></center>';


//$image = bar128(stripcslashes($_POST['generate']));


?>
