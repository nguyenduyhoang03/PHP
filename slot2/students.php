<?php
session_start();

//kiem tra neu nguoi dung chua dang nhap -> chuyen ve trang dang nhap
if (!isset($_SESSION['user_id'])){
    header("Location: index.php");
    exit();
}

//ket noi den StudentManager
include 'StudentManager.php';
$studentManager = new StudentManager();

//lay danh sach sinh vien
$studentManager = $studentManager->getAllStudents();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Welcome,<?php echo $_SESSION['username'];?> !</h2>
        <p>This is the main page after successful login.</p>
        <a href="Logout.php" class="btn btn-danger">Logout</a>

        <h3>Student list</h3>
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($students AS $student): ?>
                <tr>
                    <td><?php echo $student['id']; ?></td>
                    <td><?php echo $student['name']; ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
