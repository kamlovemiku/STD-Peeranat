<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>lab01_calnum</title>
</head>
<style>
    
    
</style>
<body>
    lab01_num.php <hr>
    <?php //
        $a=5;
        $b=3;
        $c=$a+$b;
            echo "create by peeranat";
            echo "<br>";
            echo "$a + $b" . " = " . $c ."<br>";
            echo "100 + 75 = ? <br>";
            $a=100; $b=75; $c=$a+$b;
            echo " $a + $b " . " = " .$c;

    ?><!-- -->
    <hr>
    เขียนฟังก์ชั้น  calnumber(a,b)
        <?php
            function calnumber($a,$b){
                $c=$a+$b;
                return $c;
            }       
                echo "การเรียกใช้ฟังก์ชัน" . "<br>";
                $a=5;$b=3;
                echo "$a + $b" . " = " . calnumber($a,$b)."<br>";
                
                echo "100 + 75 = ? <br>";
                echo "100 + 75" . " = " . calnumber(100,75);
        ?>
    <!-- การเขียนโปรแกรมแบบ object -->
     <?php
            echo "<hr>การเขียนโปรแกรม OOP classnum(a,b)<br>"  ; 
            class classnum {
                private $a;
                private $b;
                public function __construct($pa,$pb)
                {
                    $this->a=$pa;
                    $this->b=$pb;

                }
                public function add(){
                    return $this->a + $this->b;
                }
            }//จบclass
            echo "เรียกใช้ classnum<br>";
            $a= 5;$b= 3;
            $ob_c= new classnum($a,$b);
            $c = $ob_c->add();
            echo "$a + $b =" . $c."<br>";

            echo "100 + 75 = ?<br>";
            $ob_d = new classnum(100,75);
            echo"100 + 75 = " . $ob_d->add();
     ?>
</body>
</html>