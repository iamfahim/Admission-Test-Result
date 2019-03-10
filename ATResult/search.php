<?php 
include 'inc/header.php';
session_start();
?>
<div class="container" style="width: 400px;margin: 100px;">
		<div class="card">
			<div class="card-body">
<h3>Search The Result</h3>
<form class="form-group" action="search_fun.php" method="post">
			<label>Enter Admission Roll :</label><br>
			<input type="text" name="search_id" class="form-control" placeholder="enter roll"><br>
			<?php

			$a=rand(1,10);
			$b=rand(1,10);
		    $sum=$a+$b;
		    $_SESSION['vname']=$sum;
		   // echo $_SESSION['vname'];
			?>
			<label>Please Confirm You Are Not a Robot  : </label><br>
			<?php echo $a;
			echo "+";
			echo $b; 
			echo "="; 
			?><br>
			<input type="text" name="ans" class="form-control" placeholder="enter the sum of above two value"><br>
			<input type="submit" class="btn btn-primary">
		</form>
		
	</div>
</div>
</div>
<?php include 'inc/footer.php'; ?>