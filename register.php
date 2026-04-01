<?php
require 'db.php';
$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = $_POST['username'];
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    
    try {
        $stmt->execute([$user, $pass]);
        $message = "<div class='message success'>Đăng ký thành công! <a href='login.php'>Đăng nhập ngay</a></div>";
    } catch (Exception $e) {
        $message = "<div class='message error'>Tên đăng nhập đã tồn tại!</div>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Đăng Ký</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Đăng Ký</h2>
        <?php echo $message; ?>
        <form method="POST">
            <input type="text" name="username" placeholder="Tên đăng nhập" required>
            <input type="password" name="password" placeholder="Mật khẩu" required>
            <button type="submit">Đăng Ký</button>
        </form>
        <p>Đã có tài khoản? <a href="login.php">Đăng nhập</a></p>
    </div>
</body>
</html>