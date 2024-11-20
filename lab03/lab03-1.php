<!--lab03-1 -->
<h2>การหาพื้นที่สี่เหลี่ยม</h2>
<?php
    //กำหนดตัวเเปร
    $width= 10;
    $hight= 15;
    $area = $width * $hight;
    $lenght = 2 * ($width+$hight);


?>
<h3>ผลลัพธ์</h3>
<?php

echo"ความกว้าง= $width หน่วย<br>"."ความสูง= $hight หน่วย<br>"."พื้นที่ = " .$area."  ตารางหน่วย";
echo"<br><hr>";
echo"ความกว้าง= $width หน่วย<br>"."ความสูง= $hight หน่วย<br>"." เส้นรอบรูป = " .$lenght."  หน่วย";

?>


<?php
echo"<hr>";
    //กำหนดตัวเเปร
    $width= 72;
    $hight= 120;
    $area = $width * $hight;
    $lenght = 2 * ($width+$hight);


?>
<h3>ผลลัพธ์</h3>
<?php

echo"ความกว้าง= $width หน่วย<br>"."ความสูง= $hight หน่วย<br>"."พื้นที่ = " .$area."  ตารางหน่วย";
echo"<br><hr>";
echo"ความกว้าง= $width หน่วย<br>"."ความสูง= $hight หน่วย<br>"." เส้นรอบรูป = " .$lenght."  หน่วย";

?>