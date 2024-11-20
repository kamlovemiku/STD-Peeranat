<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Grade Form</title>
    <!-- Bootstrap CSS -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .modal-content {
            background-color: #f1f1f1;
        }

        .modal-header {
            background-color: #007bff;
            color: #ffffff;
        }

        .modal-body {
            font-family: monospace;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }

        pre code {
            display: block;
            padding: 10px;
            background: #f8f9fa;
            border-radius: 5px;
        }

        .form-control:disabled {
            background-color: #e9ecef;
            opacity: 1;
        }
    </style>
</head>

<body>
    <?php
    // Include necessary class definitions
    include 'lab09/shape.php';

    // Define abstract Shape class if not already defined in shape.php
    if (!class_exists('Shape')) {
        abstract class Shape
        {
            protected $name;

            public function __construct($name)
            {
                $this->name = $name;
            }

            public function getName()
            {
                return $this->name;
            }

            abstract public function getArea();
        }
    }

    // Define Circle class
    class Circle extends Shape
    {
        private $radius;

        public function __construct($name, $radius)
        {
            parent::__construct($name);
            $this->radius = $radius;
        }

        public function setRadius($radius)
        {
            $this->radius = $radius;
        }

        public function getRadius()
        {
            return $this->radius;
        }

        public function getArea()
        {
            return pi() * pow($this->radius, 2);
        }
    }

    // Define Rectangle class
    class Rectangle extends Shape
    {
        private $width;
        private $height;

        public function __construct($name, $width, $height)
        {
            parent::__construct($name);
            $this->width = $width;
            $this->height = $height;
        }

        public function setWidth($width)
        {
            $this->width = $width;
        }

        public function setHeight($height)
        {
            $this->height = $height;
        }

        public function getWidth()
        {
            return $this->width;
        }

        public function getHeight()
        {
            return $this->height;
        }

        public function getArea()
        {
            return $this->width * $this->height;
        }
    }

    // Define Triangle class
    class Triangle extends Shape
    {
        private $width;
        private $height;

        public function __construct($name, $width, $height)
        {
            parent::__construct($name);
            $this->width = $width;
            $this->height = $height;
        }

        public function setWidth($width)
        {
            $this->width = $width;
        }

        public function setHeight($height)
        {
            $this->height = $height;
        }

        public function getWidth()
        {
            return $this->width;
        }

        public function getHeight()
        {
            return $this->height;
        }

        public function getArea()
        {
            return 0.5 * $this->width * $this->height;
        }
    }

    // Define GradeCalculator class
    class GradeCalculator
    {
        public static function calculateGrade($score)
        {
            if ($score >= 90) {
                return 'A';
            } elseif ($score >= 80) {
                return 'B';
            } elseif ($score >= 70) {
                return 'C';
            } elseif ($score >= 60) {
                return 'D';
            } else {
                return 'F';
            }
        }
    }

    // Instantiate shape objects and calculate areas
    $circle = new Circle('My Circle', 5);
    $areaCircle = $circle->getArea();

    $triangle = new Triangle("My Triangle", 10, 5);
    $areaTriangle = $triangle->getArea();

    $rectangle = new Rectangle("My Rectangle", 10, 5);
    $areaRectangle = $rectangle->getArea();

    // Calculate grade
    $score = 85;
    $grade = GradeCalculator::calculateGrade($score);

    // Read the contents of the files and escape HTML characters
    $circleCode = file_exists('lab09/circle.php') ? htmlspecialchars(file_get_contents('lab09/circle.php')) : 'File not found';
    $triangleCode = file_exists('lab09/triangle.php') ? htmlspecialchars(file_get_contents('lab09/triangle.php')) : 'File not found';
    $gradeCode = file_exists('lab09/Grade.php') ? htmlspecialchars(file_get_contents('lab09/Grade.php')) : 'File not found';
    $rectangleCode = file_exists('lab09/rectangle.php') ? htmlspecialchars(file_get_contents('lab09/rectangle.php')) : 'File not found';
    $shapeCode = file_exists('lab09/shape.php') ? htmlspecialchars(file_get_contents('lab09/shape.php')) : 'File not found';
    ?>

    <div class="container mt-5">
        <h2 class="text-center mb-4">แบบฟอร์มแสดงการสืบทอด Class</h2>

        <div class="row mb-4">
            <!-- Shape Information Section -->
            <div class="col-md-6 mb-3">
                <!-- Circle -->
                <div class="mb-4">
                    <label for="circle" class="form-label">วงกลม</label>
                    <input type="text" class="form-control" id="circle" name="circle" required
                        value="<?php echo htmlspecialchars($circle->getName() . ' - Area: ' . number_format($areaCircle, 2)); ?>"
                        disabled>
                    <button type="button" class="btn btn-primary w-100 mt-2" data-bs-toggle="modal"
                        data-bs-target="#myModalC">
                        Show Circle Code
                    </button>
                </div>

                <!-- Triangle -->
                <div class="mb-4">
                    <label for="triangle" class="form-label">สามเหลี่ยม</label>
                    <input type="text" class="form-control" id="triangle" name="triangle" required
                        value="<?php echo htmlspecialchars($triangle->getName() . ' - Area: ' . number_format($areaTriangle, 2)); ?>"
                        disabled>
                    <button type="button" class="btn btn-primary w-100 mt-2" data-bs-toggle="modal"
                        data-bs-target="#myModalT">
                        Show Triangle Code
                    </button>
                </div>

                <!-- Rectangle -->
                <div class="mb-4">
                    <label for="rectangle" class="form-label">สี่เหลี่ยม</label>
                    <input type="text" class="form-control" id="rectangle" name="rectangle" required
                        value="<?php echo htmlspecialchars($rectangle->getName() . ' - Area: ' . number_format($areaRectangle, 2)); ?>"
                        disabled>
                    <button type="button" class="btn btn-primary w-100 mt-2" data-bs-toggle="modal"
                        data-bs-target="#myModalR">
                        Show Rectangle Code
                    </button>
                </div>

                <!-- Grade -->
                <div class="mb-4">
                    <label for="grade" class="form-label">Grade</label>
                    <input type="text" class="form-control" id="grade" name="grade" required
                        value="<?php echo htmlspecialchars('Score: ' . $score . ' - Grade: ' . $grade); ?>" disabled>
                    <button type="button" class="btn btn-primary w-100 mt-2" data-bs-toggle="modal"
                        data-bs-target="#myModalG">
                        Show Grade Code
                    </button>
                </div>
            </div>

            <!-- Code Display Section -->
            <div class="col-md-6 mb-3">
                <div class="code-section">
                    <h5>Code from shape.php:</h5>
                    <pre><code class="php"><?php echo $shapeCode; ?></code></pre>
                </div>
            </div>
        </div>

        <!-- Modals for Code Display -->

        <!-- Circle Code Modal -->
        <div class="modal fade" id="myModalC" tabindex="-1" aria-labelledby="myModalLabelC" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabelC">Code from circle.php</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <pre><code class="php"><?php echo $circleCode; ?></code></pre>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Triangle Code Modal -->
        <div class="modal fade" id="myModalT" tabindex="-1" aria-labelledby="myModalLabelT" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabelT">Code from triangle.php</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <pre><code class="php"><?php echo $triangleCode; ?></code></pre>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Rectangle Code Modal -->
        <div class="modal fade" id="myModalR" tabindex="-1" aria-labelledby="myModalLabelR" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabelR">Code from rectangle.php</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <pre><code class="php"><?php echo $rectangleCode; ?></code></pre>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Grade Code Modal -->
        <div class="modal fade" id="myModalG" tabindex="-1" aria-labelledby="myModalLabelG" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabelG">Code from Grade.php</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <pre><code class="php"><?php echo $gradeCode; ?></code></pre>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> -->
</body>

</html>
