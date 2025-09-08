<?php
// Nếu người dùng bấm nút gửi form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']); // lấy dữ liệu từ form và chống XSS
    $age = (int) $_POST['age']; // ép kiểu sang số nguyên

    echo "<h2>Xin chào, $name!</h2>";
    echo "<p>Tuổi của bạn là: $age</p>";
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Trang web PHP đơn giản</title>
</head>
<body>
    <h1>Nhập thông tin của bạn</h1>
    <form method="post" action="">
        <label for="name">Tên:</label>
        <input type="text" id="name" name="name" required>
        <br><br>
        
        <label for="age">Tuổi:</label>
        <input type="number" id="age" name="age" required>
        <br><br>
        
        <button type="submit">Gửi</button>
    </form>
</body>
</html>
