<?php
include'shape.php';
    class Rectangle extends shape{
        private $width;
        private $height;
        public function __construct($name,$width,$height){
            parent::__construct($name);
            $this->width = $width;
            $this->height = $height;

        }
        public function setWidth($width){
            $this->width = $width;
        }
        public function setheight($height){
            $this->width = $height;
        }
        public function getWidth(){
            return $this->width;
        }
        public function getheight(){
            return $this->height ;
        }
        public function getArea()
        {
            return $this->width * $this->height;
        }

        


            
        
    }

    // $rectangle =  new Rectangle("My Rectangle",10,5);
    // $area = $rectangle->getArea();
    // echo "The area of  the {$rectangle->getName()}<br>";
    // echo "width = {$rectangle->getwidth()} Unit<br>";
    // echo "height = {$rectangle->getheight()} Unit<br>";
    // echo "is Area = $area Unit";

?>