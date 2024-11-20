<?php
ob_start(); // เริ่ม buffer output
require_once 'db.php';
require_once 'sd.php';

$database = new Database();
$db = $database->getConnection();

if (!empty($_GET['code'])) {
    $code = htmlspecialchars($_GET['code']);
    
    $query = "DELETE FROM tb_user WHERE code = :code";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':code', $code);

    // ลองลบข้อมูล
    if ($stmt->execute()) { // ตรวจสอบว่าลบข้อมูลสำเร็จ
        // ใช้ JavaScript เพื่อแสดงข้อความแจ้งเตือนและเปลี่ยนหน้า
        echo "<script>
                alert('ลบข้อมูลสำเร็จ');
                window.location.href = 'index.php?p=userda'; // เปลี่ยนเส้นทางไปยังหน้า userda
              </script>";
        exit(); // หยุดการทำงานของสคริปต์
    } else {
        echo "<script>
                alert('เกิดข้อผิดพลาดในการลบข้อมูล.');
                window.location.href = 'index.php?p=userda'; // เปลี่ยนเส้นทางไปยังหน้า userda
              </script>";
        exit();
    }
} else {
    echo "<script>
            alert('ไม่พบ ID ของผู้ใช้.');
            window.location.href = 'index.php?p=userda'; // เปลี่ยนเส้นทางไปยังหน้า userda
          </script>";
    exit();
}
