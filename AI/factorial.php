<?php
class FactorialCalculator {
    private $n; // ตัวแปรเพื่อเก็บค่า n

    // เมธอดสำหรับกำหนดค่า n
    public function setNumber($number) {
        if ($number < 0) {
            throw new InvalidArgumentException("Please enter a positive integer.");
        }
        $this->n = $number;
    }

    // เมธอดสำหรับคำนวณแฟกทอเรียล
    public function calculate() {
        $fact = 1; // กำหนดค่าเริ่มต้นของ fact
        for ($i = 1; $i <= $this->n; $i++) {
            $fact *= $i; // คูณค่าปัจจุบันของ fact กับ i
        }
        return $fact; // ส่งค่าผลลัพธ์กลับ
    }

    // เมธอดสำหรับแสดงผลลัพธ์
    public function displayResult() {
        $result = $this->calculate(); // คำนวณแฟกทอเรียล
        return "The factorial of {$this->n} is: $result"; // ส่งค่าผลลัพธ์กลับ
    }
}

// การใช้งาน
$resultMessage = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $calculator = new FactorialCalculator(); // สร้างอ็อบเจ็กต์ของ FactorialCalculator
        $n = (int)$_POST['number']; // รับค่าจากผู้ใช้

        $calculator->setNumber($n); // ตั้งค่า n
        $resultMessage = $calculator->displayResult(); // เก็บผลลัพธ์
    } catch (InvalidArgumentException $e) {
        $resultMessage = $e->getMessage(); // เก็บข้อความผิดพลาด
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factorial Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 20px;
        }
        h1 {
            color: #333;
        }
        .container {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }
        .form-container {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            flex: 1;
            margin-right: 20px;
        }
        .result-container {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            flex: 1;
        }
        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #218838;
        }
        .result {
            font-size: 18px;
            color: #333;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h1>Factorial Calculator</h1>
    <div class="container">
        <div class="form-container">
            <form method="post" action="">
                <label for="number">Enter a positive integer:</label>
                <input type="number" id="number" name="number" required>
                <input type="submit" value="Calculate">
            </form>
        </div>
        <div class="result-container">
            <?php if ($resultMessage): ?>
                <div class="result"><?php echo $resultMessage; ?></div>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
