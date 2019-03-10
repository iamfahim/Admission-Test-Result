<?php 
include 'inc/header.php';
session_start();
//include 'search.php';
?>
<div class="container" style="width: 500px;margin: 100px;">
		<div class="card">
			<div class="card-body">
<h3>Result :</h3>
<?php

$conn=mysqli_connect("localhost","root","","atresultdb");

    $ans=$_POST['ans'];
    $sum=$_SESSION['vname'];
		if($sum==$ans)
		{
$set=$_POST['search_id'];
if($set)
{
	$show="SELECT * FROM resulttb WHERE id='$set'";
	$result=mysqli_query($conn,$show);
	//$query=mysql_query("SELECT * FROM resulttb WHERE id='$set'");
	$count=mysqli_num_rows($result);
	if($count==0)
	{
		echo "<script>alert('Result is not found in this database')</script>";
		echo "<script>window.open('search.php','_self')</script>";
	}
	else{
	while($rows=mysqli_fetch_array($result))
	{
?>
		<label>Roll : <?php echo $rows['id'];?></label><br>
		<label>Name : <?php echo $rows['name'];?></label><br>
		<label>Result : <?php echo $rows['result'];?></label><br>
		<label>Mark  : <?php echo $rows['mark'];?></label><br>
		<label>Merit Position : <?php echo $rows['rank'];?></label><br>
		<br><br>
		<a href="search.php">Search Again</a>
<?php
	}
    
}
}
}
else
 {
 	    echo $sum;
 	    echo $value;
	    echo "<script>alert('You are robot')</script>";
		echo "<script>window.open('search.php','_self')</script>";
        }
?>
	</div>
</div>
</div>
<?php include 'inc/footer.php'; ?>