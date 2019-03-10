<?php 
include 'inc/header.php'; 
include "config.php";
include "Database.php";
//include "update.php";

?>

<?php 
 $db = new Database();
 $orderBy="mark";
 $order="desc";
 if(!empty($_GET["orderby"]))
 {
 	$orderBy=$_GET["orderby"];
 }
 if(!empty($_GET["order"]))
 	{
 		$order=$_GET["oder"];
 	}
 $query = "SELECT * FROM resulttb ORDER BY ".$orderBy." ".$order;
 $read = $db->select($query);
?>

<?php 
if(isset($_GET['msg'])){
 echo "<span style='color:green'>".$_GET['msg']."</span>";
}
?>

<table class="tblone">
<tr>
 <th width="10%">Id</th>
 <th width="30%">Name</th>
 <th width="20%">Result</th>
 <th width="10%">Mark</th>
 <th width="20%">Merit Position</th>
 <th width="10%">Action</th>
</tr>
<?php if($read){?>
<?php 
$i=1;
while($row = $read->fetch_assoc()){
	$id=$row['id'];
$res=$row['mark'];
//echo $res;
if($res<40)
{
	$query = "UPDATE resulttb
  SET
  rank='_'
  WHERE id = $id";
  $update = $db->update($query);
}
else{
$query = "UPDATE resulttb
  SET
  rank= '$i'
  WHERE id = $id";
  $update = $db->update($query);
}
?>
<tr>
 <td><?php echo $row['id']; ?></td>
 <td><?php echo $row['name']; ?></td>
 <td><?php echo $row['result']; ?></td>
 <td><?php echo $row['mark']; ?></td>
 <td><?php echo $row['rank'] ?></td>
 <td><a href="update.php?id=<?php echo urlencode($row['id']); ?>">
  Edit</a></td>
</tr>
<?php
   $i=$i+1; 
} ?>
<?php } else { ?>
<p>Data is not available !!</p>
<?php } ?>
</table>
<a href="create.php">Create</a>
<?php include 'inc/footer.php'; ?>