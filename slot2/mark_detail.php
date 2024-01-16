<?php
session_start();

//kiem tra neu nguoi dung chua dang nhap, chuyen huong den trang dang nhap
if (!isset($_SESSION['user_id'])){
    header("Location: index.php");
    exit();
}

include "StudentManager.php";

//lay danh sach sinh vien va diem theo mon hoc
$studentManager = new StudentManager();
$markDetails = $studentManager->getMarkDetails();
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

    <h2>Mark details</h2>
    <a href="add_student.php" class="btn btn-success mb-3">Add Student</a>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Subject</th>
            <th>Mark</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($markDetails AS $markDetail): ?>
            <tr>
                <td><?php echo $markDetail['id']; ?></td>
                <td><?php echo $markDetail['name']; ?></td>
                <td><?php echo $markDetail['subject']; ?></td>
                <td><?php echo $markDetail['mark']; ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>