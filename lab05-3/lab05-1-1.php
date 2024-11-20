<?php
include("lab05-3-2.php");

// รับข้อมูลจากฟอร์ม
$code = $_POST['code'] ?? '';
$product = $_POST['product'] ?? '';
$productnum = $_POST['productnum'] ?? 0;
$price = $_POST['price'] ?? 0;

// สร้างออบเจ็กต์ของ ClassNum
$classNum = new ClassNum($productnum, $price);

// คำนวณผลลัพธ์
$total = $classNum->totalAll();
$free = $classNum->freeAll();
$discount = $classNum->discountAll();
$pay = $classNum->payAll();
?>


<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab05-2 Result</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #FBE8E8; /* Light pink background to complement the main theme color */
            font-family: 'Kanit', sans-serif;
            color: #333; /* Dark text for good contrast */
        }

        h2 {
            color: #F29089; /* Main theme color for headers */
            font-weight: bold;
        }

        .container {
            max-width: 500px;
            background-color: #fff; /* White background for the content container */
            padding: 20px;
            margin: 50px auto;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Subtle shadow for depth */
            border: 2px solid #F29089; /* Slightly thicker border to match the theme */
            border-radius: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #F29089; /* Border color to match theme */
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #F29089; /* Header background color */
            color: #fff; /* White text for contrast */
        }

        hr {
            border: 1px solid #F29089; /* Divider color to match theme */
            margin: 20px 0;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            border-radius: 5px;
            text-align: center;
            color: #fff;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .btn-primary {
            background-color: #F29089; /* Primary button color */
        }

        .btn-primary:hover {
            background-color: #d77b72; /* Darker shade of the theme color for hover effect */
        }

        .btn-secondary {
            background-color: #F29089; /* Secondary button color */
        }

        .btn-secondary:hover {
            background-color: #d77b72; /* Darker shade for hover effect */
        }

        #codeModal {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            border: 2px solid #F29089; /* Border to match theme */
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            z-index: 1001;
        }

        #modalOverlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1000;
        }

        .btn-sm {
            padding: 5px 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>ผลการคำนวณ</h2>
        <table>
            <tr>
                <th>รายการ</th>
                <th>รายละเอียด</th>
            </tr>
            <tr>
                <td>รหัสสินค้า</td>
                <td><?php echo htmlspecialchars($code); ?></td>
            </tr>
            <tr>
                <td>ชื่อสินค้า</td>
                <td><?php echo htmlspecialchars($product); ?></td>
            </tr>
            <tr>
                <td>ราคาต่อขวด</td>
                <td><?php echo htmlspecialchars($price); ?> บาท</td>
            </tr>
            <tr>
                <td>จำนวนสินค้า</td>
                <td><?php echo htmlspecialchars($productnum); ?> ขวด</td>
            </tr>
            <tr>
                <td>รวมเงิน</td>
                <td><?php echo htmlspecialchars($total); ?> บาท</td>
            </tr>
            <tr>
                <td>ฟรีจำนวน</td>
                <td><?php echo htmlspecialchars($free); ?> ขวด</td>
            </tr>
            <tr>
                <td>ส่วนลด</td>
                <td><?php echo htmlspecialchars($discount); ?> บาท</td>
            </tr>
            <tr>
                <td>ชำระเงิน</td>
                <td><?php echo htmlspecialchars($pay); ?> บาท</td>
            </tr>
        </table>
        <hr>
        <a href="?p=lab05-3" class="btn btn-primary">กลับ</a>
        <button id="showCodeBtn" class="btn btn-secondary btn-show-code ms-2">ดูโค้ดที่ใช้คำนวณ</button>
    </div>

    <div id="codeModal">
        <h5>โค้ดที่ใช้คำนวณ</h5>
        <div>
            <button id="zoomIn" class="btn btn-secondary btn-sm">ซูมเข้า</button>
            <button id="zoomOut" class="btn btn-secondary btn-sm">ซูมออก</button>
            <button id="closeModal" class="btn btn-secondary btn-sm">ปิด</button>
        </div>
        <pre id="codeContent" style="font-size: 14px;">
            <?php
            echo htmlspecialchars(file_get_contents('lab05-3/lab05-3-2.php')); 
            ?>
        </pre>
    </div>
    <div id="modalOverlay"></div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#showCodeBtn').click(function() {
            $('#modalOverlay').show(); 
            $('#codeModal').show(); 
        });

        $('#closeModal, #modalOverlay').click(function() {
            $('#codeModal').hide(); 
            $('#modalOverlay').hide(); 
        });

        $('#zoomIn').click(function() {
            let currentSize = parseFloat($('#codeContent').css('font-size'));
            $('#codeContent').css('font-size', (currentSize + 2) + 'px');
        });

        $('#zoomOut').click(function() {
            let currentSize = parseFloat($('#codeContent').css('font-size'));
            $('#codeContent').css('font-size', (currentSize - 2) + 'px');
        });
    });
    </script>
</body>
</html>

