<?php
// สร้าง Interface สำหรับตรวจสอบเลขคู่และเลขคี่
interface EvenOddInterface {
    public function checkEvenOdd();
    public function getSum(); // ฟังก์ชันสำหรับหาผลรวม
}

// คลาสแม่ NumberChecker ที่ implements Interface
class NumberChecker implements EvenOddInterface {
    protected $number;
    protected $sum = 0;

    public function __construct($number) {
        $this->number = $number;
    }

    // เมธอดจาก Interface เพื่อเช็คเลขคู่หรือเลขคี่
    public function checkEvenOdd() {
        return "No check defined.";
    }

    // เมธอดจาก Interface เพื่อหาผลรวม
    public function getSum() {
        return $this->sum;
    }
}

// คลาสลูก EvenOddChecker ที่สืบทอดจาก NumberChecker
class EvenOddChecker extends NumberChecker {

    // เขียนทับเมธอดเพื่อเช็คเลขคู่หรือเลขคี่
    public function checkEvenOdd() {
        if ($this->number % 2 == 0) {
            return "$this->number เป็นเลขคู่";
        } else {
            return "$this->number เป็นเลขคี่";
        }
    }

    // เขียนทับเมธอดเพื่อหาผลรวม
    public function getSum() {
        $this->sum = 0;
        for ($i = 1; $i <= $this->number; $i++) {
            $this->sum += $i;
        }
        return "ผลรวมของเลขตั้งแต่ 1 ถึง $this->number คือ: $this->sum";
    }
}

// รับค่าจากผู้ใช้
$limit = 10; // ตัวอย่างค่าที่รับจากผู้ใช้

echo "ผลลัพธ์ของเลขตั้งแต่ 1 ถึง $limit: <br>";

for ($i = 1; $i <= $limit; $i++) {
    $checker = new EvenOddChecker($i);
    echo $checker->checkEvenOdd() . "<br>";
}

// สร้างออบเจ็กต์เพื่อหาผลรวม
$checker = new EvenOddChecker($limit);
echo $checker->getSum(); // แสดงผลรวม
?>
