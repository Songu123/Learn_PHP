<?php
// Bắt đầu session
session_start();

// Xử lý đăng nhập
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Kiểm tra thông tin đăng nhập (giả lập)
    if ($username === "admin" && $password === "123456") {
        $_SESSION['user'] = $username; // Lưu tên người dùng vào session
        echo "Đăng nhập thành công!";
    } else {
        echo "Sai tên đăng nhập hoặc mật khẩu.";
    }
}

// Kiểm tra trạng thái đăng nhập
if (isset($_SESSION['user'])) {
    echo "<br>Xin chào, " . htmlspecialchars($_SESSION['user']);
    echo '<br><a href="logout.php">Đăng xuất</a>';
} else {
    echo "<br>Bạn chưa đăng nhập.";
}
?>

<!-- Form đăng nhập -->
<form method="post">
    <label>Tên đăng nhập:</label>
    <input type="text" name="username"><br>
    <label>Mật khẩu:</label>
    <input type="password" name="password"><br>
    <input type="submit" value="Đăng nhập">
</form>