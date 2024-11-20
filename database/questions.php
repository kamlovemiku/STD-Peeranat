<?php
require_once 'db.php'; // รวมไฟล์เชื่อมต่อฐานข้อมูล
require_once 'qd.php'; // รวมไฟล์ Evaluation.php

$database = new Database();
$db = $database->getConnection();

// สร้างอ็อบเจ็กต์ EvaluationItem สำหรับ tb_questions
$evaluationItem = new EvaluationItem($db, "tb_questions");

// ดึงข้อมูลจากฐานข้อมูล
$stmt = $evaluationItem->readq();
$num = $stmt->rowCount();
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question Items</title>
    <style>
        body {
            background-color: #f8f9fa; /* สีพื้นหลัง */
            font-family: 'Arial', sans-serif; /* เปลี่ยนฟอนต์ */
        }
        h2 {
            color: #343a40; /* สีหัวข้อ */
        }
        .table {
            border-radius: 0.5rem; /* มุมตารางมน */
            overflow: hidden; /* ซ่อนขอบ */
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); /* เพิ่มเงา */
        }
        .table thead th {
            background-color: #007bff; /* สีพื้นหลังของหัวตาราง */
            color: white; /* สีตัวอักษรของหัวตาราง */
        }
        .table tbody tr:hover {
            background-color: #e9ecef; /* สีเมื่อโฮเวอร์แถว */
        }
        .alert {
            margin-top: 20px; /* เว้นระยะบนของข้อความเตือน */
        }
        .container {
            margin-top: 50px; /* เว้นระยะด้านบนของ container */
        }
        .btn-container {
            display: flex;
            justify-content: center; /* จัดตำแหน่งปุ่มให้อยู่กลาง */
            gap: 20px; /* เว้นระยะระหว่างปุ่ม */
            margin-top: 20px; /* เว้นระยะด้านบน */
        }
        .btn-primary {
            padding: 10px 20px;
            background-color: #28a745; /* เปลี่ยนสีปุ่ม */
            border: none;
            transition: background-color 0.3s ease, transform 0.2s ease; /* ทำให้ปุ่มเปลี่ยนสีได้ลื่น */
            color: white; /* สีตัวอักษร */
            border-radius: 5px; /* มุมมนของปุ่ม */
        }
        .btn-primary:hover {
            background-color: #218838; /* เปลี่ยนสีเมื่อ hover */
            transform: scale(1.05); /* ขยายขนาดเมื่อ hover */
        }
        .btn-danger {
            transition: background-color 0.3s ease, transform 0.2s ease; /* ทำให้ปุ่มเปลี่ยนสีได้ลื่น */
        }
        .btn-danger:hover {
            background-color: #c82333; /* เปลี่ยนสีเมื่อ hover */
            transform: scale(1.05); /* ขยายขนาดเมื่อ hover */
        }
        .table-responsive {
            margin-top: 30px;
        }
        .form-label {
            font-weight: bold; /* ทำให้ตัวอักษรของ label หนา */
        }
        .form-control {
            border-radius: 0.5rem; /* มุมมนของ input */
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center mb-4">Question</h2>

    <?php
    // ตรวจสอบว่ามีข้อมูลหรือไม่
    if ($num > 0) {
        echo "<div class='table-responsive'>"; // ทำให้ตารางเลื่อนขึ้นเมื่อเกินขนาด
        echo "<table class='table table-bordered table-striped'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>Question ID</th>";
        echo "<th>Question</th>";
        echo "<th>Action</th>"; // เพิ่มคอลัมน์สำหรับการกระทำ
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

        // วนลูปเพื่อแสดงผลข้อมูลแต่ละแถว
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['question_id']) . "</td>";
            echo "<td>" . htmlspecialchars($row['question_text']) . "</td>";
            // ปุ่มแก้ไขและลบ
            echo "<td>
                    <a href='?p=edit_ques&id=" . htmlspecialchars($row['question_id']) . "' class='btn btn-warning btn-sm'>แก้ไข</a>
                    <form action='?p=delete_ques' method='POST' onsubmit='return confirm(\"ต้องการลบข้อมูลนี้หรือไม่?\");' style='display:inline;'>
                        <input type='hidden' name='id' value='" . $row['question_id'] . "'>
                        <button type='submit' class='btn btn-danger btn-sm'>ลบ</button>
                    </form>
                  </td>";
            echo "</tr>";
        }

        echo "</tbody>";
        echo "</table>";
        echo "</div>"; // ปิด div ของ table-responsive
    } else {
        echo "<div class='alert alert-warning text-center'>ไม่มีข้อมูลคำถาม</div>";
    }
    ?>

    <div class="container mt-5">
        <h3 class="text-center mt-5">เพิ่มคำถาม</h3>
        <form action="?p=add_ques" method="POST" class="mt-4">
            <div class="mb-3">
                <label for="question_text" class="form-label">คำถาม</label>
                <input type="text" class="form-control" id="question_text" name="question_text" required>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">เพิ่มคำถาม</button>
                <a href="?p=questions" class="btn btn-secondary">ยกเลิก</a>
            </div>
        </form>
    </div>

    <div class="btn-container">
        <button class="btn btn-primary" onclick="window.location.href='?p=userda'">User</button>
        <button class="btn btn-primary" onclick="window.location.href='?p=evaluda'">Evaluation</button>
    </div>
    
</div>

<!-- รวม Bootstrap JS และ dependencies -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script> -->

</body>
</html>
