<?php 
include 'inc/header.php';
?>
<div class="container" style="width: 400px;margin: 100px;">
		<div class="card">
			<div class="card-body">
<h3>Admin Login</h3>
<form class="form-group" action="func.php" method="post">
			<label>Username :</label><br>
			<input type="text" name="username" class="form-control" placeholder="enter username"><br>
			<label>Password :</label><br>
			<input type="password" name="password" class="form-control" placeholder="enter password"><br>
			<input type="submit" name="login_submit" id="ab1" class="btn btn-primary">
		</form>
	</div>
</div>
</div>
<?php include 'inc/footer.php'; ?>