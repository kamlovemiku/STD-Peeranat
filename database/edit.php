<?php
require_once 'db.php';
require_once 'sd.php';

$database = new Database();
$db = $database->getConnection();

if (isset($_GET['code'])) {
    $code = htmlspecialchars($_GET['code']);
    $query = "SELECT * FROM tb_user WHERE code = :code LIMIT 1";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':code', $code);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        echo "ไม่พบข้อมูลผู้ใช้.";
        exit();
    }
} else {
    echo "ไม่พบ code ของผู้ใช้.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขข้อมูลผู้ใช้</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center">แก้ไขข้อมูลผู้ใช้</h2>
    <form action="" method="POST" class="mt-4">
        <div class="mb-3">
            <label for="code" class="form-label">CodeName</label>
            <input type="text" class="form-control" id="code" name="code" value="<?php echo htmlspecialchars($user['code']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="Fname" class="form-label">FirstName</label>
            <input type="text" class="form-control" id="Fname" name="Fname" value="<?php echo htmlspecialchars($user['Fname']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="Lname" class="form-label">LastName</label>
            <input type="text" class="form-control" id="Lname" name="Lname" value="<?php echo htmlspecialchars($user['Lname']); ?>" required>
        </div>
        <button type="submit" class="btn btn-success">บันทึกการเปลี่ยนแปลง</button>
        <a href="index.php?p=userda" class="btn btn-secondary">กลับ</a>
        <button type="button" class="btn btn-danger" onclick="confirmDelete('<?php echo $user['code']; ?>')">ลบข้อมูล</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script>
function confirmDelete(code) {
    if (confirm('คุณแน่ใจว่าต้องการลบข้อมูลผู้ใช้นี้?')) {
        window.location.href = 'delete.php?code=' + code; // เปลี่ยนเส้นทางไปยังไฟล์ลบ
    }
}
</script>
</body>
</html>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $new_code = htmlspecialchars($_POST['code']);
    $Fname = htmlspecialchars($_POST['Fname']);
    $Lname = htmlspecialchars($_POST['Lname']);

    // คำสั่งอัปเดต
    $query = "UPDATE tb_user SET code = :new_code, Fname = :Fname, Lname = :Lname WHERE code = :old_code";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':new_code', $new_code);
    $stmt->bindParam(':Fname', $Fname);
    $stmt->bindParam(':Lname', $Lname);
    $stmt->bindParam(':old_code', $code);

    if ($stmt->execute()) {
        // แสดงข้อความและเปลี่ยนเส้นทาง
        echo "<script>
                alert('แก้ไขข้อมูลสำเร็จ');
                window.location.href = 'index.php?p=userda';
              </script>";
        exit();
    } else {
        echo "เกิดข้อผิดพลาดในการแก้ไขข้อมูล.";
    }
}
?>
