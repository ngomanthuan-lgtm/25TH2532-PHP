<?php
// Khai báo hằng số PI = 3.14
define("PI", 3.14);

// Khởi tạo các biến chứa dữ liệu ban đầu
$bankinh = "";
$dientich = "";
$chuvi = "";

// Kiểm tra khi người dùng bấm nút Tính (phương thức POST)
if (isset($_POST['tinh'])) {
    $bankinh = $_POST['bankinh'];

    // 1. Kiểm tra nhập vào có phải số không
    if (!is_numeric($bankinh)) {
        $dientich = "Vui lòng nhập số!";
        $chuvi = "Vui lòng nhập số!";
    }
    // 2. Kiểm tra bán kính phải lớn hơn 0
    else if ($bankinh <= 0) {
        $dientich = "Bán kính phải > 0!";
        $chuvi = "Bán kính phải > 0!";
    }
    // 3. Tính diện tích và chu vi hình tròn
    else {
        $dientich = PI * pow($bankinh, 2);
        $chuvi = 2 * PI * $bankinh;
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Tính diện tích và chu vi hình tròn</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            padding-top: 40px;
        }
        /* MÀU NỀN FORM: Màu vàng kem nhạt */
        table {
            background-color: #fff3e0;
            border: 1px solid #e67e22;
            margin: 0 auto;
            border-collapse: collapse;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        /* TIÊU ĐỀ: Màu cam nổi bật */
        th {
            background-color: #ff9800;
            color: #ffffff;
            padding: 12px 20px;
            font-size: 18px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        td {
            padding: 10px 18px;
            color: #d35400;
            font-weight: bold;
        }
        input[type="number"] {
            width: 160px;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        input[type="text"] {
            width: 220px;
            padding: 5px;
            border: 1px solid #e74c3c;
            border-radius: 3px;
        }
        /* MÀU Ô KẾT QUẢ: Màu hồng phấn nổi bật */
        .readonly {
            background-color: #ffcdd2;
            color: #b71c1c;
            font-weight: bold;
        }
        .center {
            text-align: center;
            padding-bottom: 15px;
        }
        input[type="submit"] {
            background-color: #e0e0e0;
            border: 1px solid #9e9e9e;
            padding: 5px 20px;
            cursor: pointer;
            font-weight: bold;
            border-radius: 3px;
        }
        input[type="submit"]:hover {
            background-color: #d6d6d6;
        }
    </style>
</head>
<body>

<form action="dientich_chuvi_hinhtron.php" method="POST">
    <table align="center">
        <tr>
            <th colspan="2">DIỆN TÍCH và CHU VI HÌNH TRÒN</th>
        </tr>
        <tr>
            <td>Bán kính:</td>
            <td>
                <input type="number" step="any" name="bankinh" value="<?php echo htmlspecialchars($bankinh); ?>" required>
            </td>
        </tr>
        <tr>
            <td>Diện tích:</td>
            <td>
                <!-- readonly để không cho phép chỉnh sửa -->
                <input type="text" name="dientich" class="readonly" value="<?php echo htmlspecialchars($dientich); ?>" readonly>
            </td>
        </tr>
        <tr>
            <td>Chu vi:</td>
            <td>
                <!-- readonly để không cho phép chỉnh sửa -->
                <input type="text" name="chuvi" class="readonly" value="<?php echo htmlspecialchars($chuvi); ?>" readonly>
            </td>
        </tr>
        <tr>
            <td colspan="2" class="center">
                <input type="submit" name="tinh" value="Tính">
            </td>
        </tr>
    </table>
</form>

</body>
</html>