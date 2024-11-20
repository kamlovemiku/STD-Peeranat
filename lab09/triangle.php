<?php
include'shape.php';
    class triangle extends shape{
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
            return 0.5 * $this->width * $this->height;
        }

        

    }

    // $triangle =  new triangle("My triangle",10,5);
    // $area = $triangle->getArea();
    // echo "The area of  the {$triangle->getName()}<br>";
    // echo "width = {$triangle->getwidth()} Unit<br>";
    // echo "height = {$triangle->getheight()} Unit<br>";
    // echo "is Area = $area Unit";

?>