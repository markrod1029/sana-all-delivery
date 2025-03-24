<?php
include('include/session.php');
if(!empty($_POST["cat_id"])) 
{
 $id=intval($_POST['cat_id']);
$query=mysqli_query($conn,"SELECT *, farmer.id AS fid FROM farmer LEFT JOIN category ON category.id=farmer.shop_category WHERE farmer.id=$id ");
?>
<?php
 while($row=mysqli_fetch_array($query))
 {
  ?>
  <option value="<?php echo $row['id']; ?>"><?php echo htmlentities($row['categoryName']); ?></option>
  <?php
 }
}
?>