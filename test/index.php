<?php
include 'db_connection.php';

$sql = "SELECT * FROM books";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Library Management System</title>
</head>
<body>
<h2>Search Books</h2>
<form action="search.php" method="GET">
    <input type="text" name="search" placeholder="Enter book name">
    <input type="submit" value="Search">
</form>

<h1>List of Books</h1>
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
