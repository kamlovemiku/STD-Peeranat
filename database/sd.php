<?php
class EvaluationItem {
    private $conn; // ตัวเชื่อมต่อฐานข้อมูล
    private $table_name; // ชื่อของตาราง

    public $code; // รหัส
    public $Fname; // ชื่อ
    public $Lname; // นามสกุล
    public $question_text; // คำถาม

    public function __construct($db, $table) {
        $this->conn = $db; // กำหนดค่าตัวเชื่อมต่อฐานข้อมูล
        $this->table_name = $table; // กำหนดชื่อตาราง
    }

    // ฟังก์ชัน read() สำหรับดึงข้อมูลทั้งหมด
    public function read() {
        $query = "SELECT * FROM " . $this->table_name; // คำสั่ง SQL
        $stmt = $this->conn->prepare($query); // เตรียมคำสั่ง SQL
        $stmt->execute(); // ดำเนินการ
        return $stmt; // คืนค่าผลลัพธ์
    }

    // ฟังก์ชัน create() สำหรับเพิ่มข้อมูลใหม่
    public function create() {
        // คำสั่ง SQL สำหรับการเพิ่มข้อมูล
        $query = "INSERT INTO " . $this->table_name . " (code, Fname, Lname) VALUES (:code, :Fname, :Lname)";

        // เตรียมคำสั่ง SQL
        $stmt = $this->conn->prepare($query);

        // ผูกค่ากับพารามิเตอร์ใน SQL
        $stmt->bindParam(':code', $this->code);
        $stmt->bindParam(':Fname', $this->Fname);
        $stmt->bindParam(':Lname', $this->Lname);

        // ดำเนินการเพิ่มข้อมูล
        if ($stmt->execute()) {
            return true; // คืนค่า true หากเพิ่มสำเร็จ
        }

        return false; // คืนค่า false หากเกิดข้อผิดพลาด
    }

    // ฟังก์ชัน update() สำหรับแก้ไขข้อมูล
    public function update($id) {
        $query = "UPDATE " . $this->table_name . " SET code = :code, Fname = :Fname, Lname = :Lname WHERE id = :id";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':code', $this->code);
        $stmt->bindParam(':Fname', $this->Fname);
        $stmt->bindParam(':Lname', $this->Lname);
        $stmt->bindParam(':id', $id); // รับ id ของข้อมูลที่ต้องการแก้ไข

        if ($stmt->execute()) {
            return true; // คืนค่า true หากแก้ไขสำเร็จ
        }

        return false; // คืนค่า false หากเกิดข้อผิดพลาด
    }

    // ฟังก์ชัน delete() สำหรับลบข้อมูล
    public function delete($id) {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id); // รับ id ของข้อมูลที่ต้องการลบ

        if ($stmt->execute()) {
            return true; // คืนค่า true หากลบสำเร็จ
        }

        return false; // คืนค่า false หากเกิดข้อผิดพลาด
    }

    // ฟังก์ชัน createQ() สำหรับเพิ่มคำถาม
    public function createQ() {
        // คำสั่ง SQL สำหรับการเพิ่มคำถาม
        $query = "INSERT INTO " . $this->table_name . " (question_text) VALUES (:question_text)";
    
        // เตรียมคำสั่ง SQL
        $stmt = $this->conn->prepare($query);
    
        // ผูกค่ากับพารามิเตอร์ใน SQL
        $stmt->bindParam(':question_text', $this->question_text);
    
        // ดำเนินการเพิ่มข้อมูล
        if ($stmt->execute()) {
            return true; // คืนค่า true หากเพิ่มสำเร็จ
        }
    
        return false; // คืนค่า false หากเกิดข้อผิดพลาด
    }

    
}
?>
