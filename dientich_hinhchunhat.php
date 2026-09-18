<?php
// Khởi tạo các biến chứa dữ liệu ban đầu
$chieudai = "";
$chieurong = "";
$dientich = "";

// Kiểm tra khi người dùng bấm nút Tính (phương thức POST)
if (isset($_POST['tinh'])) {
    $chieudai = $_POST['chieudai'];
    $chieurong = $_POST['chieurong'];

    // 1. Kiểm tra phải là số hợp lệ
    if (!is_numeric($chieudai) || !is_numeric($chieurong)) {
        $dientich = "Vui lòng nhập số!";
    } 
    // 2. Kiểm tra chiều dài và chiều rộng phải lớn hơn 0
    else if ($chieudai <= 0 || $chieurong <= 0) {
        $dientich = "Các cạnh phải > 0!";
    } 
    // 3. Kiểm tra Chiều dài phải >= Chiều rộng
    else if ($chieudai < $chieurong) {
        $dientich = "Chiều dài phải >= Chiều rộng!";
    } 
    // 4. Nếu thỏa mãn tất cả điều kiện thì mới tính diện tích
    else {
        $dientich = $chieudai * $chieurong;
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Tính diện tích hình chữ nhật</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            padding-top: 40px;
        }
        /* MÀU NỀN FORM: Màu vàng kem nhạt chuẩn theo đề bài */
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
        /* Ô ĐIỆN TÍCH: Màu hồng phấn nổi bật hoàn toàn so với nền vàng kem */
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

<form action="dientich_hinhchunhat.php" method="POST">
    <table align="center">
        <tr>
            <th colspan="2">DIỆN TÍCH HÌNH CHỮ NHẬT</th>
        </tr>
        <tr>
            <td>Chiều dài:</td>
            <td>
                <input type="number" step="any" name="chieudai" value="<?php echo htmlspecialchars($chieudai); ?>" required>
            </td>
        </tr>
        <tr>
            <td>Chiều rộng:</td>
            <td>
                <input type="number" step="any" name="chieurong" value="<?php echo htmlspecialchars($chieurong); ?>" required>
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
            <td colspan="2" class="center">
                <input type="submit" name="tinh" value="Tính">
            </td>
        </tr>
    </table>
</form>

</body>
</html>