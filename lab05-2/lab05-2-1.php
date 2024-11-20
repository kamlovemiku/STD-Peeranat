<?php
$productnum = $_POST['productnum'];
$code = $_POST['code'];
$product = $_POST['product'];
$price = $_POST['price'];

$total = $price * $productnum;
$free = floor($productnum / 3);
$discount = $free * $price;
$pay = $total - $discount;
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
    background-color: #FBE8E8; /* Soft pink background */
    font-family: 'Kanit', sans-serif;
    color: #333;
}

h2 {
    color: #F29089; /* Header color */
    font-weight: bold;
}

.container {
    max-width: 500px;
    background-color: #fff;
    padding: 20px;
    margin: 50px auto;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    border: 1px solid #F29089; /* Border color */
    border-radius: 10px;
}

.form-label {
    color: #F29089; /* Label color */
    font-weight: bold;
}

.btn-primary {
    background-color: #F29089; /* Primary button color */
    border: none;
    color: #fff;
    padding: 10px 20px;
    cursor: pointer;
    border-radius: 5px;
    transition: background-color 0.3s;
}

.btn-primary:hover {
    background-color: #d77b72; /* Darker shade for hover effect */
}

.btn-secondary {
    background-color: #F29089; /* Secondary button color */
    border: none;
    color: #fff;
    padding: 10px 20px;
    cursor: pointer;
    border-radius: 5px;
    transition: background-color 0.3s;
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
    background: #fff;
    border: 1px solid #F29089; /* Modal border color */
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

pre {
    font-size: 14px; /* Ensure code text is visible and adjustable */
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
                <td><?php echo $code; ?></td>
            </tr>
            <tr>
                <td>ชื่อสินค้า</td>
                <td><?php echo $product; ?></td>
            </tr>
            <tr>
                <td>ราคาต่อขวด</td>
                <td><?php echo $price; ?> บาท</td>
            </tr>
            <tr>
                <td>จำนวนสินค้า</td>
                <td><?php echo $productnum; ?> ขวด</td>
            </tr>
            <tr>
                <td>รวมเงิน</td>
                <td><?php echo $total; ?> บาท</td>
            </tr>
            <tr>
                <td>ฟรีจำนวน</td>
                <td><?php echo $free; ?> ขวด</td>
            </tr>
            <tr>
                <td>ส่วนลด</td>
                <td><?php echo $discount; ?> บาท</td>
            </tr>
            <tr>
                <td>ชำระเงิน</td>
                <td><?php echo $pay; ?> บาท</td>
            </tr>
        </table>
        <hr>
        <a href="?p=lab05-2" class="btn btn-primary">กลับ</a>
        <button id="showCodeBtn" class="btn btn-secondary">ดูโค้ดที่ใช้คำนวณ</button>
    </div>

    <div id="codeModal">
        <h5>โค้ดที่ใช้คำนวณ</h5>
        <div>
            <button id="zoomIn" class="btn btn-secondary btn-sm">ซูมเข้า</button>
            <button id="zoomOut" class="btn btn-secondary btn-sm">ซูมออก</button>
            <button id="closeModal" class="btn btn-secondary btn-sm">ปิด</button>
        </div>
        <pre id="codeContent">
            <?php
            echo htmlspecialchars(file_get_contents('lab05-2/lab05-2-2.php')); 
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
