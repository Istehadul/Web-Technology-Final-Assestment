<?php
$conn = mysqli_connect("localhost", "root", "", "product_db");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Product Search Interface</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .search-section {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        .search-section input[type="text"] {
            padding: 6px;
            border: 2px solid blue;
            border-radius: 4px;
            width: 200px;
            margin-right: 10px;
        }
        .search-section button {
            padding: 6px 12px;
            font-weight: bold;
            cursor: pointer;
        }
        table {
            border-collapse: collapse;
            width: 400px;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
    </style>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const searchInput = document.getElementById("search");
            const searchButton = document.getElementById("searchBtn");

            function performSearch() {
                let name = searchInput.value;
                if (name.length > 0) {
                    fetch("search.php?name=" + encodeURIComponent(name))
                        .then(res => res.text())
                        .then(data => {
                            document.getElementById("result").innerHTML = data;
                            document.getElementById("default").style.display = "none";
                        });
                } else {
                    document.getElementById("result").innerHTML = "";
                    document.getElementById("default").style.display = "block";
                }
            }

            searchInput.addEventListener("keyup", performSearch);
            searchButton.addEventListener("click", performSearch);
        });
    </script>
</head>
<body>

<div class="search-section">
    <input type="text" id="search" placeholder="">
    <button id="searchBtn">Search By Name</button>
</div>

<div id="result"></div>

<div id="default">
    <table>
        <tr>
            <th>NAME</th>
            <th>PROFIT</th>
            <th colspan="2"></th>
        </tr>
        <?php
        $result = mysqli_query($conn, "SELECT * FROM products WHERE display='Yes'");
        while($row = mysqli_fetch_assoc($result)) {
            $profit = $row['selling_price'] - $row['buying_price'];
            echo "<tr>
                    <td>{$row['name']}</td>
                    <td>{$profit}</td>
                    <td><a href='edit.php?id={$row['id']}'>edit</a></td>
                    <td><a href='delete.php?id={$row['id']}'>delete</a></td>
                  </tr>";
        }
        ?>
    </table>
</div>

</body>
</html>
