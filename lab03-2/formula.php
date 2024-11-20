.
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $a = floatval($_POST['num_a']);
            $b = floatval($_POST['num_b']);
            $op = $_POST['op']; 
            $d = '';
            $e = '';
            $f = '';
            $g = '';
            $h = '';

            if ($op=="rectangle") {
                $c = $a*$b;
                $d = "*";
            }else if ($op== "square") {
                $c = ($a*2)+($b*2);
                $d = "+";
                $e = "2";
                $f = "*";
                $g = "(";
                $h = ")";
            }

            echo "$g $a $f $e $h $d $g $b $f $e $h = " .$c; 
        }
    ?>