

<?php
include("myclass.php");
	$a=5;
    $b=3;
    $ob_c = new Classnum($a,$b);
    $c = $ob_c->add();
    echo "$a + $b = " . $ob_c->add();
    echo "<hr>";
    echo "$a - $b = " . $ob_c->substract();
    echo "<hr>";
    echo "$a * $b = " . $ob_c->multiply();
    echo "<hr>";
    echo "$a / $b = " . number_format($ob_c->divide(),2);
    echo "<hr>";

?>



<pre>  

&lt?php
include("myclass.php");

	$a=5;

    $b=3;

    $ob_c = new Classnum($a,$b);

    $c = $ob_c->add();

echo "$a + $b = " . $ob_c->add();

echo "&lthr&gt";

echo "$a - $b = " . $ob_c->substract();

echo "&lthr&gt";

echo "$a * $b = " . $ob_c->multiply();

echo "&lthr&gt";

echo "$a / $b = " . number_format($ob_c->divide(),2);

echo "&lthr&gt";


?&gt



</pre>