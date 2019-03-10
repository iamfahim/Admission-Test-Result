<?php 
include 'inc/header.php'; 
include "config.php";
include "Database.php";
?>
<?php 
 $db = new Database();
if(isset($_POST['submit'])){
  $id = mysqli_real_escape_string($db->link, $_POST['id']);
 $name  = mysqli_real_escape_string($db->link, $_POST['name']);
 //$result = mysqli_real_escape_string($db->link, $_POST['result']);
 $mark = mysqli_real_escape_string($db->link, $_POST['mark']);
 //$rank = mysqli_real_escape_string($db->link, $_POST['rank']);
 if($id =='' || $name == '' || $mark == ''){
  $error = "Field must not be Empty !!";
 } else {
    $result;
    if($mark>=40)
    {
       $result="Passed";
    }
    else
    {
      $result="Failed";
    }
  $query = "INSERT INTO resulttb(id ,name, result, mark) 
   Values('$id','$name', '$result', '$mark')";
  $create = $db->insert($query);
 }
}
?>

<?php 
if(isset($error)){
 echo "<span style='color:red'>".$error."</span>";
}
?>
<form action="create.php" method="post">
<table>
  <tr>
  <td>Id</td>
  <td><input type="text" name="id" placeholder="Please enter id"/></td>
 </tr>
 <tr>
  <td>Name</td>
  <td><input type="text" name="name" placeholder="Please enter name"/></td>
 </tr>
 <!--<tr>
  <td>Result</td>
  <td><input type="text" name="result" placeholder="Please enter result"/></td>
 </tr>
-->

 <tr>
  <td>Mark</td>
  <td><input type="text" name="mark" placeholder="Please enter mark"/></td>
 </tr>
 
 <!--<tr>
  <td>Rank</td>
  <td><input type="text" name="rank" placeholder="Please enter rank"/></td>
 </tr>
 <tr>
 -->
  <td></td>
  <td>
  <input type="submit" name="submit" value="Submit"/>
  <input type="reset" Value="Cancel" />
  </td>
 </tr>

</table>
</form>
<a href="admin.php">Go Back</a>
<?php include 'inc/footer.php'; ?>