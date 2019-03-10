<?php 
include 'inc/header.php'; 
include "config.php";
include "Database.php";
?>
<?php 
 $id = $_GET['id'];
 $db = new Database();
 $query = "SELECT * FROM resulttb WHERE id=$id";
 $getData = $db->select($query)->fetch_assoc();
 
if(isset($_POST['submit'])){
 $name  = mysqli_real_escape_string($db->link, $_POST['name']);
 //$result = mysqli_real_escape_string($db->link, $_POST['result']);
 $mark = mysqli_real_escape_string($db->link, $_POST['mark']);
 //$rank = mysqli_real_escape_string($db->link, $_POST['rank']);

 if($name == ''|| $mark == ''){
  $error = "Field must not be Empty !!";
 } else {
  $query = "UPDATE resulttb
  SET
  name  = '$name',
  mark = '$mark'
  WHERE id = $id";

  $update = $db->update($query);
 }
}
?>

<?php
if(isset($_POST['delete'])) 
{
  $query= "DELETE FROM resulttb WHERE id=$id";
  $deleteData = $db->delete($query);
}
?>

<?php 
if(isset($error)){
 echo "<span style='color:red'>".$error."</span>";
}
?>
<form action="update.php?id=<?php echo $id;?>" method="post">
<table>
 <tr>
  <td>Name</td>
  <td><input type="text" name="name" 
  value="<?php echo $getData['name'] ?>"/></td>
 </tr>
 <!--
 <tr>
  <td>Result</td>
  <td><input type="text" name="result"
  value="<?php //echo $getData['result'] ?>"/></td>
 </tr>
 -->
 <tr>
  <td>Mark</td>
  <td><input type="text" name="mark" 
  value="<?php echo $getData['mark'] ?>"/></td>
 </tr>

<!--
  <tr>
  <td>Rank</td>
  <td><input type="text" name="rank" 
  value="<?php echo $getData['rank'] ?>"/></td>
 </tr>
-->

 <tr>
  <td></td>
  <td>
  <input type="submit" name="submit" value="Update"/>
  <input type="reset" Value="Cancel" />
  <input type="submit" name="delete" Value="Delete" />
  </td>
 </tr>

</table>
</form>
<a href="admin.php">Go Back</a>
<?php include 'inc/footer.php'; ?>