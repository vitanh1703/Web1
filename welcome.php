<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Trang chủ</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Chào mừng, <?php echo $_SESSION['user']; ?>!</h2>
        <p>Bạn đã đăng nhập thành công vào hệ thống.</p>
        <a href="logout.php"><button style="background-color: #d9534f;">Đăng xuất</button></a>
    </div>
</body>
</html>