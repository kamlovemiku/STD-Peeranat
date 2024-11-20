<h2>การเขียนโปรเเกรมแบบ oop</h2>
<?php
    class Rectagle{
        private $width;
        private $hight;
        public function __construct($pwidth,$phight)
        {
            $this ->width = $pwidth;
            $this ->hight = $phight;
        }

        public function area()
        {
            return $this ->width * $this ->hight;

        }
        public function lengt()
        {
            return 2*($this ->width + $this ->hight);
        }
        public function setWidth($pwidth){
            $this ->width = $pwidth;
        }
        public function getWidth(){
            return $this ->width ;
        }
        public function setHight($phight){
            $this ->hight = $phight;
        }
        public function getHight(){
            return $this ->hight;
        }
        }

?>

<h3>ผลลัพธ์</h3>
<?php
    $rect=new Rectagle(10,5);

echo"ความกว้าง= 10 หน่วย<br>"."ความสูง= 5 หน่วย<br>"."พื้นที่ = " .$rect ->area()."  ตารางหน่วย";
echo"<br><hr>";
echo"ความกว้าง= 10 หน่วย<br>"."ความสูง= 5 หน่วย<br>"."ความยาวรอบรูป = " .$rect ->lengt()."  หน่วย";
echo"<br><hr>";

?>
<?php
    $rect ->setWidth(50);
    $rect ->setHight(200);

echo "พื้นที่ = " .$rect->getWidth() . " X ".$rect->getHight() ." = " .$rect ->area()."  ตารางหน่วย";
echo"<br>";
echo"ความยาวรอบรูป = 2 X " .$rect->getWidth() . " +  2 X ".$rect->getHight() ." = " .$rect ->lengt()."  หน่วย";
echo"<br><hr>";



    $rect ->setWidth(25.5);
    $rect ->setHight(23.5);

echo "พื้นที่ = " .$rect->getWidth() . " X ".$rect->getHight() ." = " .$rect ->area()."  ตารางหน่วย";
echo"<br>";
echo"ความยาวรอบรูป = 2 X " .$rect->getWidth() . " +  2 X ".$rect->getHight() ." = " .$rect ->lengt()."  หน่วย";
echo"<br><hr>";


?>


<h3>Source-Code</h3>

<pre>
&lt?php
    class Rectagle{
        private $width;
        private $hight;
        public function __construct($pwidth,$phight)
        {
            $this -&gtwidth = $pwidth;
            $this -&gthight = $phight;
        }

        public function area()
        {
            return $this -&gtwidth * $this -&gthight;

        }
        public function lengt()
        {
            return 2*($this -&gtwidth + $this -&gthight);
        }
        public function setWidth($pwidth){
            $this -&gtwidth = $pwidth;
        }
        public function setHight($phight){
            $this -&gthight = $phight;
        }
        }

?&gt

&lth3&gtผลลัพธ์&lt/h3&gt
&lt?php
    $rect=new Rectagle(10,5);

echo"ความกว้าง= 10 หน่วย&ltbr&gt"."ความสูง= 5 หน่วย&ltbr&gt"."พื้นที่ = " .$rect -&gtarea()."  ตารางหน่วย";
echo"&ltbr&gt&lthr&gt";
echo"ความกว้าง= 10 หน่วย&ltbr&gt"."ความสูง= 5 หน่วย&ltbr&gt"."ความยาวรอบรูป = " .$rect -&gtlengt()."  หน่วย";
echo"&ltbr&gt&lthr&gt";

?&gt
&lt?php
    $rect -&gtsetWidth(72);
    $rect -&gtsetHight(100);

echo"ความกว้าง= 72 หน่วย&ltbr&gt"."ความสูง= 100 หน่วย&ltbr&gt"."พื้นที่ = " .$rect -&gtarea()."  ตารางหน่วย";
echo"&ltbr&gt&lthr&gt";
echo"ความกว้าง= 72 หน่วย&ltbr&gt"."ความสูง= 100 หน่วย&ltbr&gt"."ความยาวรอบรูป = " .$rect -&gtlengt()."  หน่วย";
echo"&ltbr&gt&lthr&gt";

?&gt
</pre>