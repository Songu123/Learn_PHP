<?php
// Câu 1. Viết CT để tìm giá trị lớn nhất nhỏ nhất của một tập hợp các mảng số nguyên.
$mang1 = [4, 2, 8, 6, 1, 3];

function timMaxMin($mang)
{
    $max = $mang[0];
    $min = $mang[0];

    foreach ($mang as $value) {
        if ($value > $max) {
            $max = $value;
        }
        if ($value < $min) {
            $min = $value;
        }
    }

    return ['max' => $max, 'min' => $min];
}

$result = timMaxMin($mang1);
echo "Giá trị lớn nhất: " . $result['max'] . "\n";
echo "Giá trị nhỏ nhất: " . $result['min'] . "\n";

// Câu 2. Viết hàm để tính giai thừa của một số (theo 2 cách đệ quy và không đệ quy)
// -Cách dùng đệ quy
function tinhGiaiThua($n)
{
    if ($n <= 1) {
        return 1;
    }
    return $n * tinhGiaiThua($n - 1);
}

function tinhGiaiThuaKhongDeQuy($n)
{
    $giaiThua = 1;
    for ($i = 2; $i <= $n; $i++) {
        $giaiThua *= $i;
    }
    return $giaiThua;   
}

echo "Giai thừa của 5 (đệ quy): " . tinhGiaiThua(5) . "\n";
echo "Giai thừa của 5 (không đệ quy): " . tinhGiaiThuaKhongDeQuy(5) . "\n";

?>