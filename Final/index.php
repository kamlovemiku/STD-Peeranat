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
  display: none; /* เริ่มต้นซ่อนเมนูย่อย */
}

.dropdown-submenu:hover .dropdown-menu {
  display: block; /* แสดงเมนูย่อยเมื่อเลื่อนเมาส์ไปที่เมนูหลัก */
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

          case 'step1':
            include("EvenOdd_Step1.php");
            break;
          case 'step2':
            include("EvenOdd_Step2.php");
            break;
          case 'step3':
            include("EvenOdd_Step3.php");
            break;
          case 'step4':
            include("EvenOdd_Step4.php");
            break;
          case 'step3-1':
            include("EvenOdd_Step3-1.php");
            break;
            case 'step5':
                include("EvenOdd/index.php");
                break;
                case 'step5-1':
                    include("EvenOdd/calculate.php");
                    break;
          
          
        }
      } else{
        echo "<h1>สอบ Final</h1>";
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