<?php


// สร้าง Interface สำหรับตรวจสอบเลขคู่และเลขคี่
interface EvenOddInterface {
    public function checkEvenOdd();
    public function getSum(); // ฟังก์ชันสำหรับหาผลรวม
    public function getEvenSum(); // ฟังก์ชันสำหรับหาผลรวมเลขคู่
    public function getOddSum(); // ฟังก์ชันสำหรับหาผลรวมเลขคี่
}

// คลาสแม่ NumberChecker ที่ implements Interface
class NumberChecker implements EvenOddInterface {
    protected $number;
    protected $sum = 0;
    protected $evenSum = 0;
    protected $oddSum = 0;

    public function __construct($number) {
        $this->number = $number;
    }

    public function checkEvenOdd() {
        return "No check defined.";
    }

    public function getSum() {
        return $this->sum;
    }

    public function getEvenSum() {
        return $this->evenSum;
    }

    public function getOddSum() {
        return $this->oddSum;
    }
}

// คลาสลูก EvenOddChecker ที่สืบทอดจาก NumberChecker
class EvenOddChecker extends NumberChecker {

    public function checkEvenOdd() {
        if ($this->number % 2 == 0) {
            return "$this->number เป็นเลขคู่";
        } else {
            return "$this->number เป็นเลขคี่";
        }
    }

    public function getSum() {
        $this->sum = 0;
        for ($i = 1; $i <= $this->number; $i++) {
            $this->sum += $i;
        }
        return "ผลรวมของเลขตั้งแต่ 1 ถึง $this->number คือ: $this->sum";
    }

    public function getEvenSum() {
        $this->evenSum = 0;
        for ($i = 1; $i <= $this->number; $i++) {
            if ($i % 2 == 0) {
                $this->evenSum += $i;
            }
        }
        return "ผลรวมของเลขคู่ตั้งแต่ 1 ถึง $this->number คือ: $this->evenSum";
    }

    public function getOddSum() {
        $this->oddSum = 0;
        for ($i = 1; $i <= $this->number; $i++) {
            if ($i % 2 != 0) {
                $this->oddSum += $i;
            }
        }
        return "ผลรวมของเลขคี่ตั้งแต่ 1 ถึง $this->number คือ: $this->oddSum";
    }
}




if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // รับค่าจากผู้ใช้
    $limit = $_POST['limit']; // รับค่าจากฟอร์ม

    // ตรวจสอบว่าค่าที่รับมาถูกต้องหรือไม่
    if (is_numeric($limit) && $limit > 0) {
        echo "<h2>ผลลัพธ์ของเลขตั้งแต่ 1 ถึง $limit:</h2><br>";

        // แสดงผลเลขคู่และเลขคี่
        for ($i = 1; $i <= $limit; $i++) {
            $checker = new EvenOddChecker($i);
            echo $checker->checkEvenOdd() . "<br>";
        }

        // สร้างออบเจ็กต์เพื่อหาผลรวม
        $checker = new EvenOddChecker($limit);
        echo "<h2>ผลรวมเลขทั้งหมด</h2><br>";
        echo $checker->getSum() . "<br><hr>";
        echo "<h2>ผลรวมเลขคี่</h2><br>";
        echo $checker->getOddSum() . "<br><hr>";
        echo "<h2>ผลรวมเลขคู่</h2><br>";
        echo $checker->getEvenSum() . "<br><hr>";
    } else {
        echo "<p>กรุณากรอกค่าที่เป็นตัวเลขและมากกว่า 0</p>";
    }
}
?>
