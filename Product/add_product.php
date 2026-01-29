<?php
$conn = mysqli_connect("localhost", "root", "", "product_db");

$name = $_POST['name'];
$buying = $_POST['buying_price'];
$selling = $_POST['selling_price'];
$display = isset($_POST['display']) ? 'Yes' : 'No';

$sql = "INSERT INTO products (name, buying_price, selling_price, display)
        VALUES ('$name', '$buying', '$selling', '$display')";
mysqli_query($conn, $sql);

header("Location: display.php");
?>
