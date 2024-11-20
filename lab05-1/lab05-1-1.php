<?php

$productnum = floatval($_POST['productnum']); // Corrected
$code = $_POST['code'];
$product = $_POST['product'];
$price = floatval($_POST['price']); // Corrected

function totalall($price, $productnum) {
    $total = $price * $productnum;
    return $total;
}

function freeall($productnum) {
    $free = floor($productnum / 3);
    return $free;
}

function discountall($price, $free) {
    $discount = $free * $price;
    return $discount;
}

function payall($total, $discount) {
    $payall = $total - $discount;
    return $payall;
}

// Calculate values
$total = totalall($price, $productnum);
$free = freeall($productnum);
$discount = discountall($price, $free);
$pay = payall($total, $discount);

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
    background-color: #FBE8E8; /* A soft background color complementing the new theme */
    font-family: 'Kanit', sans-serif;
    color: #333;
}

.container {
    max-width: 500px;
    background-color: #fff;
    padding: 20px;
    margin: 50px auto;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    border: 1px solid #F29089; /* Updated border color */
    border-radius: 10px;
}

.btn-primary {
    background-color: #F29089; /* Updated button color */
    border: none;
    color: #fff;
    padding: 10px 20px;
    cursor: pointer;
    border-radius: 5px;
    transition: background-color 0.3s;
}

.btn-primary:hover {
    background-color: #d77b72; /* A slightly darker shade for hover */
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

table, th, td {
    border: 1px solid #ddd;
}

th, td {
    padding: 8px;
    text-align: left;
}

tr:nth-child(even) {
    background-color: #FCE8E8; /* Light pink for even rows */
}

th {
    background-color: #F29089; /* Updated table header color */
    color: white;
}

#codeModal {
    display: none;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background: #fff;
    border: 1px solid #F29089; /* Updated modal border color */
    padding: 20px;
    z-index: 1000;
    width: 80%;
    max-height: 80%;
    overflow-y: auto;
    border-radius: 10px;
}

#modalOverlay {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    z-index: 999;
}

.result {
    font-size: 24px;
    font-weight: bold;
}

.custom-btn {
    background-color: #F29089; /* Updated custom button color */
    color: #ffffff;
    border: none;
    width: 250px;
}

.custom-btn:hover {
    background-color: #d77b72; /* A slightly darker shade for hover */
}

.btn-secondary {
    background-color: #F29089; /* Updated secondary button color */
    border: none;
    color: #fff;
    padding: 10px 20px;
    cursor: pointer;
    border-radius: 5px;
    transition: background-color 0.3s;
}

.btn-secondary:hover {
    background-color: #d77b72; /* A slightly darker shade for hover */
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
        <a href="?p=lab05-1" class="btn btn-primary">กลับ</a>
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
            echo htmlspecialchars(file_get_contents('lab05-1/lab05-1-2.php')); 
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

