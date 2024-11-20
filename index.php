<!DOCTYPE html>
<html lang="th">

<head>
  <title>Peerant Sombatmai_wed</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <!-- Google Fonts for 'Kanit' -->
  <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


  <style>
    body {
      font-family: 'Kanit', sans-serif;
      background-color: #f8f9fa;
      /* ใช้สีพื้นหลังที่เบาและเป็นกลาง */
    }

   

    .custom-container {
      border: 1px solid #28a745;
      border-radius: 15px;
      padding: 30px;
      background-color: #ffffff;
      width: 100%;
      max-width: 900px;
      margin: 30px auto;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      /* เพิ่มเงาให้กับกล่องเนื้อหา */
    }

    .btn-calculate {
      background-color: #198754;
      color: #ffffff;
      border: none;
      width: 100%;
      padding: 12px;
      font-size: 16px;
      border-radius: 8px;
    }

    .btn-calculate:hover {
      background-color: #156d4a;
    }

    h2 {
      text-align: center;
      margin-top: 40px;
      margin-bottom: 20px;
      color: #28a745;
      /* เปลี่ยนสีของหัวข้อ */
    }

    .result {
      font-size: 24px;
      font-weight: bold;
      color: #333;
      /* เปลี่ยนสีข้อความผลลัพธ์ */
    }

    .custom-btn,
    .custom-btn-green {
      border-radius: 8px;
      padding: 10px;
      font-size: 16px;
    }

    .custom-btn {
      background-color: #007bff;
      color: #ffffff;
      border: none;
      width: 100%;
    }

    .custom-btn:hover {
      background-color: #0056b3;
    }

    .custom-btn-green {
      background-color: #198754;
      color: #ffffff;
      border: none;
      width: 100px;
    }

    .custom-btn-green:hover {
      background-color: #137d59;
    }

    /* ปรับแต่ง Offcanvas ให้พอดีกับหน้าต่าง */
    .offcanvas {
      width: auto;
      /* กำหนดความกว้างของ Offcanvas */
      max-height: auto;
      /* ไม่เกินความสูงของหน้าต่าง */
    }

    /* ปรับแต่งไอคอนและข้อความในเมนู */
    .navbar-brand,
    .nav-link {
      font-size: 18px;
      display: flex;
      align-items: center;
    }

    .navbar-brand i,
    .nav-link i {
      margin-right: 8px;
      font-size: 20px;
    }

    /* ปรับแต่ง Dropdown Menu Items */
    .dropdown-item {
      display: flex;
      align-items: center;
    }

    .dropdown-item i {
      margin-right: 8px;
      font-size: 18px;
    }

    /* เพิ่มระยะห่างระหว่างเมนู */
    .navbar-nav .nav-item {
      margin-bottom: 5px;
    }

    /* ปรับปรุงสำหรับหน้าจอขนาดเล็ก */
    @media (max-width: 576px) {
      .offcanvas {
        width: 100%;
        /* ให้ Offcanvas พอดีกับความกว้างของหน้าจอ */
      }

      .navbar-brand {
        font-size: 16px;
      }

      .nav-link {
        font-size: 16px;
      }

      .dropdown-item i {
        font-size: 16px;
      }

      .custom-container {
        padding: 20px;
      }
    }

    .dropdown-submenu:hover .dropdown-menu {
      display: block;
    }

    .dropdown-menu {
      display: none;
      /* เริ่มต้นซ่อนเมนูย่อย */
    }

    .dropdown-submenu:hover .dropdown-menu {
      display: block;
      /* แสดงเมนูย่อยเมื่อเลื่อนเมาส์ไปที่เมนูหลัก */
    }

    /* สไตล์ที่มีอยู่แล้วในโค้ดของคุณ */
    .custom-container {
      border: 1px solid #28a745;
      border-radius: 15px;
      padding: 30px;
      background-color: #ffffff;
      width: 100%;
      max-width: 900px;
      margin: 30px auto;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    /* ปรับปรุงสไตล์อื่น ๆ ตามต้องการ */


    h1 {
      color: #2E86C1;
      font-family: Arial, sans-serif;
    }

    p {
      font-size: 16px;
      line-height: 1.5;
    }
  </style>
</head>

<body>

  <!-- Navbar with Offcanvas and Icons -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <!-- ไอคอนเมนูด้านซ้ายบน -->
      <button class="btn btn-dark me-2 d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
        aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
        <i class="bi bi-list"></i>
      </button>

      <a class="navbar-brand" href="index.php"><i class="bi bi-house-door-fill"></i> พีรณัฐ</a>

      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
        aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="offcanvasNavbar"
        aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasNavbarLabel">เมนูหลัก</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
            aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <ul class="navbar-nav justify-content-start flex-grow-1 pe-3">
            <!-- Single Dropdown for All Labs -->
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="labsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-menu-button-wide"></i> Labs
              </a>
              <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="labsDropdown">
                <!-- Lab01 Dropdown -->
                <li class="dropdown-submenu">
                  <a class="dropdown-item dropdown-toggle" href="#"><i class="bi bi-code-slash"></i> Lab01-พื้นฐานโปรแกรม</a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="?p=lab01_1"><i class="bi bi-terminal"></i> Lab01-1</a></li>
                    <li><a class="dropdown-item" href="?p=lab01_2"><i class="bi bi-terminal"></i> Lab01-2</a></li>
                    <li><a class="dropdown-item" href="?p=lab01_3"><i class="bi bi-terminal"></i> Lab01-3</a></li>
                  </ul>
                </li>

                <!-- Lab02 Dropdown -->
                <li class="dropdown-submenu">
                  <a class="dropdown-item dropdown-toggle" href="#"><i class="bi bi-gear-fill"></i> Lab02-ฟังก์ชัน-OOP</a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="?p=lab02_1"><i class="bi bi-function"></i> Lab02-1</a></li>
                    <li><a class="dropdown-item" href="?p=lab02_2"><i class="bi bi-function"></i> Lab02-2</a></li>
                    <li><a class="dropdown-item" href="?p=labclass"><i class="bi bi-collection"></i> Lab Class</a></li>
                    <li><a class="dropdown-item" href="?p=myclass"><i class="bi bi-collection"></i> My Class</a></li>
                    <li><a class="dropdown-item" href="?p=lab02-1"><i class="bi bi-input-cursor-text"></i> Lab02-Input</a></li>
                  </ul>
                </li>

                <!-- Lab03 Dropdown -->
                <li class="dropdown-submenu">
                  <a class="dropdown-item dropdown-toggle" href="#"><i class="bi bi-aspect-ratio-fill"></i> Lab03-หาพื้นที่</a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="?p=lab03-1"><i class="bi bi-circle"></i> Lab03-1</a></li>
                    <li><a class="dropdown-item" href="?p=lab03-2"><i class="bi bi-circle"></i> Lab03-2</a></li>
                    <li><a class="dropdown-item" href="?p=lab03-3"><i class="bi bi-circle"></i> Lab03-3</a></li>
                  </ul>
                </li>

                <!-- Lab04 Dropdown -->
                <li class="dropdown-submenu">
                  <a class="dropdown-item dropdown-toggle" href="#"><i class="bi bi-circle-fill"></i> Lab04-วงกลม</a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="?p=lab04-1"><i class="bi bi-circle"></i> Lab04-1</a></li>
                    <li><a class="dropdown-item" href="?p=lab04-2"><i class="bi bi-circle"></i> Lab04-2</a></li>
                    <li><a class="dropdown-item" href="?p=lab04-3"><i class="bi bi-circle"></i> Lab04-3</a></li>
                  </ul>
                </li>

                <!-- Lab05 Dropdown -->
                <li class="dropdown-submenu">
                  <a class="dropdown-item dropdown-toggle" href="#"><i class="bi bi-cart-fill"></i> Lab05-อิชิตัน</a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="?p=lab05-1"><i class="bi bi-cart"></i> Lab05-1</a></li>
                    <li><a class="dropdown-item" href="?p=lab05-2"><i class="bi bi-cart"></i> Lab05-2</a></li>
                    <li><a class="dropdown-item" href="?p=lab05-3"><i class="bi bi-cart"></i> Lab05-3</a></li>
                  </ul>
                </li>

                <!-- Lab06 Dropdown -->
                <li class="dropdown-submenu">
                  <a class="dropdown-item dropdown-toggle" href="#"><i class="bi bi-receipt-cutoff"></i> Lab06-ภาษี</a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="?p=lab06-1"><i class="bi bi-receipt"></i> Lab06-1</a></li>
                    <li><a class="dropdown-item" href="?p=lab06-2"><i class="bi bi-receipt"></i> Lab06-2</a></li>
                    <li><a class="dropdown-item" href="?p=lab06-3"><i class="bi bi-receipt"></i> Lab06-3</a></li>
                  </ul>
                </li>

                <!-- Lab07 Dropdown -->
                <li class="dropdown-submenu">
                  <a class="dropdown-item dropdown-toggle" href="#"><i class="bi bi-tag-fill"></i> Lab07-จ่ายเงินส่วนลด</a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="?p=lab07-1"><i class="bi bi-tag"></i> Lab07-1</a></li>
                    <li><a class="dropdown-item" href="?p=lab07-2"><i class="bi bi-tag"></i> Lab07-2</a></li>
                    <li><a class="dropdown-item" href="?p=lab07-3"><i class="bi bi-tag"></i> Lab07-3</a></li>
                  </ul>
                </li>

                <!-- Lab08 Dropdown -->
                <li class="dropdown-submenu">
                  <a class="dropdown-item dropdown-toggle" href="#"><i class="bi bi-award-fill"></i> Lab08-grade</a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="?p=lab08-1"><i class="bi bi-award"></i> Lab08-1</a></li>
                  </ul>
                </li>

                <!-- Lab09 Dropdown -->
                <li class="dropdown-submenu">
                  <a class="dropdown-item dropdown-toggle" href="#"><i class="bi bi-lightbulb-fill"></i> Lab09-grade</a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="?p=lab09"><i class="bi bi-lightbulb"></i> Lab09</a></li>
                  </ul>
                </li>

                <!-- Lab10 Dropdown -->
                <li class="dropdown-submenu">
                  <a class="dropdown-item dropdown-toggle" href="#"><i class="bi bi-receipt-cutoff"></i> Lab10-Tax</a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="?p=lab10"><i class="bi bi-receipt-cutoff"></i> Tax</a></li>
                  </ul>
                </li>
                <!-- Lab11 Dropdown -->
                <li class="dropdown-submenu">
                  <a class="dropdown-item dropdown-toggle" href="#"> <i class="fa-solid fa-exclamation"></i> Lab11-Factorial</a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="?p=lab11"><i class="fa-solid fa-exclamation"></i>Factorial_Cal</a></li>
                  </ul>
                </li>

                <!-- constants Dropdown -->
                <li class="dropdown-submenu">
                  <a class="dropdown-item dropdown-toggle" href="#"> <i class="fa-solid fa-code-compare"></i> constants</a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="?p=abstract"><i class="fa-solid fa-code-compare"></i>lab_abstract_prefix</a></li>
                  </ul>
                </li>

                <!-- AIgen Dropdown -->
                <li class="dropdown-submenu">
                  <a class="dropdown-item dropdown-toggle" href="#"> <i class="fa-solid fa-brain"></i> AI</a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="?p=poly"><i class="fa-solid fa-brain"></i>poly+interface</a></li>
                  </ul>
                </li>

                <!-- Database Dropdown -->
                <li class="dropdown-submenu">
                  <a class="dropdown-item dropdown-toggle" href="#"> <i class="fa-solid fa-database"></i> DATABASE</a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="?p=user_data"><i class="fa-solid fa-database"></i>USER</a></li>
                    <li><a class="dropdown-item" href="?p=evalu_data"><i class="fa-solid fa-database"></i>Evaluation</a></li>
                    <li><a class="dropdown-item" href="?p=ques_data"><i class="fa-solid fa-database"></i>Question</a></li>
                  </ul>
                </li>

                <!-- Sum Dropdown -->
                <li class="dropdown-submenu">
                  <a class="dropdown-item dropdown-toggle" href="#"> <i class="fa-solid fa-layer-group"></i>Count the number</a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="?p=sum"><i class="fa-solid fa-layer-group"></i>Even or Odd Checker</a></li>
                  </ul>
                </li>

              </ul>
            </li>
          </ul>

          <ul class="navbar-nav justify-content-start flex-grow-1 pe-3">
            <!-- Single Dropdown for All Labs -->
            <li class="dropdown-submenu">
              <a class="nav-link dropdown-toggle" href="#" id="labsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-menu-button-wide"></i> Final
              </a>
              <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="labsDropdown">
                <!-- Step1 Dropdown -->
                <li class="dropdown-submenu">
                <li><a class="dropdown-item" href="?p=step1"><i class="fa-solid fa-layer-group"></i>Step1</a></li>
            </li>

            <!-- Step2 Dropdown -->
            <li class="dropdown-submenu">
            <li><a class="dropdown-item" href="?p=step2"><i class="fa-solid fa-layer-group"></i>Step2</a></li>
            </li>

            <!-- Step3 Dropdown -->
            <li class="dropdown-submenu">
            <li><a class="dropdown-item" href="?p=step3"><i class="fa-solid fa-layer-group"></i>Step3</a></li>
            </li>

            <!-- Step4 Dropdown -->
            <li class="dropdown-submenu">
            <li><a class="dropdown-item" href="?p=step4"><i class="fa-solid fa-layer-group"></i>Step4</a></li>
            </li>

            <!-- Step5 Dropdown -->
            <li class="dropdown-submenu">
            <li><a class="dropdown-item" href="?p=step5"><i class="fa-solid fa-layer-group"></i>Step5</a></li>
            </li>
          </ul>
          </li>
          </ul>

          
        </div>
      </div>
    </div>
  </nav>




  <!-- Main Content Container -->
  <div class="container-fluid mt-3">
    <div class="custom-container">
      <?php
      if (isset($_GET['p'])) {

        switch ($_GET['p']) {

          case 'lab01_1':
            include("lab01/inputnum_1.html");
            break;
          case 'lab01_2':
            include("lab01/inputnum_2.html");
            break;
          case 'lab01_3':
            include("lab01/inputnum_3.html");
            break;
          case 'lab01_1-1':
            include("lab01/lab01_calnum_1.php");
            break;
          case 'lab01_2-1':
            include("lab01/lab01_calnum_2.php");
            break;
          case 'lab01_3-1':
            include("lab01/lab01_calnum_3.php");
            break;
          case 'lab02_1':
            include("lab02/lab02_1.php");
            break;
          case 'lab02_2':
            include("lab02/lab02_2.php");
            break;
          case 'lab02-1':
            include("lab02.1/index.html");
            break;
          case 'lab02-2':
            include("lab02.1/show.php");
            break;
          case 'labclass':
            include("lab02/labclass.php");
            break;
          case 'myclass':
            include("lab02/myclass.php");
            break;
          case 'lab03-1':
            include("lab03-1/indexnum.php");
            break;
          case 'lab03-2':
            include("lab03-2/indexnum.php");
            break;
          case 'lab03-3':
            include("lab03-3/indexnum.php");
            break;

          case 'lab04-1':
            include("lab04-1/indexnum.php");
            break;
          case 'lab04-2':
            include("lab04-2/indexnum.php");
            break;
          case 'lab04-3':
            include("lab04-3/indexnum.php");
            break;
          case 'lab04-1-1':
            include("lab04-1/description.php");
            break;
          case 'lab04-2-1':
            include("lab04-2/description.php");
            break;
          case 'lab04-3-1':
            include("lab04-3/description.php");
            break;
          case 'lab05-1':
            include("lab05-1/lab05-1.php");
            break;

          case 'lab05-1-1':
            include("lab05-1/lab05-1-1.php");
            break;
          case 'lab05-2':
            include("lab05-2/lab05-2.php");
            break;

          case 'lab05-2-2':
            include("lab05-2/lab05-2-1.php");
            break;
          case 'lab05-2-3':
            include("lab05-2/lab05-2-2.php");
            break;
          case 'lab05-3':
            include("lab05-3/lab05-1.php");
            break;

          case 'lab06-1':
            include("lab06-1/indexnum.php");
            break;
          case 'lab06-3':
            include("lab06-2/indexnum.php");
            break;
          case 'lab06-2':
            include("lab06-3/indexnum.php");
            break;
          case 'lab07-1':
            include("lab07-1/salse.html");
            break;
          case 'salse.php':
            include("lab07-1/salse.php");
            break;
          case 'salse.html':
            include("lab07-1/salse.html");
            break;
          case 'lab07-3':
            include("lab07-3/salse-2.html");
            break;
          case 'sales-2':
            include("lab07-3/sales-2.php");
            break;
          case 'salse-2b':
            include("lab07-3/salse-2.html");
            break;
          case 'lab07-2':
            include("lab07-2/sales-3.php");
            break;
          case 'sales-3.php':
            include("lab07-2/sales-3.php");
            break;
          case 'lab08-1':
            include("lab08/grade.html");
            break;
          case 'process':
            include("lab08/process_grade.php");
            break;
          case 'lab09':
            include("lab09/forfun.php");
            break;
          case 'circle':
            include("lab09/circle.php");
            break;
          case 'Grade':
            include("lab09/Grade.php");
            break;
          case 'triangle':
            include("lab09/triangle.php");
            break;
          case 'rectangle':
            include("lab09/rectangle.php");
            break;
          case 'lab10':
            include("lab10/index.html");
            break;
          case 'calTax':
            include("lab10/calculate.php");
            break;
          case 'lab11':
            include("lab11/lab11-1.php");
            break;
          case 'abstract':
            include("constants/lab_abstract_prefix.php");
            break;
          case 'poly':
            include("AI/form.html");
            break;
          case 'processpoly':
            include("AI/process.php");
            break;
          case 'user_data':
            include("database/user.php");
            break;
          case 'evalu_data':
            include("database/evaluations.php");
            break;
          case 'userda':
            include("database/user.php");
            break;
          case 'evaluda':
            include("database/evaluations.php");
            break;
          case 'add_user':
            include("database/add_user.php");
            break;
          case 'edit':
            include("database/edit.php");
            break;
          case 'delete':
            include("database/delete.php");
            break;
          case 'ques_data':
            include("database/questions.php");
            break;
          case 'add_ques':
            include("database/add_question.php");
            break;

          case 'edit_ques':
            include("database/edit_ques.php");
            break;
          case 'delete_ques':
            include("database/delete_ques.php");
            break;
          case 'sum':
            include("sumnum/sum.php");
            break;
          case 'step1':
            include("Final/EvenOdd_Step1.php");
            break;
          case 'step2':
            include("Final/EvenOdd_Step2.php");
            break;
          case 'step3':
            include("Final/EvenOdd_Step3.php");
            break;
          case 'step4':
            include("Final/EvenOdd_Step4.php");
            break;
          case 'step3-1':
            include("Final/EvenOdd_Step3-1.php");
            break;
          case 'step5':
            include("Final/EvenOdd/index.php");
            break;
          case 'step5-1':
            include("Final/EvenOdd/calculate.php");
            break;
          default:
            echo "<h1>เมนูไม่ถูกต้อง</h1>";
            echo "กรุณาเลือกเมนูที่ถูกต้องจากเมนูด้านบน.";
            break;
        }
      } else {

        echo "<h1>คำอธิบายรายวิชา</h1>";
        echo "ศึกษาและฝึกปฏิบัติเกี่ยวกับแนวคิดการออกแบบและองค์ประกอบของการเขียนโปรแกรมเชิงวัตถุ เช่น คลาส อ๊อบเจกต์ แอตทริบิวต์ เมธอน การสืบทอดคุณสมบัติ โพลีมอร์ฟิซึม เป็นต้น ฝึกปฏิบัติการเขียนโปรแกรม เพื่อเรียกใช้งานไลบรารีฟังก์ชัน และเอพีไอของภาษา การใช้ส่วนติดต่อประสานโปรแกรมประยุกต์และการทำงานแบบการเขียนโปรแกรมเชิงเหตุการณ์
<br><hr>Study and practice about design concepts and components of Object Oriented Programming (OOP) including class, object, attributes, method, inheritance, and polymorphism. Practice in OOP to call on function library and API framework, use of application user interface, and event-driven programming.";

        echo "<h2>วัตถุประสงค์ของรายวิชา</h2>";
        echo "<ul>
        <li>เข้าใจแนวคิดพื้นฐานของการเขียนโปรแกรมเชิงวัตถุ</li>
        <li>สามารถสร้างคลาสและอ๊อบเจกต์ได้</li>
        <li>เรียนรู้การใช้แอตทริบิวต์และเมธอน</li>
      </ul>";
        echo "<img src='img/cb1b28b615147971ab740e6c48402148.jpg' alt='Programming Image' style='max-width:100%; height:auto;'>";

        echo "<p>เนื้อหาของรายวิชานี้รวมถึง <strong>การสืบทอดคุณสมบัติ</strong> และ <strong>โพลีมอร์ฟิซึม</strong> ซึ่งเป็นแนวคิดหลักใน OOP.</p>";
        echo "<h2>แหล่งเรียนรู้เพิ่มเติม</h2>";
        echo "<p>แนะนำหลักสูตรสำหรับการเขียนโปรเเกรม ที่นี่: <a href='https://www.facebook.com/IT.RMUTLL'>RMUTLL</a></p>";
      }
      ?>
    </div>
  </div>

  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Initialize Bootstrap Tooltip (ถ้าคุณต้องการใช้ Tooltip)
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
      return new bootstrap.Tooltip(tooltipTriggerEl)
    })

    // เพิ่มฟังก์ชันสำหรับ Dropdown Submenu
    document.querySelectorAll('.dropdown-submenu .dropdown-toggle').forEach(function(element) {
      element.addEventListener('click', function(e) {
        e.preventDefault();
        e.stopPropagation();
        var nextEl = this.nextElementSibling;
        if (nextEl && nextEl.classList.contains('dropdown-menu')) {
          new bootstrap.Dropdown(this).toggle();
        }
      });
    });
  </script>

  <style>
    /* เพิ่มสไตล์สำหรับ Dropdown Submenu */
    .dropdown-submenu {
      position: relative;
    }

    .dropdown-submenu>.dropdown-menu {
      top: 0;
      left: 100%;
      margin-top: -1px;
    }

    /* ปรับสไตล์เพื่อให้ Dropdown Submenu แสดงด้านขวา */
    @media (max-width: 576px) {
      .dropdown-submenu>.dropdown-menu {
        left: 0;
        top: 100%;
        margin-left: 0;
      }
    }
  </style>

</body>

</html>