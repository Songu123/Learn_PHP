<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Demo Switch Case PHP</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f7f7f7;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background: white;
            padding: 20px 30px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            width: 350px;
            text-align: center;
        }
        input[type="text"] {
            padding: 8px;
            width: 80%;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 6px;
        }
        input[type="submit"] {
            padding: 8px 15px;
            border: none;
            border-radius: 6px;
            background: #007bff;
            color: white;
            cursor: pointer;
            transition: 0.3s;
        }
        input[type="submit"]:hover {
            background: #0056b3;
        }
        .result {
            margin-top: 15px;
            font-weight: bold;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Nhập ký tự (A, B, J, F, W)</h2>
        <form method="post">
            <input type="text" name="char" maxlength="1" required>
            <br>
            <input type="submit" value="Xem kết quả">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $a = strtoupper(trim($_POST["char"]));

            switch ($a) {
                case "A":
                    $result = "Android";
                    break;
                case "B":
                    $result = "Basic";
                    break;
                case "J":
                    $result = "Java";
                    break;
                case "F":
                    $result = "Fortran";
                    break;
                case "W":
                    $result = "Windows Phone";
                    break;
                default:
                    $result = "Không thuộc các case trên";
            }

            echo "<div class='result'>Kết quả: $result</div>";
        }
        ?>
    </div>
</body>
</html>
