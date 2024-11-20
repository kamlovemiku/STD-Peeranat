<?php
include("class.php");

echo '<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@400&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ผลการคำนวณ</title>
    <style>
        body {
            font-family: "Sarabun", sans-serif;
            background-color: #e9f5e9; /* สีพื้นหลังที่เป็นมิตรกับสิ่งแวดล้อม */
        }
        .result-container {
            margin: 50px auto;
            padding: 20px;
            border-radius: 10px;
            background-color: #fff; /* พื้นหลังของฟอร์ม */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center; /* จัดกลางข้อความ */
        }
        h2 {
            color: #2c3e50; /* สีหัวข้อ */
        }
        .result {
            font-size: 1.5rem;
            margin-top: 20px;
            color: #28a745; /* สีผลลัพธ์ */
        }
        .btn-custom {
            background-color: #28a745; /* สีพื้นหลังของปุ่ม */
            color: white; /* สีข้อความในปุ่ม */
            border: none; /* ไม่มีขอบ */
            border-radius: 5px; /* มุมโค้ง */
            padding: 10px 20px; /* ขนาดของปุ่ม */
            text-decoration: none; /* ไม่มีการขีดเส้นใต้ */
            transition: background-color 0.3s; /* การเปลี่ยนสีพื้นหลังเมื่อเลื่อนเมาส์ */
            margin-top: 20px; /* เพิ่ม margin ด้านบน */
        }
        .btn-custom:hover {
            background-color: #218838; /* สีเมื่อเลื่อนเมาส์ */
        }
    </style>
</head>
<body>

<div class="result-container">
    <h2>ผลการคำนวณ</h2>';

$a = floatval($_POST['num_a']);
$b = floatval($_POST['num_b']);
$operation = $_POST['num'];

$calculator = new classnum($a, $b);
$result = null;
$operator = '';

switch ($operation) {
    case 'add':
        $operator = '+';
        $result = $calculator->add();
        break;
    case 'substract':
        $operator = '-';
        $result = $calculator->substract();
        break;
    case 'multiplication':
        $operator = '*';
        $result = $calculator->multiplication();
        break;
    case 'division':
        if ($b != 0) {
            $operator = '/';
            $result = $calculator->division();
        } else {
            $operator = '/';
            $result = "ไม่สามารถหารด้วยศูนย์";
        }
        break;
    case 'exponent':
        $operator = '^';
        $result = $calculator->exponent();
        break;
    case 'fractional':
        if ($b != 0) {
            $operator = '%';
            $result = $calculator->fractional();
        } else {
            $operator = '%';
            $result = "ไม่สามารถหาเศษด้วยศูนย์";
        }
        break;
    case 'Part':
        if ($b != 0) {
            $operator = '\\';
            $result = $calculator->Part();
        } else {
            $operator = '\\';
            $result = "ไม่สามารถหารด้วยศูนย์";
        }
        break;
}

echo "<div class='result'>$a $operator $b = " . $result . "</div>";
echo "<br>";
echo '<a href="?p=lab02-1" class="btn-custom">กลับ</a>';
echo '</div>';

echo '</body>
</html>';
?>
