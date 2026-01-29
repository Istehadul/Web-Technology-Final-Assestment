<?php
$conn = mysqli_connect("localhost", "root", "", "product_db");
$id = $_POST['id'];
$name = $_POST['name'];
$buying = $_POST['buying_price'];
$selling = $_POST['selling_price'];
$display = isset($_POST['display']) ? 'Yes' : 'No';

$sql = "UPDATE products SET name='$name', buying_price='$buying', selling_price='$selling', display='$display' WHERE id=$id";
mysqli_query($conn, $sql);

header("Location: display.php");
?>
