.
  1.การรับค่าจากฟอร์ม: โดยใช้ $_POST เพื่อรับค่า num_a และ num_b ที่ถูกส่งมาจากฟอร์มที่ผู้ใช้กรอกข้อมูลเข้ามาในฟิลด์ input ชนิด number
  2.การสร้างคลาส Calculator: ใช้คลาสเพื่อจัดการข้อมูลและการคำนวณ เก็บค่า $a และ $b ที่รับเข้ามาผ่าน constructor และมีเมทอด add() 
  เพื่อทำการบวกค่า $a กับ $b และคืนค่าผลลัพธ์กลับ
  3.การสร้างอ็อบเจ็กต์ของคลาส: เมื่อได้รับค่า $num_a และ $num_b จากฟอร์มแล้ว จะสร้างอ็อบเจ็กต์ของคลาส Calculator เพื่อเรียกใช้เมทอด add() 
  เพื่อคำนวณผลรวมของ $num_a และ $num_b
  4.การแสดงผลลัพธ์: ผลลัพธ์ที่ได้จากการคำนวณของ add() จะถูกแสดงผ่าน HTML โดยใช้ echo เพื่อแสดงข้อความ "ผลรวมของ X และ Y คือ:" พร้อมกับค่าผลลัพธ์ $sum

  ประโยชน์
  1.โค้ดที่สะดวกในการบำรุงรักษา: การแยกการคำนวณลอจิกและการแสดงผลออกจากกันทำให้ง่ายต่อการเปลี่ยนแปลงและการบำรุงรักษา 
  โดยไม่ต้องแก้ไขส่วนที่ทำการคำนวณเมื่อต้องการปรับปรุงหรือเพิ่มฟังก์ชันใหม่
  2.การทำงานเชิงวัตถุ: การใช้คลาส Calculator ช่วยให้โค้ดมีโครงสร้างที่ชัดเจนและสามารถนำไปใช้ซ้ำในส่วนต่าง ๆ ของโปรแกรมได้
  3.การคำนวณที่ถูกต้องและปลอดภัย: การใช้ฟังก์ชันแบบวัตถุช่วยลดความผิดพลาดในการคำนวณและช่วยในการจัดการข้อมูลให้อยู่ในขอบเขตที่ต้องการ

