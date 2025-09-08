<!-- Tạo Form nhập dữ liệu như sau: -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <h1 class="text-uppercase">Nhập thông tin sinh viên</h1>

    <form method="post" action = "login.php">
        <ul>
            <li>Họ và tên: <input type="text" name="hoten" class="form-control" placeholder="Nhập tên sinh viên"></li>
            <li>Ngày tháng năm sinh: <input type="date" name="ngaysinh" class="form-control" id="birth" name="birth">
            </li>
            <li>Số điện thoại: <input type="tel" name="sodienthoai" class="form-control" id="phone" name="phone"
                    placeholder="Nhập số điện thoại">
            </li>
            <li>Địa chỉ: <input type="text" name="diachi" class="form-control" id="address" name="address" placeholder="Nhập địa chỉ">
            </li>
        </ul>

        <button type="submit" class="btn btn-primary">Gửi</button>
    </form>
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>