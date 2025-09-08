<?php
// Câu 1. Hiển thị lên trình duyệt nội dung sau:
$a = 4;
$b = 8;

if ($a != $b) {
    echo "a không bằng b <br>";
    echo "a khác b <br>";

    if ($a <= $b) {
        echo "a không lớn hơn hoặc bằng b<br>";
        echo "a nhỏ hơn hoặc bằng b<br>";
    }

    if ($a < $b ) {
        echo "a không lớn hơn b<br>";
        echo "a nhỏ hơn b<br>";
    } else {
        echo "a lớn hơn b<br>";
    }
} else {
    echo "a bằng b<br>";
}

echo "<hr>";

// Câu 2. Cho 2 số n1 và n2. Tính tổng các số lẻ trong đoạn n1 đến n2.
$x = readline("Nhập n1: ");
$y = readline("Nhập n2: ");
// Đảm bảo n1 < n2
if ($x > $y) {
    $tmp = $x;
    $x = $y;
    $y = $tmp;
}

if ($x == $y) {
    echo "a bằng b! Vui lòng nhập lại!<br>";
} else {
    $tong = 0;
    $i = $x;

    echo "Các số lẻ trong đoạn [$x, $y] là: <br>";

    do {
        if ($i % 2 != 0) {
            echo $i . " ";
            $tong += $i;
        }
        $i++;
    } while ($i <= $y);

    echo "<br>Tổng các số lẻ = " . $tong;
}