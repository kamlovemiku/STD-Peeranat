<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ผลลัพธ์การคำนวณภาษี</title>
    <!-- Bootstrap CSS -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <style>
        body {
            background-color: #f8f9fa; /* สีพื้นหลังอ่อนๆ */
            font-family: 'Kanit', sans-serif; /* ฟอนต์ที่ใช้ */
        }

        .container {
            margin-top: 50px; /* ระยะห่างจากด้านบน */
            max-width: 800px; /* ความกว้างสูงสุดของฟอร์ม */
        }

        .result-card {
            background-color: #ffffff; /* สีพื้นหลังของการ์ด */
            border: 1px solid #dee2e6; /* กรอบการ์ด */
            border-radius: 0.375rem; /* มุมของการ์ดกลม */
            padding: 1.5rem; /* การเว้นระยะภายในการ์ด */
        }

        .result-card h2 {
            color: #198754; /* สีหัวข้อ */
        }

        .result-card p {
            font-size: 1.2rem; /* ขนาดฟอนต์ของข้อความ */
        }

        .code-section {
            background-color: #f1f1f1;
            padding: 1rem;
            border-radius: 0.375rem;
            overflow-x: auto;
        }
    </style>
</head>
<body>

    <div class="container">
        <?php
        require_once 'TaxCalculator.php'; // รวมคลาส TaxCalculator ซึ่งรวมคลาส Employee อยู่แล้ว

        // เก็บโค้ดของคลาส TaxCalculator ลงในตัวแปร $Showcode
        $Showcode = <<<'EOD'
<?php
// TaxCalculator.php
require_once 'Employee.php';

class TaxCalculator extends Employee {

    // Constructor inheriting from Employee
    public function __construct($name, $salary) {
        parent::__construct($name, $salary);
    }

    // Method to calculate monthly tax
    public function calculateMonthlyTax() {
        return $this->salary * 0.07;
    }

    // Method to calculate yearly income
    public function calculateYearlyIncome() {
        return $this->salary * 12;
    }

    // Method to calculate yearly tax
    public function calculateYearlyTax() {
        $yearlyIncome = $this->calculateYearlyIncome();
        return $yearlyIncome * 0.07;
    }

    // Method to calculate net income
    public function calculateNetIncome() {
        $yearlyIncome = $this->calculateYearlyIncome();
        $yearlyTax = $this->calculateYearlyTax();
        return $yearlyIncome - $yearlyTax;
    }
}
?>
EOD;

        // ตรวจสอบถ้าเป็นการส่งฟอร์ม
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // รับค่าจากฟอร์ม
            $name = htmlspecialchars($_POST['name']);
            $salary = floatval($_POST['salary']);

            // สร้างอินสแตนซ์ของ TaxCalculator
            $taxCalculator = new TaxCalculator($name, $salary);

            // คำนวณค่า
            $monthlyTax = $taxCalculator->calculateMonthlyTax();
            $yearlyIncome = $taxCalculator->calculateYearlyIncome();
            $yearlyTax = $taxCalculator->calculateYearlyTax();
            $netIncome = $taxCalculator->calculateNetIncome();

            // ฟอร์แมตค่า
            $formattedMonthlyTax = number_format($monthlyTax, 2);
            $formattedYearlyIncome = number_format($yearlyIncome, 2);
            $formattedYearlyTax = number_format($yearlyTax, 2);
            $formattedNetIncome = number_format($netIncome, 2);

            // แสดงผลลัพธ์
            echo '<div class="result-card">';
            echo '<h2>ผลลัพธ์</h2>';
            echo '<p><strong>ชื่อ:</strong> ' . $taxCalculator->getName() . '</p>';
            echo '<p><strong>เงินเดือน:</strong> ' . number_format($taxCalculator->getSalary(), 2) . '</p>';
            echo '<p><strong>ภาษีต่อเดือน:</strong> ' . $formattedMonthlyTax . '</p>';
            echo '<p><strong>รายได้ต่อปี:</strong> ' . $formattedYearlyIncome . '</p>';
            echo '<p><strong>ภาษีต่อปี:</strong> ' . $formattedYearlyTax . '</p>';
            echo '<p><strong>สุทธิ:</strong> ' . $formattedNetIncome . '</p>';
            echo '</div>';
        } else {
            echo '<div class="alert alert-warning" role="alert">กรุณากรอกข้อมูลในฟอร์ม</div>';
        }
        ?>
        <a href="?p=lab10" class="btn btn-primary">กลับ</a>
        <div class="col-md-8 mb-3 mt-3">
            <div class="code-section">
                <h5>Code:</h5>
                <pre><code class="php"><?php echo htmlspecialchars($Showcode); ?></code></pre>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script> -->
</body>
</html>
