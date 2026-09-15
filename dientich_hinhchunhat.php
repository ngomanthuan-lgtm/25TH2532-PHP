<?php
// Khởi tạo các biến ban đầu
$chieudai = "";
$chieurong = "";
$dientich = "";

// Kiểm tra khi người dùng bấm nút Tính
if (isset($_POST['tinh'])) {
    $chieudai = $_POST['chieudai'];
    $chieurong = $_POST['chieurong'];

    // Kiểm tra nếu người dùng nhập số thì thực hiện tính toán
    if (is_numeric($chieudai) && is_numeric($chieurong)) {
        $dientich = $chieudai * $chieurong;
    } else {
        $dientich = "Nhập số hợp lệ!";
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
            background-color: #f4f4f4;
            padding-top: 50px;
        }
        table {
            background-color: #ffe6e6;
            border: 1px solid #cc0000;
            margin: 0 auto;
            border-collapse: collapse;
        }
        th {
            background-color: #ff9933;
            color: #800000;
            padding: 10px 20px;
            font-size: 18px;
            text-transform: uppercase;
        }
        td {
            padding: 8px 15px;
            color: #800000;
            font-weight: bold;
        }
        input[type="text"] {
            width: 160px;
            padding: 4px;
        }
        /* Style cho ô Diện tích không cho chỉnh sửa (readonly) */
        .readonly {
            background-color: #ffcccc;
            border: 1px solid #aaa;
        }
        .center {
            text-align: center;
        }
        input[type="submit"] {
            background-color: #e6e6e6;
            border: 1px solid #999;
            padding: 4px 15px;
            cursor: pointer;
            font-weight: bold;
        }
    </style>
</head>
<body>

<!-- Form thiết lập method POST và action là tên của chính trang này -->
<form action="dientich_hinhchunhat.php" method="POST">
    <table align="center">
        <tr>
            <th colspan="2">DIỆN TÍCH HÌNH CHỮ NHẬT</th>
        </tr>
        <tr>
            <td>Chiều dài:</td>
            <td>
                <input type="text" name="chieudai" value="<?php echo htmlspecialchars($chieudai); ?>" required>
            </td>
        </tr>
        <tr>
            <td>Chiều rộng:</td>
            <td>
                <input type="text" name="chieurong" value="<?php echo htmlspecialchars($chieurong); ?>" required>
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