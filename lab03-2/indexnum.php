<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>การคำนวณตัวเลขแบบทั่วไป</title>
    <style>
    body {
    font-family: 'Kanit', sans-serif; 
    background-color: #E0F7FA; /* เปลี่ยนพื้นหลังให้เป็นสีฟ้าอ่อน */
}

.custom-container {
    border: 1px solid #81D4FA; /* สีขอบของกล่องที่ปรับใหม่เป็นฟ้า */
    border-radius: 15px; 
    padding: 20px; 
    background-color: #ffffff; 
    max-width: 90%; /* กำหนดขนาดให้เหมาะกับหน้าจอ */
    margin: auto; 
    text-align: center; 
}

.btn-calculate {
    background-color: #29B6F6; /* สีปุ่มคำนวณใหม่เป็นฟ้า */
    color: #ffffff; /* สีตัวอักษรในปุ่ม */
    border: none;
    width: 100%; /* ปรับขนาดปุ่มให้เต็มความกว้าง */
}

.btn-calculate:hover {
    background-color: #0288D1; /* สีเมื่อ Hover */
}

h2 {
    text-align: center; /* จัดตำแหน่งข้อความให้อยู่ตรงกลาง */
    margin-top: 40px; /* ระยะห่างด้านบน */
    margin-bottom: 20px; /* ระยะห่างด้านล่าง */
    color: #0288D1; /* เปลี่ยนสีข้อความเป็นฟ้าเข้ม */
}

.result {
    font-size: 24px; 
    font-weight: bold; 
    color: #0288D1; /* สีของผลลัพธ์เป็นฟ้าเข้ม */
}

.custom-btn {
    background-color: #29B6F6; 
    color: #ffffff; 
    border: none; 
    width: 100%; /* ปรับขนาดปุ่มให้เต็มความกว้าง */
    margin-bottom: 10px; /* ระยะห่างของปุ่ม */
}

.custom-btn:hover {
    background-color: #0288D1; 
}

.custom-btn-green {
    background-color: #29B6F6;
    color: #ffffff;
    border: none;
    width: 100px; /* ปรับขนาดตามที่ต้องการ */
}

.custom-btn-green:hover {
    background-color: #0288D1;
}

/* Modal styles */
#codeModal, #descriptionModal {
    display: none; 
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background: #ffffff;
    border: 1px solid #81D4FA; /* สีขอบของโมดัลเป็นฟ้า */
    padding: 20px;
    z-index: 1000;
    width: 90%; /* ความกว้างของโมดัล */
    max-height: 80%;
    overflow-y: auto;
    text-align: left;
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

hr {
    border: none;
    border-top: 1px solid #81D4FA; /* สีของเส้น hr เป็นฟ้า */
    margin: 20px auto; /* ระยะห่างของ hr */
    width: 90%; /* กำหนดความกว้างของ hr */
}

    </style>
</head>
<body>

<div class="container mt-5">
    <div class="custom-container">



    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $a = floatval($_POST['num_a']);
            $b = floatval($_POST['num_b']);
            $op = $_POST['op']; 
            $area = null;
            $d = "+";
            $e = "2";
            $f = "*";
            $g = "(";
            $h = ")";
            $i = "=";
           
            function calrectangle($a,$b) {
                $area = $a*$b;
                return $area;
            }
            function lenght_rectangle($a,$b) {
                return (2*$a) + (2*$b);
            }
        ?>
            <h2>ผลการคำนวณ</h2>
            <hr>
            <div class="result">

            <?php 
                if ($op=="rectangle") {
                    echo "$a "."*"." $b = " . calrectangle($a, $b);
                }elseif($op=="square") {
                    echo "$g $e $f $a $h $d $g $e $f $b $h $i" . lenght_rectangle($a, $b);
                }
            
            ?>
            
              
            </div>
            <hr>
            <div class="row">
                <div class="col">
                    <a href="javascript:history.go(-1)" class="btn custom-btn btn-block" style="width: 200px" >กลับ</a>
                </div>
                <div class="col">
                    <button id="showCodeBtn" class="btn btn-secondary btn-block btn-show-code" style="width: 200px" >ดูโค้ดที่ใช้คำนวณ</button>
                </div>
                <div class="col">
                    <button id="showDescriptionBtn" class="btn btn-secondary btn-block btn-show-description" style="width: 100px" >ดูคำอธิบาย</button>
                </div>
            </div>

            <div id="codeModal">
                <h5>โค้ดที่ใช้คำนวณ</h5>
                <div>
                    <button id="zoomIn" class="btn btn-secondary btn-sm custom-btn-green">ซูมเข้า</button>
                    <button id="zoomOut" class="btn btn-secondary btn-sm custom-btn-green">ซูมออก</button>
                    <button id="closeModalCode" class="btn btn-secondary btn-sm">ปิด</button> <!-- แก้ ID เป็น closeModalCode -->
                </div>
                <pre id="codeContent" style="font-size: 14px;">
                    <?php echo htmlspecialchars(file_get_contents('lab03-2/formula.php')); ?>
                </pre>
            </div>

            <div id="descriptionModal">
                <h5>คำอธิบายการคำนวณ</h5>
                <div>
                    <button id="zoomInDesc" class="btn btn-secondary btn-sm custom-btn-green">ซูมเข้า</button>
                    <button id="zoomOutDesc" class="btn btn-secondary btn-sm custom-btn-green">ซูมออก</button>
                    <button id="closeModalDesc" class="btn btn-secondary btn-sm">ปิด</button> <!-- แก้ ID เป็น closeModalDesc -->
                </div>
                <pre id="descriptionContent" style="font-size: 14px;">
                    <?php echo htmlspecialchars(file_get_contents('lab03-2/description.php')); ?>
                </pre>
            </div>

            <div id="modalOverlay"></div>

        <?php } else { ?>
            <h2>การหาพื้นที่สี่เหลี่ยมด้วยการคำนวณแบบฟังก์ชั้น</h2><hr>
            <form action="" method="POST">
                <div class="row mb-3">
                    <div class="col">
                        <label for="num_a" class="form-label">ป้อนค่า A :</label>
                        <input type="number" name="num_a" class="form-control" placeholder="ป้อนค่าตัวเลข" required>
                    </div>



                    <div class="col-auto">
                        <label for="operator" class="form-label">เลือกรูปแบบ:</label>
                        <select name="op" class="form-select form-select-sm">
                            <option value="rectangle">หาพื้นที่สี่เหลี่ยม</option>
                            <option value="square">หาพื้นที่รอบรูป</option>
                            
                        </select>
                    </div>






                    <div class="col">
                        <label for="num_b" class="form-label">ป้อนค่า B :</label>
                        <input type="number" name="num_b" class="form-control" placeholder="ป้อนค่าตัวเลข" required>
                    </div>
                </div>
                <hr>
                <button type="submit" class="btn btn-success btn-calculate btn-block">คำนวณ</button>
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

        $('#showDescriptionBtn').click(function() {
            $('#modalOverlay').show(); 
            $('#descriptionModal').show(); 
        });

        $('#closeModalCode, #closeModalDesc, #modalOverlay').click(function() {
            $('#codeModal').hide(); 
            $('#descriptionModal').hide(); 
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

        $('#zoomInDesc').click(function() {
            let currentSize = parseFloat($('#descriptionContent').css('font-size'));
            $('#descriptionContent').css('font-size', (currentSize + 2) + 'px');
        });

        $('#zoomOutDesc').click(function() {
            let currentSize = parseFloat($('#descriptionContent').css('font-size'));
            $('#descriptionContent').css('font-size', (currentSize - 2) + 'px');
        });
    });
</script>

</body>
</html>
