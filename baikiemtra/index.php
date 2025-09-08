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
        <div style="margin: 30px auto; max-width: 500px; padding: 30px; background: #f7f7f7; border-radius: 10px; text-align: center;">
            <?php if (isset($_SESSION['user'])): ?>
                <h2>Xin chào, <span style="color: #007bff;"><?php echo htmlspecialchars($_SESSION['user']); ?></span>!</h2>
                <p>Chúc bạn một ngày tốt lành.</p>
            <?php else: ?>
                <h2>Bạn chưa đăng nhập.</h2>
                <a href="login.php" style="display: inline-block; margin-top: 20px; padding: 10px 25px; background: #007bff; color: #fff; border-radius: 5px; text-decoration: none;">Đăng nhập</a>
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
                    <div class="boxsp mr">
                        <div class="row img"><img src="images/1.jpg" alt=""></div>
                        <p>$<span>10</span></p>
                        <a href="#">Đồng hồ</a>
                        <input type="number" name="soluong" min="1" max="10" value="1">
                        <button>Đặt hàng</button>
                    </div>
                    <div class="boxsp mr">
                        <div class="row img"><img src="images/2.gif" alt=""></div>
                        <p>$<span>20</span></p>
                        <a href="#">Laptop</a>
                        <input type="number" name="soluong" min="1" max="10" value="1">
                        <button>Đặt hàng</button>
                    </div>
                    <div class="boxsp ">
                        <div class="row img"><img src="images/3.jpg" alt=""></div>
                        <p>$<span>30</span></p>
                        <a href="#">Đồng hồ trắng</a>
                        <input type="number" name="soluong" min="1" max="10" value="1">
                        <button>Đặt hàng</button>
                    </div>
                    <div class="boxsp mr">
                        <div class="row img"><img src="images/4.jpg" alt=""></div>
                        <p>$<span>40</span></p>
                        <a href="#">Đồng hồ đen</a>
                        <input type="number" name="soluong" min="1" max="10" value="1">
                        <button>Đặt hàng</button>
                    </div>
                    <div class="boxsp mr">
                        <div class="row img"><img src="images/5.jpg" alt=""></div>
                        <p>$<span>50</span></p>
                        <a href="#">Nón</a>
                        <input type="number" name="soluong" min="1" max="10" value="1">
                        <button>Đặt hàng</button>
                    </div>
                    <div class="boxsp ">
                        <div class="row img"><img src="images/6.jpg" alt=""></div>
                        <p>$<span>60</span></p>
                        <a href="#">Vali</a>
                        <input type="number" name="soluong" min="1" max="10" value="1">
                        <button>Đặt hàng</button>
                    </div>
                    <div class="boxsp mr">
                        <div class="row img"><img src="images/7.jpg" alt=""></div>
                        <p>$<span>70</span></p>
                        <a href="#">Điện thoại</a>
                        <input type="number" name="soluong" min="1" max="10" value="1">
                        <button>Đặt hàng</button>
                    </div>
                    <div class="boxsp mr">
                        <div class="row img"><img src="images/8.jpg" alt=""></div>
                        <p>$<span>80</span></p>
                        <a href="#">Điện thoại cam</a>
                        <input type="number" name="soluong" min="1" max="10" value="1">
                        <button>Đặt hàng</button>
                    </div>
                    <div class="boxsp ">
                        <div class="row img"><img src="images/9.jpg" alt=""></div>
                        <p>$<span>90</span></p>
                        <a href="#">Đồng hồ tròn trắng</a>
                        <input type="number" name="soluong" min="1" max="10" value="1">
                        <button>Đặt hàng</button>
                    </div>
                </div>
            </div>
            <div class="boxphai">
                <div class="row mb ">
                    <div class="boxtitle">LƯỢT TRUY CẬP</div>
                    <div style="text-align:center;">
                        <h1>
                            <?php
                            // if (isset($_SESSION['luottruycap']))
                            //     echo $_SESSION['luottruycap'];
                            
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
                            <li>
                                <a href="#">Đồng hồ</a>
                            </li>
                            <li>
                                <a href="#">Laptop</a>
                            </li>
                            <li>
                                <a href="#">Điện thoại</a>
                            </li>
                            <li>
                                <a href="#">Ba lô</a>
                            </li>
                            <li>
                                <a href="#">Đồng hồ</a>
                            </li>
                            <li>
                                <a href="#">Laptop</a>
                            </li>
                            <li>
                                <a href="#">Điện thoại</a>
                            </li>
                            <li>
                                <a href="#">Ba lô</a>
                            </li>
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
                        <div class="row mb10 top10">
                            <img src="images/1.jpg" alt="">
                            <a href="#">Sir Rodney's Marmalade</a>
                        </div>
                        <div class="row mb10 top10">
                            <img src="images/5.jpg" alt="">
                            <a href="#">Cate de Blaye</a>
                        </div>
                        <div class="row mb10 top10">
                            <img src="images/3.jpg" alt="">
                            <a href="#">Tharinger Rostbratwurst</a>
                        </div>
                        <div class="row mb10 top10">
                            <img src="images/4.jpg" alt="">
                            <a href="#">Mishi Kobe Niku</a>
                        </div>
                        <div class="row mb10 top10">
                            <img src="images/1.jpg" alt="">
                            <a href="#">Sir Rodney's Marmalade</a>
                        </div>
                        <div class="row mb10 top10">
                            <img src="images/5.jpg" alt="">
                            <a href="#">Cate de Blaye</a>
                        </div>
                        <div class="row mb10 top10">
                            <img src="images/3.jpg" alt="">
                            <a href="#">Tharinger Rostbratwurst</a>
                        </div>
                        <div class="row mb10 top10">
                            <img src="images/4.jpg" alt="">
                            <a href="#">Mishi Kobe Niku</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include "include/footer.php"; ?>
    </div>

</body>

</html>