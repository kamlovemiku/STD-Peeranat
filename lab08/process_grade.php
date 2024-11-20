<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Grade Form</title>
    <!-- Bootstrap CSS -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> -->
</head>
<body>

<?php
    include 'class1.php';

    $code = $_POST['code'];
    $name = $_POST['name'];
    $midterm = $_POST['midterm'];
    $final = $_POST['final'];

    $studentGrade = new Grade($midterm, $final);

    $grade = $studentGrade->Cal_grade();
    $total = $studentGrade->total;
?>

<div class="container mt-5">
    <h2 class="text-center mb-4">แบบฟอร์มกรอกข้อมูลคะแนน<br>วิชาการเขียนโปรแกรมเชิงวัตถุ</h2>
    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#myModal">
        โจทย์
    </button>
    <form action="process_grade.php" method="POST">
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="code" class="form-label">รหัสนักศึกษา</label>
                <input type="text" class="form-control" name="code" required value="<?php echo $code; ?>" disabled>
            </div>
            <div class="col-md-6">
                <label for="name" class="form-label">ชื่อ-สกุล</label>
                <input type="text" class="form-control" name="name" required value="<?php echo $name; ?>" disabled>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="midterm" class="form-label">คะแนนสอบกลางภาค</label>
                <input type="number" class="form-control" id="midterm" name="midterm" required value="<?php echo $midterm; ?>" disabled>
            </div>
            <div class="col-md-6">
                <label for="final" class="form-label">คะแนนสอบปลายภาค</label>
                <input type="number" class="form-control" id="final" name="final" required value="<?php echo $final; ?>" disabled>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="total" class="form-label">คะแนนทั้งหมด</label>
                <input type="number" class="form-control" id="total" name="total" required value="<?php echo $total; ?>" disabled>
            </div>
            <div class="col-md-6">
                <label for="grade" class="form-label">เกรดที่ได้</label>
                <input type="text" class="form-control" id="grade" name="grade" required value="<?php echo $grade; ?>" disabled>
            </div>
        </div>
        
        <a href="?p=lab08-1" class="btn btn-primary">กลับ</a>
    </form>
</div>

<!-- Bootstrap JS -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> -->

<div class="modal" id="myModal">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
      
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">โจทย์การคำนวณผลการเรียน</h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
      
            <!-- Modal body -->
            <div class="modal-body">
              <img src="lab08/grade.JPG">
            </div>
      
            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
      
          </div>
        </div>
      </div>

</body>
</html>
