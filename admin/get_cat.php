<?php
include('include/session.php');
if(!empty($_POST["cat_id"])) 
{
 $id=intval($_POST['cat_id']);
$query=mysqli_query($conn,"SELECT *, shops.id AS fid FROM shops LEFT JOIN category ON category.id=shops.shop_category WHERE shops.id=$id ");
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