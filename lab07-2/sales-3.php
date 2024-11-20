<?php
// Include the function definitions
include __DIR__ . '/functions.php';

// Check if form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $code = htmlspecialchars($_POST["code"]);
    $name = htmlspecialchars($_POST["name"]);
    $type = htmlspecialchars($_POST["type"]);
    $price = htmlspecialchars($_POST["price"]);
    $unit = htmlspecialchars($_POST["unit"]);

    // Calculate totals
    $total = calculateTotal($price, $unit);
    $discount = calculateDiscount($total);
    $payment = $total - $discount;

    // Read Sale-2.php content
    $saleCode = htmlspecialchars(file_get_contents(__DIR__ . '/functions.php'));
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ผลลัพธ์ยอดขาย</title>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
            font-family: 'Kanit', sans-serif;
            background-color: #F0F4F1;
        }

        .custom-container {
            border: 1px solid #A3B18A;
            border-radius: 15px;
            padding: 20px;
            background-color: #FFFFFF;
            width: auto;
            max-width: 800px;
            margin: auto;
            text-align: center;
            box-sizing: border-box;
            min-height: 550px;
        }

        .btn-primary,
        .btn-secondary {
            background-color: #A3B18A;
            color: #FFFFFF;
            border: none;
        }

        .btn-primary:hover,
        .btn-secondary:hover {
            background-color: #8C9C7C;
        }

        .btn-secondary {
            margin: 10px;
        }

        .modal-content {
            border: 1px solid #A3B18A;
            border-radius: 10px;
            padding: 15px;
            background-color: #FFFFFF;
        }

        .modal-buttons {
            margin-top: 10px;
        }

        .modal-buttons button {
            margin: 0 5px;
        }

        .code-container {
            position: relative;
            padding: 1rem;
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 0.25rem;
            font-family: monospace;
            overflow: auto;
        }

        .zoom-control {
            position: absolute;
            top: 1rem;
            right: 1rem;
            background: rgba(255, 255, 255, 0.8);
            border: 1px solid #dee2e6;
            border-radius: 0.25rem;
            padding: 0.5rem;
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
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="custom-container">
            <?php if ($_SERVER["REQUEST_METHOD"] == "POST") { ?>
                <h2>ผลลัพธ์ที่ได้</h2>
                <form action="" method="GET">
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label for="code" class="form-label">รหัสสินค้า</label>
                            <input type="text" class="form-control" id="code" name="code" placeholder="รหัสสินค้า"
                                value="<?php echo $code; ?>" disabled>
                        </div>
                        <div class="col-md-5">
                            <label for="name" class="form-label">ชื่อ</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="ชื่อสินค้า"
                                value="<?php echo $name; ?>" disabled>
                        </div>
                        <div class="col-md-4">
                            <label for="type" class="form-label">ประเภทสินค้า</label>
                            <input type="text" class="form-control" id="type" name="type" placeholder="ประเภทสินค้า"
                                value="<?php echo $type; ?>" disabled>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="price" class="form-label">ราคาต่อหน่วย</label>
                            <input type="text" class="form-control" id="price" name="price" placeholder="ราคาต่อหน่วย"
                                value="<?php echo number_format($price, 2); ?>" disabled>
                        </div>
                        <div class="col-md-6">
                            <label for="unit" class="form-label">จำนวนซื้อ</label>
                            <input type="text" class="form-control" id="unit" name="unit" placeholder="จำนวนซื้อ"
                                value="<?php echo htmlspecialchars($unit); ?>" disabled>
                        </div>
                        <div class="col-md-6">
                            <label for="total" class="form-label">ราคารวม</label>
                            <input type="text" class="form-control" id="total" name="total" placeholder="ราคารวม"
                                value="<?php echo number_format($total, 2); ?>" disabled>
                        </div>
                        <div class="col-md-6">
                            <label for="discount" class="form-label">ส่วนลด</label>
                            <input type="text" class="form-control" id="discount" name="discount" placeholder="ส่วนลด"
                                value="<?php echo number_format($discount, 2); ?>" disabled>
                        </div>
                        <div class="col-md-6">
                            <label for="payment" class="form-label">ยอดเงินที่ต้องชำระ</label>
                            <input type="text" class="form-control" id="payment" name="payment" placeholder="ยอดเงินที่ต้องชำระ"
                                value="<?php echo number_format($payment, 2); ?>" disabled>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <a class="btn btn-secondary" href="?p=sales-3.php">กลับ</a>
                        <button type="button" id="showCodeBtn" class="btn btn-secondary">แสดงโค้ด</button>
                    </div>
                </form>

                <!-- Modal for displaying code -->
                <div id="codeModal" class="modal-content">
                    <h5>โค้ดของ functions.php</h5>
                    <div class="code-container" id="codeContainer">
                        <button class="btn btn-light zoom-control" onclick="copyCode()">Copy Code</button>
                        <pre id="codeContent" style="font-size: 14px;"><?php echo $saleCode; ?></pre>
                    </div>
                    <div class="modal-buttons">
                        <button id="closeModalCode" class="btn btn-secondary">ปิด</button>
                    </div>
                </div>

                <div id="modalOverlay"></div>
            <?php } else { ?>
                <h2>แบบฟอร์มคำนวณยอดขายสินค้า</h2>
                <form action="" method="POST">
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label for="code" class="form-label">รหัสสินค้า</label>
                            <input type="text" class="form-control" id="code" name="code" placeholder="รหัสสินค้า" required value="558">
                        </div>
                        <div class="col-md-5">
                            <label for="name" class="form-label">ชื่อ</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="ชื่อสินค้า" required value="มาม่า">
                        </div>
                        <div class="col-md-3">
                            <label for="type" class="form-label">ประเภทสินค้า</label>
                            <div class="form-group">
                                <select class="form-select" id="type" name="type" required>
                                    <option value="" disabled selected>กรุณาเลือกประเภทสินค้า</option>
                                    <option value="อาหารแห้ง" selected>อาหารแห้ง</option>
                                    <option value="อาหารสด">อาหารสด</option>
                                    <option value="อื่นๆ">อื่นๆ</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="price" class="form-label">ราคาต่อหน่วย</label>
                            <input type="text" class="form-control" id="price" name="price" placeholder="ราคาต่อหน่วย" required value="150">
                        </div>
                        <div class="col-md-6">
                            <label for="unit" class="form-label">จำนวนซื้อ</label>
                            <input type="text" class="form-control" id="unit" name="unit" placeholder="จำนวนซื้อ" required value="50">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">คำนวณ</button>
                </form>
            <?php } ?>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#showCodeBtn').click(function() {
                $('#modalOverlay').show();
                $('#codeModal').show();
            });

            $('#closeModalCode, #modalOverlay').click(function() {
                $('#codeModal').hide();
                $('#modalOverlay').hide();
            });

            window.copyCode = function() {
                let codeText = $('#codeContent').text();
                navigator.clipboard.writeText(codeText).then(function() {
                    alert('Code copied to clipboard!');
                }, function(err) {
                    alert('Failed to copy code: ' + err);
                });
            }
        });
    </script>
</body>

</html>