<?php
session_start();

//kiểm tra nếu người dùng đã đăng nhập, Chuyển hướng đến trang dashboard.php
if(isset($_SESSION['user_id'])){
    header("location: dashboard.php");
    exit();
}

//kiểm tra nếu người dùng đã gửi form đăng nhập
if ($_SERVER["REQUEST_METHOD"]== "POST"){
    //kết nối tới DB
        include 'StudentManager.php';
        $StudentManager = new StudentManager();

   //lấy dữ liệu từ form đăng nhập
    $username = $_POST["username"];
    $password = $_POST["password"];

    //Thực hiện truy vấn kiểm tra đăng nhập
    $sql = "select * from Account WHERE username = ? AND password = ?";
    $stmt = $StudentManager->conn-> prepare($sql);
    $stmt -> bind_param("ss",$username, $password);
    $stmt -> execute();

    $result = $stmt -> get_result();

    if ($result -> num_rows == 1){
        //đăng nhập thành công, lưu thông tin user vào session
        $row = $result -> fetch_assoc();
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['user_name'] = $row['username'];

        //chuyển hướng đến trang dashboard
        header("Location: dashboard.php");
        exit();
    }else{
        $error_message = "Sai tài khoản hoặc mật khẩu";
    }
    $stmt -> close();
}
?>



    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>
    <body>
    <div class="container mt-5">
        <h2>Login</h2>

            <?php
            if(isset($error_message)){
            echo '<div class= "alert alert-danger">' . $error_message . '</div>';
            }
    ?>
    <form method = "post" action="">
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="form-control">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
    </div>
</body>
</html>