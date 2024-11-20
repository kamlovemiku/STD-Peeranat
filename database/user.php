<?php
require_once 'db.php'; // รวมไฟล์เชื่อมต่อฐานข้อมูล
require_once 'sd.php'; // รวมไฟล์ Evaluation.php

$database = new Database();
$db = $database->getConnection();

// สร้างอ็อบเจ็กต์ EvaluationItem
$evaluationItem = new EvaluationItem($db, "tb_user");

// ดึงข้อมูลจากฐานข้อมูล
$stmt = $evaluationItem->read();
$num = $stmt->rowCount();
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USER Management</title>
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
            background-color: #218838; /* สีพื้นหลังของหัวตาราง */
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
            justify-content: center;
            margin-top: 20px;
            gap: 15px; /* เว้นระยะระหว่างปุ่ม */
        }
        .btn-primary {
            background-color: #007bff; /* สีปุ่มหลัก */
            border: none;
            color: white; /* สีตัวอักษร */
            padding: 10px 20px; /* ขนาดปุ่ม */
            border-radius: 0.5rem; /* มุมมนของปุ่ม */
            transition: background-color 0.3s ease, transform 0.2s ease; /* เอฟเฟกต์เมื่อ hover */
        }
        .btn-primary:hover {
            background-color: #0056b3; /* สีเมื่อ hover */
            transform: scale(1.05); /* ขยายขนาดเมื่อ hover */
        }
        .btn-success {
            background-color: #28a745; /* สีปุ่มเพิ่มข้อมูล */
            border: none;
            color: white; /* สีตัวอักษร */
            padding: 10px 20px; /* ขนาดปุ่ม */
            border-radius: 0.5rem; /* มุมมนของปุ่ม */
            transition: background-color 0.3s ease, transform 0.2s ease; /* เอฟเฟกต์เมื่อ hover */
        }
        .btn-success:hover {
            background-color: #218838; /* สีเมื่อ hover */
            transform: scale(1.05); /* ขยายขนาดเมื่อ hover */
        }
        .btn-edit, .btn-delete {
            margin-right: 5px;
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
    <h2 class="text-center mb-4">USER Management</h2>

    <?php
    // ตรวจสอบว่ามีข้อมูลหรือไม่
    if ($num > 0) {
        echo "<div class='table-responsive'>"; // ทำให้ตารางเลื่อนขึ้นเมื่อเกินขนาด
        echo "<table class='table table-bordered table-striped'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>CodeName</th>";
        echo "<th>FirstName</th>";
        echo "<th>LastName</th>";
        echo "<th>Actions</th>"; // เพิ่มคอลัมน์ Actions สำหรับปุ่ม
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

        // วนลูปเพื่อแสดงผลข้อมูลแต่ละแถว
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['code']) . "</td>";
            echo "<td>" . htmlspecialchars($row['Fname']) . "</td>";
            echo "<td>" . htmlspecialchars($row['Lname']) . "</td>";
            echo "<td>";
            echo "<a href='?p=edit&code=" . htmlspecialchars($row['code']) . "' class='btn btn-warning btn-sm btn-edit'>แก้ไข</a>";
            echo "<a href='?p=delete&code=" . htmlspecialchars($row['code']) . "' class='btn btn-danger btn-sm btn-delete' onclick='return confirm(\"ต้องการลบข้อมูลนี้หรือไม่?\");'>ลบ</a>";
            echo "</td>";
            echo "</tr>";
        }

        echo "</tbody>";
        echo "</table>";
        echo "</div>"; // ปิด div ของ table-responsive
    } else {
        echo "<div class='alert alert-warning text-center'>ไม่มีข้อมูลการประเมิน</div>";
    }
    ?>

    <!-- ฟอร์มสำหรับเพิ่มข้อมูลใหม่ -->
    <h3 class="text-center mt-5">เพิ่มข้อมูลผู้ใช้</h3>
    <form action="?p=add_user" method="POST" class="mt-4">
        <div class="mb-3">
            <label for="code" class="form-label">CodeName</label>
            <input type="text" class="form-control" id="code" name="code" required>
        </div>
        <div class="mb-3">
            <label for="Fname" class="form-label">FirstName</label>
            <input type="text" class="form-control" id="Fname" name="Fname" required>
        </div>
        <div class="mb-3">
            <label for="Lname" class="form-label">LastName</label>
            <input type="text" class="form-control" id="Lname" name="Lname" required>
        </div>
        <div class="btn-container">
            <button type="submit" class="btn btn-success">เพิ่มข้อมูล</button>
        </div>
    </form>

    <div class="btn-container">
        <button class="btn btn-primary" onclick="window.location.href='?p=evaluda'">Evaluation</button>
        <button class="btn btn-primary" onclick="window.location.href='?p=ques_data'">Question</button>
    </div>

</div>

<!-- รวม Bootstrap JS และ dependencies -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script> -->

</body>
</html>
