<?php
require 'db.php';
session_start();
$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$user]);
    $db_user = $stmt->fetch();

    if ($db_user && password_verify($pass, $db_user['password'])) {
        $_SESSION['user'] = $db_user['username'];
        echo "<script>alert('Đăng nhập thành công!'); window.location='welcome.php';</script>";
    } else {
        $message = "<div class='message error'>Đăng nhập thất bại! Sai tài khoản hoặc mật khẩu.</div>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Đăng Nhập</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Đăng Nhập</h2>
        <?php echo $message; ?>
        <form method="POST">
            <input type="text" name="username" placeholder="Tên đăng nhập" required>
            <input type="password" name="password" placeholder="Mật khẩu" required>
            <button type="submit">Đăng Nhập</button>
        </form>
        <p>Chưa có tài khoản? <a href="register.php">Đăng ký</a></p>
    </div>
</body>
</html>