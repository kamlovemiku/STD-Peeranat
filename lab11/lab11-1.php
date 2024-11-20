<?php
// คลาสแม่ MathOperation
class MathOperation
{
    protected $number;
    public function __construct($number)
    {
        $this->number = $number;
    }
    public function calculate()
    {
        return "No calculation defined in MathOperation class.";
    }
}

class Factorial extends MathOperation
{
    public function calculate()
    {
        $F = 1;
        $K = $this->number;
        while ($K > 1) {
            $F = $F * $K;
            $K = $K - 1;
        }
        return $F;
    }
}

class RecFactorial extends MathOperation
{
    public function calculate()
    {
        return $this->cal_factoral($this->number);
    }
    private function cal_factoral($N)
    {
        if ($N == 0 || $N == 1)
            return 1;
        else
            return $N * $this->cal_factoral($N - 1);
    }
}

class Square extends MathOperation
{
    public function calculate()
    {
        return $this->number * $this->number;
    }
}

class CarCal extends MathOperation
{
    public function calculate()
    {
        return pow($this->number, 2) * pi();
    }
}

// ฟังก์ชันเพื่อดึงโค้ดของคลาสที่ใช้
function get_class_code($class_name)
{
    $class_code = '';
    switch ($class_name) {
        case "Square":
            $class_code = '
class Square extends MathOperation {
    public function calculate() {
        return $this->number * $this->number;
    }
}';
            break;
        case "CarCal":
            $class_code = '
class CarCal extends MathOperation {
    public function calculate() {
        return pow($this->number, 2) * pi();
    }
}';
            break;
        case "RecFactorial":
            $class_code = '
class RecFactorial extends MathOperation {
    public function calculate() {
        return $this->cal_factoral($this->number);
    }
    private function cal_factoral($N) {
        if ($N == 0 || $N == 1)
            return 1;
        else
            return $N * $this->cal_factoral($N - 1);
    }
}';
            break;

        case "Factorial":
            $class_code = '
    class Factorial extends MathOperation
{
    public function calculate()
    {
        $F = 1;
        $K = $this->number;
        while ($K > 1) {
            $F = $F * $K;
            $K = $K - 1;
        }
        return $F;
    }
}
';
            break;
        default:
            $class_code = 'No class found.';
    }
    return $class_code;
}
?>

<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Math Operations</title>
    <!-- เชื่อมต่อ Bootstrap CSS -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Kanit', sans-serif;
        }

        .container {
            margin-top: 50px;
            max-width: 600px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .result {
            background-color: #e7f4e7;
            border: 1px solid #d4e4d4;
            padding: 15px;
            border-radius: 8px;
            margin-top: 20px;
        }

        pre {
            background-color: #272822;
            color: #f8f8f2;
            padding: 15px;
            border-radius: 8px;
            overflow-x: auto;
        }

        pre code {
            font-family: Consolas, Monaco, 'Andale Mono', 'Ubuntu Mono', monospace;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2 class="text-center mb-4">ฟอร์มการคำนวณ</h2>
        <form action="" method="POST">
            <div class="mb-3">
                <label for="num_a" class="form-label">ป้อนค่า:</label>
                <input type="number" name="num_a" class="form-control" placeholder="ป้อนค่าตัวเลข" required>
            </div>

            <div class="mb-3">
                <label for="operator" class="form-label">เลือกรูปแบบ:</label>
                <select name="op" class="form-select">
                    <option value="square">หาพื้นที่สี่เหลี่ยม</option>
                    <option value="car_cal">หาพื้นที่วงกลม</option>
                    <option value="Rec_Factorial">แฟกทอเรียล(Rec)</option>
                    <option value="Factorial">แฟกทอเรียล</option>
                </select>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">คำนวณ</button>
            </div>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $number = $_POST['num_a'];
            $operator = $_POST['op'];

            // สร้างวัตถุตามชนิดที่เลือก
            switch ($operator) {
                case "square":
                    $calculation = new Square($number);
                    break;
                case "car_cal":
                    $calculation = new CarCal($number);
                    break;
                case "Rec_Factorial":
                    $calculation = new RecFactorial($number);
                    break;
                case "Rec_Factorial":
                    $calculation = new RecFactorial($number);
                    break;
                case "Factorial":
                    $calculation = new Factorial($number);
                    break;
                default:
                    echo "Invalid operation!";
                    exit();
            }

            // แสดงผลลัพธ์
            echo "<div class='result'><h3>ผลลัพธ์ของ {$number} คือ  " . number_format($calculation->calculate(), 2) . "</h3></div>";

            // แสดงโค้ดของคลาสที่ใช้
            echo "<h4>โค้ดของคลาส:</h4>";
            echo "<pre><code>" . htmlspecialchars(get_class_code(get_class($calculation))) . "</code></pre>";
        }
        ?>
    </div>

      <!-- ส่วนแสดงโค้ดของคลาสแม่ -->
      <div class="code-container">
                <h2 class="text-center mb-4">โค้ดของคลาสแม่</h2>
                <pre><code>
class MathOperation {
    protected $number;
    public function __construct($number) {
        $this->number = $number;
    }
    public function calculate() {
        return "No calculation defined in MathOperation class.";
    }
}
                </code></pre>

    <!-- Bootstrap JS -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> -->
</body>

</html>