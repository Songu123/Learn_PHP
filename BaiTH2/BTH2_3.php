<?php
echo "Nhập lương: ";
$a = readline();   
echo "Nhập phụ cấp(A, B, C): ";
$b = readline();
$b = strtoupper(trim($b));

switch ($b) {
    case "A":
        echo "Lương:" . ($a + 700000);
        break;
    case "B":
        echo "Lương:" . ($a + 500000);
        break;
    case "C":
        echo "Lương:" . ($a + 300000);
        break;
    default:
        echo "Không thuộc các phụ cấp trên";
}
