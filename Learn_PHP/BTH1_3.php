<?php
// Câu 1. Hiển thị lên trình duyệt đoạn nội dung sau:
// 	Giá trị hiện tại là 8
// Thêm 2. Giá trị hiện tại là 10.
// Giảm 4. Giá trị hiện tại là  6.
// Nhân 5. Giá trị hiện tại là 30.
// Chia cho 3. Giá trị hiện tại là 10.
// Tăng lên 1. Giá trị hiện tại là 11.
// Giảm đi 1. Giá trị hiện tại là 10s

// Khởi tạo biến ban đầu
$giatri = 8;
echo "Giá trị hiện tại là $giatri <br>";

// Thêm 2
$giatri = $giatri + 2;
echo "Thêm 2. Giá trị hiện tại là $giatri <br>";

// Giảm 4
$giatri = $giatri - 4;
echo "Giảm 4. Giá trị hiện tại là $giatri <br>";

// Nhân 5
$giatri = $giatri * 5;
echo "Nhân 5. Giá trị hiện tại là $giatri <br>";

// Chia cho 3
$giatri /= 3;
echo "Chia cho 3. Giá trị hiện tại là $giatri <br>";

// Tăng lên 1
$giatri++;
echo "Tăng lên 1. Giá trị hiện tại là $giatri <br>";

// Giảm đi 1
$giatri--;
echo "Giảm đi 1. Giá trị hiện tại là $giatri <br>";


//  Câu 2. Viết chương trình tính cộng trừ nhân chia của 2 số
$so_a = 10;
$so_b = 5;

echo "Tổng của $so_a và $so_b là: " . ($so_a + $so_b) . "<br>";
echo "Hiệu của $so_a và $so_b là: " . ($so_a - $so_b) . "<br>";
echo "Tích của $so_a và $so_b là: " . ($so_a * $so_b) . "<br>";
echo "Thương của $so_a và $so_b là: " . ($so_a / $so_b) . "<br>";