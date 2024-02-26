<?php
include 'db_connection.php';

if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $sql = "SELECT * FROM books WHERE title LIKE '%$search%'";
    $result = $conn->query($sql);
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Search Results</title>
    <a href="index.php" style=" background-color: #4CAF50;
     text-decoration: none; color: #dddddd;margin-top: 50px;padding: 10px;">Back</a>
</head>
<body>
<h1>Search Results</h1>
<table border="1">
    <tr>
        <th>Book ID</th>
        <th>Title</th>
        <th>Author ID</th>
        <th>ISBN</th>
        <th>Publication Year</th>
        <th>Available</th>
    </tr>
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$row["bookId"]."</td>";
            echo "<td>".$row["title"]."</td>";
            echo "<td>".$row["authorId"]."</td>";
            echo "<td>".$row["ISBN"]."</td>";
            echo "<td>".$row["pub_year"]."</td>";
            echo "<td>".$row["available"]."</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='6'>No books found</td></tr>";
    }
    ?>
</table>
</body>
</html>
