<?php
session_start();
//kiem tra neu nguoi dung chua dang nhap -> chuyen den trang dang nhap
if (!isset($_SESSION['user_id'])){
    header("Location: index.php");
    exit();
}
include 'StudentManager.php';

//ket noi StudentManager
$studentManager = new StudentManager();

//lay danh sach sinh vien va thong tin diem
$students = $studentManager->getAllStudentsWithMarks();
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

    <a href="logout.php" class="btn btn-danger">Logout</a>

    <h3>Student list</h3>
    <a href="add_student.php" class="btn btn-success mb-3">Add Student</a>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Address</th>
            <th>Action</th>
            <th>Mark Details</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($students AS $student): ?>
            <tr>
                <td><?php echo $student['id']; ?></td>
                <td><?php echo $student['name']; ?></td>
                <td><?php echo $student['address']; ?></td>

                <td>
                    <a href="edit_student.php?id=<?php echo $student['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="delete_student.php?id=<?php echo $student['id']; ?>" class="btn btn-danger btn-sm"
                       onclick="return confirm('Are you sure want to delete this student ?')">Delete</a>
                </td>
                <td>
                    <?php
                    //kiem tra xem sinh vien co diem khong ?
                    if($student['mark_count'] > 0){
                        echo '<a href="mark_detail.php?student_id= ' .$student['id'] .'" class="btn btn-info btn-sm">Mark Details</a>';
                    }else{
                        echo '<button class="btn btn-infor btn-sm" disabled>Mark Details</button>';
                    }
                    ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>
