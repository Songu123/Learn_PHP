<?php
$server = "localhost"; // IP hoặc domain kết nối để CSDL
$username = "root"; // Người dùng sử dụng để kết nối đến CSDL với PHP
$password = ""; // Mật khẩu sử dụng để kết nối đến CSDL với PHP
$database = "ecommerce"; // Tên database

try {
    // Kết nối đến MySQL với PHP sử dụng PDO
    $conn = new PDO("mysql:host=$server;dbname=$database", $username, $password);
    // Thiết lập chế độ lỗi và ngoại lệ
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Không echo và không đóng kết nối ở đây
} catch (PDOException $e) {
    echo "Kết nối thất bại: " . $e->getMessage();
}