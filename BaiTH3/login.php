 <?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $ten = $_POST["hoten"];
        $ngaysinh = $_POST["ngaysinh"];
        $sodienthoai = $_POST["sodienthoai"];
        $diachi = $_POST["diachi"];

        echo "<h2>Thông tin sinh viên</h2>";
        echo "<p>Họ và tên: $ten</p>";
        echo "<p>Ngày tháng năm sinh: $ngaysinh</p>";
        echo "<p>Số điện thoại: $sodienthoai</p>";
        echo "<p>Địa chỉ: $diachi</p>";
    }
    ?>