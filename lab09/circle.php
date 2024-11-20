<?php
include 'shape.php';

class Circle extends Shape {
    private $radius;

    public function __construct($name, $radius) {
        parent::__construct($name);
        $this->radius = $radius;
    }

    public function setRadius($radius) {
        $this->radius = $radius;
    }

    public function getRadius() {
        return $this->radius;
    }

    public function getArea() {
        return pi() * $this->radius ** 2;
    }
}

// $circle = new Circle('My Circle', 5);
// $area = $circle->getArea();

// echo "The area of the {$circle->getName()}<br>";
// echo "Radius = " . $circle->getRadius() . " unit<br>";
// echo "is Area = ".number_format($area, 2). "square units";
?>
