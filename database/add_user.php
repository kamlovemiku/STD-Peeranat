<?php
require_once 'db.php';
require_once 'sd.php';

// เชื่อมต่อฐานข้อมูล
$database = new Database();
$db = $database->getConnection();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $code = $_POST['code'];
    $fname = $_POST['Fname'];
    $lname = $_POST['Lname'];

    $evaluationItem = new EvaluationItem($db, "tb_user");
    $evaluationItem->code = $code;
    $evaluationItem->Fname = $fname;
    $evaluationItem->Lname = $lname;

    try {
        // ลองเพิ่มข้อมูล
        if ($evaluationItem->create()) {
            echo "<script>
                    alert('เพิ่มข้อมูลสำเร็จ');
                    window.location.href = '?p=userda';
                  </script>";
            exit;
        } else {
            echo "เกิดข้อผิดพลาดในการเพิ่มข้อมูล";
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage(); // แสดงข้อความหากพบข้อมูลซ้ำ
    }
}
?>
