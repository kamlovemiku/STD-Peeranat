<?php
require_once 'db.php'; // รวมไฟล์เชื่อมต่อฐานข้อมูล
require_once 'qd.php'; // รวมไฟล์ Evaluation.php

$database = new Database();
$db = $database->getConnection();

$evaluationItem = new EvaluationItem($db, "tb_questions");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // รับค่าจากฟอร์ม
    $evaluationItem->question_text = $_POST['question_text']; // แก้ไขตรงนี้ให้เป็น question_text

    // เพิ่มข้อมูลลงในฐานข้อมูล
    if ($evaluationItem->createQ()) { // เปลี่ยนจาก create() เป็น createQ()
        echo "<div class='alert alert-success'>เพิ่มคำถามใหม่เรียบร้อยแล้ว!</div>";
        echo "<script>setTimeout(function(){ window.location.href='?p=ques_data'; }, 2000);</script>"; // เปลี่ยนเส้นทางไปยังหน้าคำถาม
    } else {
        echo "<div class='alert alert-danger'>ไม่สามารถเพิ่มคำถามได้!</div>";
    }
}
?>
