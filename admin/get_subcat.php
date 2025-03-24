<?php
include('include/session.php');
if(!empty($_POST["cat_id"])) 
{
 $id=intval($_POST['cat_id']);
$query=mysqli_query($conn,"SELECT * FROM subcategory WHERE farmer_id=$id");
?>
<option value="">Select Subcategory</option>
<?php
 while($row=mysqli_fetch_array($query))
 {
  ?>
  <option value="<?php echo $row['id']; ?>"><?php echo htmlentities($row['subcategory']); ?></option>
  <?php
 }
}
?>