<?php
echo "Nhập kí tự: ";
$a = readline();   
$a = strtoupper(trim($a)); 

switch ($a) {
    case "A":
        echo "Android";
        break;
    case "B":
        echo "Basic";
        break;
    case "J":
        echo "Java";
        break;
    case "F":
        echo "Fortran";
        break;
    case "W":
        echo "Windows Phone";
        break;
    default:
        echo "Không thuộc các case trên";
}
