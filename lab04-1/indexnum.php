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
    background-color: #e9f5e9; 
}

.custom-container {
    border: 1px solid #4361ee; 
    border-radius: 15px; 
    padding: 20px; 
    background-color: #ffffff; 
    width: 800px; 
    margin: auto; 
    text-align: center; 
}

.mb-3 {
    margin-bottom: 1.5rem; 
}

.btn-calculate {
    background-color: #4361ee; /* เปลี่ยนเป็นสีที่คุณต้องการ */
    color: #ffffff; /* กำหนดสีตัวอักษรเป็นสีขาว */
    border: none;
    width: 750px; /* ปรับขนาดปุ่ม */
}

/* เพิ่มหลังจากนี้ */
.btn-calculate:hover {
    background-color: #3a54d4; /* เปลี่ยนสีเมื่อเม้าส์ Hover (#3a54d4) */
}

h2 {
    text-align: center; /* จัดตำแหน่งข้อความให้อยู่ตรงกลาง */
    margin-top: 40px; /* ระยะห่างด้านบน */
    margin-bottom: 20px; /* ระยะห่างด้านล่าง */
}

.result {
    font-size: 24px; 
    font-weight: bold; 
}

.custom-btn {
    background-color: #4361ee; 
    color: #ffffff; 
    border: none; 
    width: 100%; /* ปรับขนาดปุ่มให้เต็มความกว้าง */
    margin-bottom: 10px; /* ระยะห่างของปุ่ม */
}

.custom-btn:hover {
    background-color: #3a54d4; 
}

.custom-btn-green {
    background-color: #4361ee;
    color: #ffffff;
    border: none;
    width: 100px; /* ปรับขนาดตามที่ต้องการ */
}

.custom-btn-green:hover {
    background-color: #3a54d4;
}

/* Modal styles */
#codeModal, #descriptionModal {
    display: none; 
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background: #fff;
    border: 1px solid #4361ee; 
    padding: 20px;
    z-index: 1000;
    width: 80%;
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

#hr {
    border: none;
    border-top: 1px solid #4361ee; /* กำหนดสีของเส้นให้เข้ากับสีของกรอบ */
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

            include("formula.php");
            $a = floatval($_POST['num_a']);
            $operation = $_POST['operator']; 

            $calculator = new classnum($a);
            $result = null;
            $operator = '';
            $d = "";
            $e = "";
            $f = "";
            $g = "";
            $h = "";
            $i = "";
            $j = "";
            switch ($operation) {
                case 'area':
                    $d = "3.14";
                    $e = "*";
                    $result = $calculator->area();
                    $f = $a;
                    break;
                case 'line':
                    $d = "3.14";
                    $h = "*";
                    $g = "2";
                    $result = $calculator->line();
                    break;
            }
        ?>
            <h2>ผลการคำนวณ</h2>
            <hr>
            <div class="result">

            <?php 
            
               
                echo "$g $h $d $e $h $a $e $f  =". $result;
            
            
            
            
            ?>
            
              
            </div>
            <hr>
            <div class="row">
                <div class="col">
                    <a href="javascript:history.go(-1)" class="btn custom-btn btn-block" style="width: 200px" >กลับ</a>
                </div>
                <div class="col">
                <a href="?p=lab04-2-1" class="btn custom-btn btn-block" style="width: 200px" >Code</a>
                 
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
                    <?php echo htmlspecialchars(file_get_contents('lab03/lab03-1/formula.php')); ?>
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
                    <?php echo htmlspecialchars(file_get_contents('description.php')); ?>
                </pre>
            </div>

            <div id="modalOverlay"></div>

        <?php } else { ?>
            <h2>การหาพื้นที่วงกลมด้วยการคำนวณแบบวัตถุ</h2><hr>
            <form action="" method="POST">
                <div class="row mb-3">
                    <div class="col">
                        <label for="num_a" class="form-label">ป้อนค่า R :</label>
                        <input type="number" name="num_a" class="form-control" placeholder="ป้อนค่าตัวเลข" required>
                    </div>



                    <div class="col-auto">
                        <label for="operator" class="form-label">เลือกรูปแบบ:</label>
                        <select name="operator" class="form-select form-select-sm">
                            <option value="area">การหาพื้นที่วงกลม</option>
                            <option value="line">การหาเส้นรอบวง</option>
                            
                        </select>
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
