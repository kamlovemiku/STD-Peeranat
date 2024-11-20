<?php
class EvaluationItem
{
    private $conn; // ตัวเชื่อมต่อฐานข้อมูล
    private $table_name; // ชื่อของตาราง

    public $question_text; // คำถาม
    public $id; // ID ของคำถาม

    public function __construct($db, $table)
    {
        $this->conn = $db; // กำหนดค่าตัวเชื่อมต่อฐานข้อมูล
        $this->table_name = $table; // กำหนดชื่อตาราง
    }
    // ฟังก์ชัน read() สำหรับดึงข้อมูลทั้งหมด
    public function readq() {
        $query = "SELECT * FROM " . $this->table_name; // คำสั่ง SQL
        $stmt = $this->conn->prepare($query); // เตรียมคำสั่ง SQL
        $stmt->execute(); // ดำเนินการ
        return $stmt; // คืนค่าผลลัพธ์
    }

    // ฟังก์ชันสร้างคำถามใหม่
    public function createQ()
    {
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

    public function deleteq($question_id)
{
    // ลบคำตอบที่อ้างอิงถึง question_id ใน tb_evaluations
    $deleteEvaluationsQuery = "DELETE FROM tb_evaluations WHERE question_id = :question_id";
    $stmt = $this->conn->prepare($deleteEvaluationsQuery);
    $stmt->bindParam(':question_id', $question_id);
    $stmt->execute(); // ดำเนินการลบคำตอบ

    // ลบคำถามจาก tb_questions
    $query = "DELETE FROM " . $this->table_name . " WHERE question_id = :question_id";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':question_id', $question_id);

    if ($stmt->execute()) {
        return true; // คืนค่า true หากลบสำเร็จ
    }

    // แสดงข้อผิดพลาด
    print_r($stmt->errorInfo());
    return false; // คืนค่า false หากเกิดข้อผิดพลาด
}

    /// ฟังก์ชันแก้ไขคำถาม
public function updateq()
{
    $query = "UPDATE " . $this->table_name . " SET question_text = :question_text WHERE question_id = :question_id"; // เปลี่ยน id เป็น question_id

    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':question_text', $this->question_text);
    $stmt->bindParam(':question_id', $this->id); // ใช้ question_id แทน id

    if ($stmt->execute()) {
        return true; // คืนค่า true หากแก้ไขสำเร็จ
    }

    return false; // คืนค่า false หากเกิดข้อผิดพลาด
}

}
