<!-- Câu 1. Hiển thị bảng cửu chương n (2<=n<=9). Ví dụ khi n = 3 thì kết quả hiển thị như sau -->

<?php
$n = readline("Nhập n (2<=n<=9): ");
if ($n < 2 || $n > 9) {
    echo "Vui lòng nhập n trong khoảng từ 2 đến 9.";
} else {
    echo "Bảng cửu chương của $n:\n";
    for ($i = 1; $i <= 10; $i++) {
        echo "$n x $i = " . ($n * $i) . "\n";
    }
}
?>