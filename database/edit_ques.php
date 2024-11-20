<?php
require_once 'db.php'; // รวมไฟล์เชื่อมต่อฐานข้อมูล
require_once 'qd.php'; // รวมไฟล์ Evaluation.php

$database = new Database();
$db = $database->getConnection();

$evaluationItem = new EvaluationItem($db, "tb_questions");

// ตรวจสอบว่ามีการส่ง ID มาหรือไม่
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // ดึงข้อมูลคำถามที่ต้องการแก้ไข
    $query = "SELECT * FROM tb_questions WHERE question_id = :id";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    // ตรวจสอบว่าพบข้อมูลหรือไม่
    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    } else {
        echo "<div class='alert alert-danger'>ไม่พบคำถามที่ต้องการแก้ไข</div>";
        exit();
    }
} else {
    echo "<div class='alert alert-danger'>ไม่มี ID ที่ส่งมา</div>";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // รับค่าจากแบบฟอร์ม
    $evaluationItem->question_text = $_POST['question_text'];
    $evaluationItem->id = $id; // ใช้ ID ที่ดึงมา

    // ทำการอัพเดทคำถาม
    if ($evaluationItem->updateq()) {
        echo "<div class='alert alert-success'>แก้ไขคำถามเรียบร้อยแล้ว!</div>";
        echo "<script>setTimeout(function(){ window.location.href='?p=ques_data'; }, 2000);</script>"; // เปลี่ยนเส้นทางไปยังหน้าคำถาม
    } else {
        echo "<div class='alert alert-danger'>ไม่สามารถแก้ไขคำถามได้!</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขคำถาม</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"> -->
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center">แก้ไขคำถาม</h2>
    <form action="" method="POST" class="mt-4">
        <div class="mb-3">
            <label for="question_text" class="form-label">คำถาม</label>
            <input type="text" class="form-control" id="question_text" name="question_text" value="<?php echo htmlspecialchars($row['question_text']); ?>" required>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary">บันทึกการเปลี่ยนแปลง</button>
            <a href="?p=ques_data" class="btn btn-secondary">ยกเลิก</a>
        </div>
    </form>
</div>

</body>
</html>
