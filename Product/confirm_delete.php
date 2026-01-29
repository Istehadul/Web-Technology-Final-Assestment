<?php
$conn = mysqli_connect("localhost", "root", "", "product_db");
$id = $_POST['id'];

if ($id) {
    mysqli_query($conn, "DELETE FROM products WHERE id=$id");
    echo "<h3>Product Deleted Successfully!</h3>";
} else {
    echo "<h3>Error: Product ID not found.</h3>";
}
?>
