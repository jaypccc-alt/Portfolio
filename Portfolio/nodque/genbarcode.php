<?php
include('header.php');

?>

	<div class="container">

		<div class="row" style="margin-top: 200px;">
			<div class="col"></div>
			<div class="col">
			<form method="post" action="barcode.php"> 

				<div class="form-group">
					<label for="genbcode" style="margin-left: 80px; margin-bottom: 10px;"><strong>Generate Product Barcode</strong></label>
					 <input type="text" id="genbcode" class="form-control" name="generate" placeholder="Enter text here to generate barcode">
					 <input type="submit" class="btn btn-success" name="submit" value="submit" style="margin-left:130px; margin-top: 20px;">
			 	</div>

			</form>
			</div><!--col w/ row inside -->
			<div class="col"></div>

		</div><!--end of row -->

</div>

<?php


include('footer.php');

?>
