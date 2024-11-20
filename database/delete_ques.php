<?php
require_once 'db.php'; // รวมไฟล์เชื่อมต่อฐานข้อมูล
require_once 'qd.php'; // รวมไฟล์ Evaluation.php

$database = new Database();
$db = $database->getConnection();

$evaluationItem = new EvaluationItem($db, "tb_questions");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // รับ id ของคำถามที่ต้องการลบ
    $id = $_POST['id'];

    // ลบคำถามจากฐานข้อมูล
    if ($evaluationItem->deleteq($id)) {
        echo "<div class='alert alert-success'>ลบคำถามเรียบร้อยแล้ว!</div>";
        echo "<script>setTimeout(function(){ window.location.href='?p=ques_data'; }, 2000);</script>"; // เปลี่ยนเส้นทางไปยังหน้าคำถาม
    } else {
        echo "<div class='alert alert-danger'>ไม่สามารถลบคำถามได้!</div>";
    }
}
?>
