<?php
// Khởi tạo các biến ban đầu (Đơn giá mặc định là 20000)
$tenchuho = "";
$chisocu = "";
$chisomoi = "";
$dongia = 20000;
$sotienthanhtoan = "";

// Kiểm tra khi người dùng bấm nút Tính (phương thức POST)
if (isset($_POST['tinh'])) {
    $tenchuho = $_POST['tenchuho'];
    $chisocu = $_POST['chisocu'];
    $chisomoi = $_POST['chisomoi'];
    $dongia = $_POST['dongia'];

    // 1. Kiểm tra các chỉ số phải là số
    if (!is_numeric($chisocu) || !is_numeric($chisomoi) || !is_numeric($dongia)) {
        $sotienthanhtoan = "Vui lòng nhập số!";
    } 
    // 2. Kiểm tra chỉ số không được âm
    else if ($chisocu < 0 || $chisomoi < 0 || $dongia < 0) {
        $sotienthanhtoan = "Chỉ số phải >= 0!";
    } 
    // 3. Kiểm tra Chỉ số mới phải >= Chỉ số cũ
    else if ($chisomoi < $chisocu) {
        $sotienthanhtoan = "Chỉ số mới phải >= Chỉ số cũ!";
    } 
    // 4. Tính toán số tiền thanh toán
    else {
        $sotienthanhtoan = ($chisomoi - $chisocu) * $dongia;
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thanh toán tiền điện</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            padding-top: 30px;
        }
        /* MÀU NỀN FORM: Vàng kem nhạt chuẩn mẫu đề */
        table {
            background-color: #fff3e0;
            border: 1px solid #e67e22;
            margin: 0 auto;
            border-collapse: collapse;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        /* TIÊU ĐỀ FORM: Màu cam nổi bật */
        th {
            background-color: #ff9800;
            color: #ffffff;
            padding: 12px 20px;
            font-size: 18px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        td {
            padding: 8px 15px;
            color: #d35400;
            font-weight: bold;
        }
        input[type="text"], input[type="number"] {
            width: 160px;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        /* Ô KẾT QUẢ: Màu hồng phấn nổi bật */
        .readonly {
            background-color: #ffcdd2;
            border: 1px solid #e74c3c;
            color: #b71c1c;
            font-weight: bold;
            width: 220px !important;
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
        .unit {
            color: #7f8c8d;
            font-weight: normal;
            font-size: 13px;
        }
    </style>
</head>
<body>

<form action="thanhtoan_tiendien.php" method="POST">
    <table align="center">
        <tr>
            <th colspan="3">THANH TOÁN TIỀN ĐIỆN</th>
        </tr>
        <tr>
            <td>Tên chủ hộ:</td>
            <td>
                <input type="text" name="tenchuho" value="<?php echo htmlspecialchars($tenchuho); ?>" required>
            </td>
            <td></td>
        </tr>
        <tr>
            <td>Chỉ số cũ:</td>
            <td>
                <input type="number" step="any" name="chisocu" value="<?php echo htmlspecialchars($chisocu); ?>" required>
            </td>
            <td class="unit">(Kw)</td>
        </tr>
        <tr>
            <td>Chỉ số mới:</td>
            <td>
                <input type="number" step="any" name="chisomoi" value="<?php echo htmlspecialchars($chisomoi); ?>" required>
            </td>
            <td class="unit">(Kw)</td>
        </tr>
        <tr>
            <td>Đơn giá:</td>
            <td>
                <!-- Mặc định đơn giá là 20000 -->
                <input type="number" step="any" name="dongia" value="<?php echo htmlspecialchars($dongia); ?>" required>
            </td>
            <td class="unit">(VNĐ)</td>
        </tr>
        <tr>
            <td>Số tiền thanh toán:</td>
            <td>
                <!-- readonly không cho phép chỉnh sửa -->
                <input type="text" name="sotienthanhtoan" class="readonly" value="<?php echo is_numeric($sotienthanhtoan) ? number_format($sotienthanhtoan) : htmlspecialchars($sotienthanhtoan); ?>" readonly>
            </td>
            <td class="unit">(VNĐ)</td>
        </tr>
        <tr>
            <td colspan="3" class="center">
                <input type="submit" name="tinh" value="Tính">
            </td>
        </tr>
    </table>
</form>

</body>
</html>