<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $errors = [];

    if (empty($name)) {
        $errors[] = "Tên không được để trống.";
    } elseif (!preg_match("/^[a-zA-ZÀ-ỹ\s'-]{2,}$/u", $name)) {
        $errors[] = "Tên chỉ được chứa chữ cái, khoảng trắng, dấu - hoặc ', và ít nhất 2 ký tự.";
    }

    if (empty($email)) {
        $errors[] = "Email không được để trống.";
    } elseif (!preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $email)) {
        $errors[] = "Email không hợp lệ.";
    }

    if (!empty($errors)) {
        echo "<h3 style='color:red'>Lỗi:</h3>";
        foreach ($errors as $err) {
            echo "<p style='color:red'>- $err</p>";
        }
        echo "<a href='baith4_2.php'>Quay lại</a>";
    } else {
        echo "<h3 style='color:green'>Đăng nhập thành công!</h3>";
        echo "<p>Xin chào <b>$name</b> - Email: <b>$email</b></p>";
    }
}
?>
