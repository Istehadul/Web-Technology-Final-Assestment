<?php
$conn = mysqli_connect("localhost", "root", "", "product_db");

$name = $_POST['name'];
$buying = $_POST['buying_price'];
$selling = $_POST['selling_price'];
$display = isset($_POST['display']) ? 'Yes' : 'No';

$sql = "INSERT INTO products (name, buying_price, selling_price, display)
        VALUES ('$name', '$buying', '$selling', '$display')";

if (mysqli_query($conn, $sql)) {
    echo "Product saved successfully.";
} else {
    echo "Error: " . mysqli_error($conn);
}

?>
