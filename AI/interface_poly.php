<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shape Area Calculation</title>
    <!-- Bootstrap 5 CSS -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <!-- Bootstrap Icons -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet"> -->
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Shape Area Calculation</h1>

        <div class="row">
            <div class="col-md-6 offset-md-3">

                <!-- ฟอร์มสำหรับกรอกข้อมูลรูปทรง -->
                <form action="" method="POST" class="mb-4">
                    <h4>Triangle</h4>
                    <div class="mb-3">
                        <label for="triangleBase" class="form-label">Base</label>
                        <input type="number" name="triangleBase" class="form-control" required 
                        value="<?php echo isset($_POST['triangleBase']) ? $_POST['triangleBase'] : ''; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="triangleHeight" class="form-label">Height</label>
                        <input type="number" name="triangleHeight" class="form-control" required 
                        value="<?php echo isset($_POST['triangleHeight']) ? $_POST['triangleHeight'] : ''; ?>">
                    </div>

                    <h4>Rectangle</h4>
                    <div class="mb-3">
                        <label for="rectangleWidth" class="form-label">Width</label>
                        <input type="number" name="rectangleWidth" class="form-control" required 
                        value="<?php echo isset($_POST['rectangleWidth']) ? $_POST['rectangleWidth'] : ''; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="rectangleHeight" class="form-label">Height</label>
                        <input type="number" name="rectangleHeight" class="form-control" required 
                        value="<?php echo isset($_POST['rectangleHeight']) ? $_POST['rectangleHeight'] : ''; ?>">
                    </div>

                    <h4>Circle</h4>
                    <div class="mb-3">
                        <label for="circleRadius" class="form-label">Radius</label>
                        <input type="number" name="circleRadius" class="form-control" required 
                        value="<?php echo isset($_POST['circleRadius']) ? $_POST['circleRadius'] : ''; ?>">
                    </div>

                    <button type="submit" class="btn btn-primary">Calculate Area</button>
                </form>

                <!-- ตารางแสดงผล -->
                <table class="table table-bordered table-hover text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>Class</th>
                            <th>Area</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        interface Shape
                        {
                            public function area();  // ฟังก์ชันที่ต้องการคำนวณพื้นที่
                        }

                        class Triangle implements Shape {
                            private $base;
                            private $height;

                            public function __construct($base, $height)
                            {
                                $this->base = $base;
                                $this->height = $height;
                            }

                            public function area()
                            {
                                return 0.5 * $this->base * $this->height;
                            }
                        }

                        class Rectangle implements Shape {
                            private $width;
                            private $height;

                            public function __construct($width, $height)
                            {
                                $this->width = $width;
                                $this->height = $height;
                            }

                            public function area()
                            {
                                return $this->width * $this->height;
                            }
                        }

                        class Circle implements Shape {
                            private $radius;

                            public function __construct($radius)
                            {
                                $this->radius = $radius;
                            }

                            public function area()
                            {
                                return pi() * pow($this->radius, 2);
                            }
                        }

                        function printArea(Shape $shape)
                        {
                            // ตรวจสอบว่าคลาสเป็นรูปทรงใดและเพิ่มไอคอนที่เหมาะสม
                            $icon = "";
                            if (get_class($shape) == "Triangle") {
                                $icon = '<i class="bi bi-triangle"></i>';
                            } elseif (get_class($shape) == "Rectangle") {
                                $icon = '<i class="bi bi-square"></i>';
                            } elseif (get_class($shape) == "Circle") {
                                $icon = '<i class="bi bi-circle"></i>';
                            }

                            // แสดงข้อมูลรูปทรงในตาราง พร้อมไอคอน
                            echo "<tr>";
                            echo "<td>" . $icon . " " . get_class($shape) . "</td>";
                            echo "<td>" . number_format($shape->area(), 2) . "</td>";
                            echo "</tr>";
                        }

                        // ตรวจสอบว่ามีข้อมูลที่ส่งจากฟอร์มหรือไม่
                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                            // รับค่าและคำนวณพื้นที่จากฟอร์ม
                            $triangleBase = $_POST['triangleBase'];
                            $triangleHeight = $_POST['triangleHeight'];
                            $rectangleWidth = $_POST['rectangleWidth'];
                            $rectangleHeight = $_POST['rectangleHeight'];
                            $circleRadius = $_POST['circleRadius'];

                            // สร้างออบเจ็กต์รูปทรงต่างๆ
                            $triangle = new Triangle($triangleBase, $triangleHeight);
                            $rectangle = new Rectangle($rectangleWidth, $rectangleHeight);
                            $circle = new Circle($circleRadius);

                            // แสดงผลชื่อคลาสและพื้นที่ของรูปทรงแต่ละชนิด
                            printArea($triangle);   // พื้นที่ของสามเหลี่ยม
                            printArea($rectangle);  // พื้นที่ของสี่เหลี่ยมผืนผ้า
                            printArea($circle);     // พื้นที่ของวงกลม
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS (Optional, for interactive features) -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script> -->
</body>
</html>
