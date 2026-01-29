<?php
$conn = mysqli_connect("localhost", "root", "", "product_db");
$name = isset($_GET['name']) ? $_GET['name'] : '';

$result = mysqli_query($conn, "SELECT * FROM products WHERE name LIKE '%$name%' AND display='Yes'");

echo "<table border='1' cellpadding='8' cellspacing='0'>
<tr>
  <th>NAME</th>
  <th>PROFIT</th>
  <th colspan='2'></th>
</tr>";

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $profit = $row['selling_price'] - $row['buying_price'];
        echo "<tr>
                <td>{$row['name']}</td>
                <td>{$profit}</td>
                <td><a href='edit.php?id={$row['id']}'>edit</a></td>
                <td><a href='delete.php?id={$row['id']}'>delete</a></td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='4'>No products found</td></tr>";
}

echo "</table>";
?>

