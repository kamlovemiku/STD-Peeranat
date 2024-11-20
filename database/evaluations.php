<?php
require_once 'db.php'; // รวมไฟล์เชื่อมต่อฐานข้อมูล
require_once 'sd.php'; // รวมไฟล์ Evaluation.php

$database = new Database();
$db = $database->getConnection();

// สร้างอ็อบเจ็กต์ EvaluationItem
$evaluationItem = new EvaluationItem($db, "tb_evaluations");

// ดึงข้อมูลจากฐานข้อมูล
$stmt = $evaluationItem->read();
$num = $stmt->rowCount();
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evaluation Items</title>
    <style>
        body {
            background-color: #f8f9fa; /* สีพื้นหลัง */
        }
        h2 {
            color: #343a40; /* สีหัวข้อ */
        }
        .table-container {
            border-radius: 0.5rem; /* มุมตารางมน */
            overflow: hidden; /* ซ่อนขอบ */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* เพิ่มเงา */
            background-color: white; /* สีพื้นหลังของการ์ด */
            padding: 20px; /* เว้นระยะภายใน */
        }
        .table {
            width: 100%;
            border-collapse: collapse; /* ทำให้ขอบตารางติดกัน */
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
            justify-content: center; /* จัดตำแหน่งให้ตรงกลาง */
            gap: 20px; /* เว้นระยะระหว่างปุ่ม */
            margin-top: 20px;
        }
        .btn-primary {
            padding: 10px 20px;
            background-color: #28a745; /* เปลี่ยนสีปุ่ม */
            border: none;
            transition: background-color 0.3s ease; /* ทำให้ปุ่มเปลี่ยนสีได้ลื่น */
            color: white; /* สีตัวอักษร */
            border-radius: 5px; /* มุมมนของปุ่ม */
        }
        .btn-primary:hover {
            background-color: #218838; /* เปลี่ยนสีเมื่อ hover */
        }
        .table-responsive {
            margin-top: 30px;
            overflow-x: auto; /* ทำให้ตารางเลื่อนในแนวนอนเมื่อเกินขนาด */
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center mb-4">Evaluation</h2>

    <div class="table-container">
        <?php
        // ตรวจสอบว่ามีข้อมูลหรือไม่
        if ($num > 0) {
            echo "<div class='table-responsive'>"; // ทำให้ตารางเลื่อนขึ้นเมื่อเกินขนาด
            echo "<table class='table table-bordered table-striped'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th>Evaluation ID</th>";
            echo "<th>Code</th>";
            echo "<th>Question ID</th>";
            echo "<th>Score</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";

            // วนลูปเพื่อแสดงผลข้อมูลแต่ละแถว
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['evaluation_id']) . "</td>";
                echo "<td>" . htmlspecialchars($row['code']) . "</td>";
                echo "<td>" . htmlspecialchars($row['question_id']) . "</td>";
                echo "<td>" . htmlspecialchars($row['score']) . "</td>";
                echo "</tr>";
            }

            echo "</tbody>";
            echo "</table>";
            echo "</div>"; // ปิด div ของ table-responsive
        } else {
            echo "<div class='alert alert-warning text-center'>ไม่มีข้อมูลการประเมิน</div>";
        }
        ?>
    </div>

    <div class="btn-container">
        <button class="btn btn-primary" onclick="window.location.href='?p=userda'">User</button>
        <button class="btn btn-primary" onclick="window.location.href='?p=ques_data'">Question</button>
    </div>
</div>

</body>
</html>
