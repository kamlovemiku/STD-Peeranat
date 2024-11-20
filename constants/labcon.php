<?php
class MathOperation
{
    protected $number;

    public function __construct($number)
    {
        $this->number = $number;
    }

    public function calculate()
    {
        return "No calculation defined in MathOperation class.";
    }
}

class Circle extends MathOperation
{
    const PI = 3.14159;

    public function calculate()
    {
        return self::PI * pow($this ->number,2);
    }
}

$operation = new MathOperation(5);


echo $operation->calculate();
echo "<hr>";
$radius=7;
$area = new Circle($radius);
echo "สูตร = ".Circle::PI."X".$radius."X".$radius."<br>";
echo "รัศมีวงกลม =$radius หน่วย มีพื้นที่ =".number_format($area ->calculate(),2)."ตารางหน่วย"; 
?>
