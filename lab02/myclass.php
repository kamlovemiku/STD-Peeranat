<h3>การเขียนโปรเเกรมเชิงวัตถุ</h3>
<h2> พีรณัฐ </h2>
<hr>
<?php
    class Classnum {
        private $a;
        private $b;
        
        public function __construct($num_a, $num_b) {
            $this->a = $num_a;
            $this->b = $num_b;
        }
        
        public function add() {
            return $this->a + $this->b;
        }
        
        public function substract() {
            return $this->a - $this->b;
        }
        
        public function multiply() {
            return $this->a * $this->b;
        }
        
        public function divide(){
            
                return $this->a / $this->b;
            } 
            
        
    }
?>

การเรียกใช้งาน
<pre>
&lt?php
    class Classnum {
        private $a;
        private $b;
        
        public function __construct($num_a, $num_b) {
            $this->a = $num_a;
            $this->b = $num_b;
        }
        
        public function add() {
            return $this->a + $this->b;
        }
        
        public function substract() {
            return $this->a - $this->b;
        }
        
        public function multiply() {
            return $this->a * $this->b;
        }
        
        public function divide() {
            if ($this->b != 0) {
                return $this->a / $this->b;
            } else {
                return "Error: Division by zero.";
            }
        }
    }
?&gt

</pre>
<h3>เรียกใช้งาน</h3>