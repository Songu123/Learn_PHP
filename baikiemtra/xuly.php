<?php
session_start();

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = isset($_POST['username']) ? htmlspecialchars($_POST['username']) : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    // Kiểm tra dữ liệu (ví dụ đơn giản)
    if (empty($username)) {
        $errors[] = "Tên không được để trống.";
    } elseif (!preg_match("/^[a-zA-ZÀ-ỹ\s'-]{2,}$/u", $username)) {
        $errors[] = "Tên chỉ được chứa chữ cái, khoảng trắng, dấu - hoặc ', và ít nhất 2 ký tự.";
    }
    if (empty($password)) {
        $errors[] = "Mật khẩu không được để trống.";
    }

    // Tài khoản kiểm tra
    $valid_username = 'admin';
    $valid_password = '123456';

    if (empty($errors)) {
        if ($username === $valid_username && $password === $valid_password) {
            $_SESSION['user'] = $username;
            header('Location: index.php');
            exit;
        } else {
            $error = "Tên đăng nhập hoặc mật khẩu không đúng.";
        }
    } else {
        $error = implode('<br>', $errors);
    }
}
?>

<?php if ($error): ?>
    <div class="alert alert-danger" style="margin: 30px auto; max-width: 400px; padding: 20px; border-radius: 8px; background: #ffeaea; color: #d8000c; text-align: center;">
        <?php echo $error; ?>
        <br><br>
        <a href="login.php" style="display: inline-block; padding: 8px 20px; background: #d8000c; color: #fff; border-radius: 5px; text-decoration: none;">Quay lại đăng nhập</a>
    </div>
<?php endif; ?>