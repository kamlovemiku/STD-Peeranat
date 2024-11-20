<?php
class classnum {
    private $a;
    private $b;
    
    public function __construct($num_a, $num_b) {
        $this->a = $num_a;
        $this->b = $num_b;
    } // construct
    
    public function rectangle() {
        return $this->a * $this->b;
    } // add
    
    public function square() { 
        return ($this->a*2) + ($this->b*2);
    } // subtract
    
  
} // จบ class
?>
