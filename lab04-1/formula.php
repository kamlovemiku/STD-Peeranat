<?php
class classnum {
    private $a;
    
    public function __construct($num_a,) {
        $this->a = $num_a;
    } // construct
    
    public function area() {
        return (3.14)*($this->a)*($this->a) ;
    } // area
    
    public function line() { 
        return (2)*(3.14)*($this->a);
    } //line
    
  
} // จบ class
?>
