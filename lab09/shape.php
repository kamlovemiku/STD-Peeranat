<?php
    class shape{
            protected $name;
            public function __construct($name) {
                $this ->name = $name;
            }
         
            public function getName() { 
                return $this ->name;
            }

            public function getArea()  {
                
            }


    }

    $shape = new shape("Myshape");
    

?>