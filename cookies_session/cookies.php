<?php
if (isset($_POST['username'])) {
    $username = $_POST['username'];
    // Thiết lập cookie với tên 'username' và giá trị từ biểu mẫu, thời gian sống là 1 giờ
    setcookie('username', $username, time() + 3600); // Cookie tồn tại trong 1 giờ
    echo "Cookie đã được thiết lập cho tên người dùng: " . htmlspecialchars($username);
}
if (isset($_COOKIE['username'])) {
    echo "\nChào mừng trở lại, " . htmlspecialchars($_COOKIE['username']) . "!";
} else {
    echo "Chưa có cookie nào được thiết lập.";
}
?>

<!-- Form để gửi tên người dùng -->
<form method="post">
    <label>Nhập tên của bạn:</label>
    <input type="text" name="username">
    <input type="submit" value="Lưu tên">
</form>