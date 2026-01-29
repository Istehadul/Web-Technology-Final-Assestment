<?php
$conn = mysqli_connect("localhost", "root", "", "product_db");
$id = $_GET['id'];
$row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM products WHERE id=$id"));
?>

<h3 style="border:1px solid black; padding:10px; width:300px;">DELETE PRODUCT</h3>
<div style="border:1px solid black; padding:10px; width:300px;">
  Name: <?php echo $row['name']; ?><br>
  Buying Price: <?php echo $row['buying_price']; ?><br>
  Selling Price: <?php echo $row['selling_price']; ?><br>
  Displayable: <?php echo $row['display']; ?><br><br>

  <form method="post" action="confirm_delete.php">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    <input type="submit" value="Delete">
  </form>
</div>

