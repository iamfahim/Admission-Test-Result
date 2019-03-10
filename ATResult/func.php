<?php
$con=mysqli_connect("localhost","root","","atresultdb");
if (isset($_POST['login_submit'])) {
	$username=$_POST['username'];
	$password=$_POST['password'];
	$query="select *from logintb where username='$username' and password='$password'";
	$result=mysqli_query($con,$query);
	if(mysqli_num_rows($result)==1)
	{
		header("Location:admin.php");
	}
	else
	{
		echo "<script>alert('Error login')</script>";
		echo "<script>window.open('index.php','_self')</script>";
	}
}
?>