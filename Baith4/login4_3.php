<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        $msg = "<div class='alert alert-danger text-center'>Vui lòng nhập đầy đủ username và password.</div>";
    } elseif ($username === "admin" && $password === "123456") {
        $msg = "<p class='welcome text-center' 
                style='font-family:Tahoma; color:red; font-size:20px;'>Welcome, admin</p>";
    } else {
        $msg = "<div class='alert alert-danger text-center'>Username hoặc password sai. Vui lòng nhập lại.</div>";
    }
} else {
    $msg = "<div class='alert alert-warning text-center'>Vui lòng truy cập form đăng nhập.</div>";
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Kết quả đăng nhập</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow-lg">
                <div class="card-body text-center">
                    <?php echo $msg; ?>
                    <a href="baith4_3.php" class="btn btn-secondary mt-3">Quay lại</a>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
