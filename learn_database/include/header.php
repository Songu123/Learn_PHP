<div class="row mb header">
    <h1> SIÊU THỊ TRỰC TUYẾN</h1>

</div>
<div class="row mb menu">
    <ul>
        <li><a href="index.html">Trang chủ</a></li>
        <li><a href="cart.html">Giỏ hàng</a></li>
        <li><a href="#">Liên hệ</a></li>
        <li><a href="#">Góp ý</a></li>
        <li style="float:right;">
            <?php if (isset($_SESSION['user'])): ?>
            <a href="./logout.php">Đăng xuất</a>
            <?php endif; ?>
        </li>
    </ul>
</div>