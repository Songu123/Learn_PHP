<?php
// Khởi tạo session
session_start();

// Tăng lượt truy cập
// if (!isset($_SESSION['luottruycap'])) {
//     $_SESSION['luottruycap'] = 0;
// }
// $_SESSION['luottruycap']++;
if (isset($_SESSION['counter'])) {
    $_SESSION['counter'] += 1;
} else {
    $_SESSION['counter'] = 1;
}

$msg = "Bạn đã truy cập trang này " . $_SESSION['counter'];
$msg .= " lần trong session này.";

// Xử lý đăng nhập
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $username = filter_input(INPUT_POST, 'user', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'pass', FILTER_SANITIZE_STRING);
    $remember = isset($_POST['ghinho']);

    // Giả lập kiểm tra đăng nhập (thay bằng database thực tế sau)
    if ($username == "admin" && $password == "123456") {
        // Lưu thông tin user vào cookie (mã hóa base64 để an toàn hơn)
        if ($remember) {
            $user_data = base64_encode(json_encode(['username' => $username]));
            $expire = $remember ? time() + (7 * 24 * 3600) : 0; // 7 ngày nếu "Ghi nhớ tôi"
            setcookie("user", $user_data, $expire, "/", "", false, true); // HttpOnly
            $_SESSION['user'] = $username; // Lưu vào session để hiển thị ngay
            $msg_cookie = "<p style='color: blue;'>Cookie đã được thiết lập cho tên người dùng: " . htmlspecialchars($username) . "</p>";
        }
        $msg = "<p style='color: blue;'>Đăng nhập thành công!</p>";
    } else {
        $msg = "<p style='color: red;'>Sai tên đăng nhập hoặc mật khẩu!</p>";
    }
}

// Xử lý xóa cookie
if (isset($_GET['delc']) && $_GET['delc'] == 1) {
    setcookie("user", "", time() - 3600, "/");
    setcookie("cart", "", time() - 3600, "/");
    session_destroy();
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <div class="giohang">
        <a href="cart.html"><img src="images/cart.png"><span id="countsp">0</span></a>
    </div>


    <div class="boxcenter">
        <?php include "include/header.php"; ?>
        <div
            style="margin: 30px auto; max-width: 500px; padding: 30px; background: #f7f7f7; border-radius: 10px; text-align: center;">
            <?php if (isset($_SESSION['user'])): ?>
                <h2>Xin chào, <span style="color: #007bff;"><?php echo htmlspecialchars($_SESSION['user']); ?></span>!</h2>
                <p>Chúc bạn một ngày tốt lành.</p>
            <?php else: ?>
                <h2>Bạn chưa đăng nhập.</h2>
                <a href="login.php"
                    style="display: inline-block; margin-top: 20px; padding: 10px 25px; background: #007bff; color: #fff; border-radius: 5px; text-decoration: none;">Đăng
                    nhập</a>
            <?php endif; ?>
        </div>
        <div class="row mb ">
            <div class="boxtrai mr">
                <div class="row">
                    <div class="banner">
                        <img src="images/banner.jpg" alt="">
                    </div>
                </div>
                <div class="row">
                    <?php
                    include './database.php';
                    $query = "SELECT id, name, description, image, price, stock FROM products ORDER BY created_at DESC LIMIT 12";
                    $stmt = $conn->prepare($query);
                    $stmt->execute();
                    $products = $stmt->fetchAll();

                    foreach ($products as $p):
                        ?>
                        <div class="boxsp mr">
                            <div class="row img">
                                <img src="./<?= $p['image'] ?>" alt="<?= $p['name'] ?>">
                            </div>
                            <p>$<span><?= $p['price'] ?></span></p>
                            <a href="#"><?= $p['name'] ?></a>
                            <div style="font-size:12px; color:#555; margin:5px 0; min-height:32px;">
                                <?= $p['description'] ?>
                            </div>
                            <input type="number" name="soluong" min="1" max="<?= $p['stock'] ?>" value="1">
                            <button>Đặt hàng</button>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="boxphai">
                <div class="row mb">
                    <div class="boxtitle">TÀI KHOẢN</div>
                    <div class="boxcontent">
                        <?php if (isset($_SESSION['user'])): ?>
                            <div style="text-align: center; padding: 15px;">
                                <p>Xin chào, <strong><?php echo htmlspecialchars($_SESSION['user']); ?></strong>!</p>
                                <a href="?delc=1" style="color: #dc3545; text-decoration: none;">Đăng xuất</a>
                            </div>
                        <?php else: ?>
                            <!-- Toggle buttons -->
                            <div style="display: flex; margin-bottom: 15px;">
                                <button onclick="showLogin()" id="loginBtn"
                                    style="flex: 1; padding: 8px; background: #007bff; color: white; border: none; cursor: pointer;">
                                    Đăng nhập
                                </button>
                                <button onclick="showRegister()" id="registerBtn"
                                    style="flex: 1; padding: 8px; background: #6c757d; color: white; border: none; cursor: pointer;">
                                    Đăng ký
                                </button>
                            </div>

                            <!-- Login Form -->
                            <form action="" method="post" id="loginForm" style="padding: 15px;">
                                <div style="margin-bottom: 10px;">
                                    <input type="text" name="user" placeholder="Tên đăng nhập" required
                                        style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
                                </div>
                                <div style="margin-bottom: 10px;">
                                    <input type="password" name="pass" placeholder="Mật khẩu" required
                                        style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
                                </div>
                                <div style="margin-bottom: 10px;">
                                    <label>
                                        <input type="checkbox" name="ghinho"> Ghi nhớ tôi
                                    </label>
                                </div>
                                <button type="submit" name="login"
                                    style="width: 100%; padding: 10px; background: #007bff; color: white; border: none; border-radius: 4px; cursor: pointer;">
                                    Đăng nhập
                                </button>
                            </form>

                            <!-- Register Form -->
                            <form action="" method="post" id="registerForm" style="padding: 15px; display: none;">
                                <div style="margin-bottom: 10px;">
                                    <input type="text" name="reg_user" placeholder="Tên đăng nhập" required
                                        style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
                                </div>
                                <div style="margin-bottom: 10px;">
                                    <input type="email" name="reg_email" placeholder="Email" required
                                        style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
                                </div>
                                <div style="margin-bottom: 10px;">
                                    <input type="password" name="reg_pass" placeholder="Mật khẩu" required
                                        style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
                                </div>
                                <div style="margin-bottom: 10px;">
                                    <input type="password" name="reg_pass_confirm" placeholder="Xác nhận mật khẩu" required
                                        style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
                                </div>
                                <button type="submit" name="register"
                                    style="width: 100%; padding: 10px; background: #28a745; color: white; border: none; border-radius: 4px; cursor: pointer;">
                                    Đăng ký
                                </button>
                            </form>
                            <?php

                            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
                                $reg_username = filter_input(INPUT_POST, 'reg_user', FILTER_SANITIZE_STRING);
                                $reg_email = filter_input(INPUT_POST, 'reg_email', FILTER_SANITIZE_EMAIL);
                                $reg_password = filter_input(INPUT_POST, 'reg_pass', FILTER_SANITIZE_STRING);
                                $reg_password_confirm = filter_input(INPUT_POST, 'reg_pass_confirm', FILTER_SANITIZE_STRING);

                                // Kiểm tra mật khẩu khớp
                                if ($reg_password !== $reg_password_confirm) {
                                    $msg = "<p style='color: red;'>Mật khẩu xác nhận không khớp!</p>";
                                } else {
                                    try {
                                        include './database.php';

                                        // Kiểm tra username đã tồn tại
                                        $check_user = "SELECT name FROM users WHERE name = ?";
                                        $stmt = $conn->prepare($check_user);
                                        $stmt->execute([$reg_username]);

                                        if ($stmt->rowCount() > 0) {
                                            $msg = "<p style='color: red;'>Tên đăng nhập đã tồn tại!</p>";
                                        } else {
                                            // Kiểm tra email đã tồn tại
                                            $check_email = "SELECT email FROM users WHERE email = ?";
                                            $stmt = $conn->prepare($check_email);
                                            $stmt->execute([$reg_email]);

                                            if ($stmt->rowCount() > 0) {
                                                $msg = "<p style='color: red;'>Email đã được sử dụng!</p>";
                                            } else {
                                                // Mã hóa mật khẩu
                                                $hashed_password = password_hash($reg_password, PASSWORD_DEFAULT);

                                                // Thêm user mới
                                                $insert_user = "INSERT INTO users (name, email, password, created_at) VALUES (?, ?, ?, NOW())";
                                                $stmt = $conn->prepare($insert_user);

                                                if ($stmt->execute([$reg_username, $reg_email, $hashed_password])) {
                                                    $msg = "<p style='color: green;'>Đăng ký thành công! Bạn có thể đăng nhập ngay.</p>";
                                                } else {
                                                    $msg = "<p style='color: red;'>Lỗi trong quá trình đăng ký!</p>";
                                                }
                                            }
                                        }
                                    } catch (PDOException $e) {
                                        $msg = "<p style='color: red;'>Lỗi cơ sở dữ liệu: " . $e->getMessage() . "</p>";
                                    }
                                }
                            }
                            ?>

                            <?php if (isset($msg) && (strpos($msg, 'Sai') !== false || strpos($msg, 'Đăng ký') !== false)): ?>
                                <div
                                    style="color: <?php echo strpos($msg, 'thành công') !== false ? 'green' : 'red'; ?>; text-align: center; padding: 10px; font-size: 12px;">
                                    <?php echo $msg; ?>
                                </div>
                            <?php endif; ?>

                            <script>
                                function showLogin() {
                                    document.getElementById('loginForm').style.display = 'block';
                                    document.getElementById('registerForm').style.display = 'none';
                                    document.getElementById('loginBtn').style.background = '#007bff';
                                    document.getElementById('registerBtn').style.background = '#6c757d';
                                }

                                function showRegister() {
                                    document.getElementById('loginForm').style.display = 'none';
                                    document.getElementById('registerForm').style.display = 'block';
                                    document.getElementById('loginBtn').style.background = '#6c757d';
                                    document.getElementById('registerBtn').style.background = '#28a745';
                                }
                            </script>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="row mb ">
                    <div class="boxtitle">LƯỢT TRUY CẬP</div>
                    <div style="text-align:center;">
                        <h1>
                            <?php
                            if (isset($_SESSION['counter']))
                                echo $msg;
                            ?>
                        </h1>
                    </div>
                </div>
                <div class="row mb">
                    <div class="boxtitle">DANH MỤC</div>
                    <div class="boxcontent2 menudoc">
                        <ul>
                            <li><a href="#">Đồng hồ</a></li>
                            <li><a href="#">Laptop</a></li>
                            <li><a href="#">Điện thoại</a></li>
                            <li><a href="#">Ba lô</a></li>
                        </ul>
                    </div>
                    <div class="boxfooter searbox">
                        <form action="#" method="post">
                            <input type="text" name="" id="">
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="boxtitle">TOP 10 YÊU THÍCH</div>
                    <div class="row boxcontent">
                        <?php include './database.php';
                        $query = "SELECT id, name, description, image, price, stock, created_at 
                  FROM products 
                  ORDER BY created_at DESC 
                  LIMIT 10";
                        $stmt = $conn->prepare($query);
                        $stmt->execute();
                        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <?php include "include/footer.php"; ?>
    </div>

</body>

</html>