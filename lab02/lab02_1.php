<?php
$a=5;$b=3;
$c=$a+$b;
echo "$a + $b = $c";
echo "<hr>";
echo $a."+".$b."=".$c;
echo "<hr>";
echo $a + $b . "=". $c;
echo "<hr>";
echo $c++;
echo "<hr>";
echo ++$c;
echo "<hr>";
echo var_dump(($a + $b) >= $c);
echo "<hr>";
echo $c;
echo "<hr>";
echo "<hr>";
$a=7;
echo $a + $b . ">=". $c;
echo var_dump(($a + $b) >= $c);

?>



<h3>ฟังก์ชั่น</h3>


<?php
echo "<h4> พีรณัฐ </h4>";
function calnum($a,$op,$b){
	if($op == "+")
    	$c = $a + $b;
    elseif ($op == "-")
    	$c = $a - $b;
    elseif ($op == "*")
    	$c = $a * $b;
        elseif ($op == "/")
    	$c = $a / $b;
    elseif ($op == "%")
    	$c = $a % $b;
    elseif ($op == "\\")
    	$c = intdiv($a,$b);
    
    return $c;
}
$a=5; $b=3; 
echo "<hr>";
echo "$a + $b =" . calnum($a,"+",$b);
echo "<hr>";
echo "$a - $b =" . calnum($a,"-",$b);
echo "<hr>";
echo "$a * $b =" . calnum($a,"*",$b);
echo "<hr>";
echo "$a / $b =" . number_format(calnum($a,"/",$b),3);
echo "<hr>";
echo "5^2= " . pow(5,2);
echo "<hr>";
echo "$a % $b =".calnum($a,"%",$b);
echo "<hr>";
echo "$a \ $b = " . calnum ($a,"\\",$b);
echo "<hr>";

?>
