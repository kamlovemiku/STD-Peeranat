<!--การเขียนฟังก์ชั่น-->
<h2>การเขียนฟังก์ชั่น</h2>
<h3>หาพื้นที่ สี่เหลี่ยม</h3>
<?php
    function calrectangle($width,$highe){
        $arae = $width * $highe;
        return $arae;
    }function lenght_rectangle($width,$highe){
        $length = 2*($width + $highe);
        return $length;
    }


?>
<h3>ผลลัพธ์</h3>
<?php

echo"ความกว้าง= 10 หน่วย<br>"."ความสูง= 15 หน่วย<br>"."พื้นที่ = " .calrectangle(10,15)."  ตารางหน่วย";
echo"<br><hr>";
echo"ความกว้าง= 10 หน่วย<br>"."ความสูง= 15 หน่วย<br>"."ความยาวรอบรูป = " .lenght_rectangle(10,15)."  หน่วย";
echo"<br><hr>";
echo"ความกว้าง= 72 หน่วย<br>"."ความสูง= 120 หน่วย<br>"."พื้นที่ = " .calrectangle(72,120)."  ตารางหน่วย";
echo"<br><hr>";
echo"ความกว้าง= 72 หน่วย<br>"."ความสูง= 120 หน่วย<br>"."ความยาวรอบรูป = " .lenght_rectangle(72,120)."  หน่วย <hr>";

?>


<h3>Source-Code</h3>
<pre>
&lt?php
    function calrectangle($width,$highe){
        $arae = $width * $highe;
        return $arae;
    }function lenght_rectangle($width,$highe){
        $length = 2*($width + $highe);
        return $length;
    }


?&gt
&lth3>ผลลัพธ์&lt/h3>
&lt?php

echo"ความกว้าง= 10 หน่วย&ltbr&gt"."ความสูง= 15 หน่วย&ltbr&gt"."พื้นที่ = " .calrectangle(10,15)."  ตารางหน่วย";
echo"&ltbr&gt&lthr&gt";
echo"ความกว้าง= 10 หน่วย&ltbr&gt"."ความสูง= 15 หน่วย&ltbr&gt"."ความยาวรอบรูป = " .lenght_rectangle(10,15)."  หน่วย";
echo"&ltbr&gt&lthr&gt";
echo"ความกว้าง= 72 หน่วย&ltbr&gt"."ความสูง= 120 หน่วย&ltbr&gt"."พื้นที่ = " .calrectangle(72,120)."  ตารางหน่วย";
echo"&ltbr&gt&lthr&gt";
echo"ความกว้าง= 72 หน่วย&ltbr&gt"."ความสูง= 120 หน่วย&ltbr&gt"."ความยาวรอบรูป = " .lenght_rectangle(72,120)."  หน่วย";

?&gt




</pre>