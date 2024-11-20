<?php
class classnum {
    private $a;
    private $b;
    
    public function __construct($num_a, $num_b) {
        $this->a = $num_a;
        $this->b = $num_b;
    } // construct
    
    public function add() {
        return $this->a + $this->b;
    } // add
    
    public function substract() { 
        return $this->a - $this->b;
    } // substract
    
    public function multiplication() { 
        return $this->a * $this->b;
    } // multiplication
    
    public function division() { 
        return $this->a / $this->b;
    } // division
    
    public function exponent() { 
        return pow($this->a,$this->b);
    } // exponent

    public function fractional() { 
        return $this->a % $this->b;
    } // fractional

    public function Part() { 
        return floor($this->a / $this->b);
    } // Part
} // จบ class
?>
