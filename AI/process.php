<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shape Area Result</title>
    <!-- Bootstrap 5 CSS -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <!-- Bootstrap Icons -->
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.3/font/bootstrap-icons.min.css" rel="stylesheet"> -->
    <style>
        #shapeCanvas {
            border: 1px solid #000;
            margin-top: 20px;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="card text-center">
            <div class="card-header bg-primary text-white">
                <h1>Shape Area Calculation Result</h1>
            </div>
            <div class="card-body">
                <?php
                interface Shape
                {
                    public function area();  // ฟังก์ชันคำนวณพื้นที่
                }

                class Triangle implements Shape
                {
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

                    public function getBase()
                    {
                        return $this->base;
                    }

                    public function getHeight()
                    {
                        return $this->height;
                    }
                }

                class Rectangle implements Shape
                {
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

                    public function getWidth()
                    {
                        return $this->width;
                    }

                    public function getHeight()
                    {
                        return $this->height;
                    }
                }

                class Circle implements Shape
                {
                    private $radius;

                    public function __construct($radius)
                    {
                        $this->radius = $radius;
                    }

                    public function area()
                    {
                        return pi() * pow($this->radius, 2);
                    }

                    public function getRadius()
                    {
                        return $this->radius;
                    }
                }

                // ตรวจสอบว่ามีข้อมูลส่งมาหรือไม่
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $shape = $_POST['shape'];
                    $icon = "";
                    $area = 0;

                    if ($shape == 'Triangle') {
                        $base = $_POST['triangleBase'];
                        $height = $_POST['triangleHeight'];
                        $triangle = new Triangle($base, $height);
                        $area = $triangle->area();
                        $shapeName = 'Triangle';
                        $icon = "<i class='bi bi-triangle-fill'></i>";
                    } elseif ($shape == 'Rectangle') {
                        $width = $_POST['rectangleWidth'];
                        $height = $_POST['rectangleHeight'];
                        $rectangle = new Rectangle($width, $height);
                        $area = $rectangle->area();
                        $shapeName = 'Rectangle';
                        $icon = "<i class='bi bi-square-fill'></i>";
                    } elseif ($shape == 'Circle') {
                        $radius = $_POST['circleRadius'];
                        $circle = new Circle($radius);
                        $area = $circle->area();
                        $shapeName = 'Circle';
                        $icon = "<i class='bi bi-circle-fill'></i>";
                    }

                    // แสดงผลลัพธ์
                    echo "<h2 class='mt-4'>$icon Area of $shapeName</h2>";
                    echo "<p class='lead'>The area is: <strong>" . number_format($area, 2) . "</strong> square units.</p>";

                    // แสดงค่าที่กรอก
                    echo "<table class='table table-bordered mt-4'>";
                    echo "<thead class='table-dark'><tr><th>Parameter</th><th>Value</th></tr></thead>";
                    echo "<tbody>";
                    if ($shape == 'Triangle') {
                        echo "<tr><td>Base</td><td>" . htmlspecialchars($base) . "</td></tr>";
                        echo "<tr><td>Height</td><td>" . htmlspecialchars($height) . "</td></tr>";
                    } elseif ($shape == 'Rectangle') {
                        echo "<tr><td>Width</td><td>" . htmlspecialchars($width) . "</td></tr>";
                        echo "<tr><td>Height</td><td>" . htmlspecialchars($height) . "</td></tr>";
                    } elseif ($shape == 'Circle') {
                        echo "<tr><td>Radius</td><td>" . htmlspecialchars($radius) . "</td></tr>";
                    }
                    echo "</tbody></table>";
                } else {
                    echo "<p class='text-danger'>No data submitted.</p>";
                }
                ?>
                <canvas id="shapeCanvas" width="400" height="400"></canvas>

                <!-- ปุ่มสำหรับแสดงโค้ด -->
                <button type="button" class="btn btn-info mt-4" data-bs-toggle="modal" data-bs-target="#codeModal">
                    Show Class Code
                </button>
                <button type="button" class="btn btn-info mt-4" data-bs-toggle="modal" data-bs-target="#drawCodeModal">
                    Show Drawing Code
                </button>
            </div>
            <div class="card-footer">
                <a href="?p=poly" class="btn btn-secondary">Go Back</a>
            </div>
        </div>
    </div>

     <!-- Modal สำหรับแสดงโค้ดการวาดรูป -->
     <div class="modal fade" id="drawCodeModal" tabindex="-1" aria-labelledby="drawCodeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="drawCodeModalLabel">Drawing Code</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <pre>
function drawShape() {
    const canvas = document.getElementById('shapeCanvas');
    const ctx = canvas.getContext('2d');
    ctx.clearRect(0, 0, canvas.width, canvas.height); // ล้างค่าเก่าบน canvas

    const shape = "<?php echo $shape; ?>"; // รับค่ารูปทรงจาก PHP

    if (shape === 'Triangle') {
        ctx.beginPath();
        ctx.moveTo(200, 50);
        ctx.lineTo(100, 350);
        ctx.lineTo(300, 350);
        ctx.closePath();
        ctx.stroke();
    } else if (shape === 'Rectangle') {
        ctx.strokeRect(100, 100, 200, 150);
    } else if (shape === 'Circle') {
        ctx.beginPath();
        ctx.arc(200, 200, 150, 0, 2 * Math.PI);
        ctx.stroke();
    }
}

// เรียกใช้ฟังก์ชันวาดรูปเมื่อหน้าเพจโหลดเสร็จ
window.onload = drawShape;
                    </pre>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal สำหรับแสดงโค้ด -->
    <div class="modal fade" id="codeModal" tabindex="-1" aria-labelledby="codeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="codeModalLabel">Class Code</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <pre>
<?php
if ($shape == 'Triangle') {
    highlight_string('
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

        public function getBase() {
            return $this->base;
        }

        public function getHeight() {
            return $this->height;
        }
    }
    ');
} elseif ($shape == 'Rectangle') {
    highlight_string('
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

        public function getWidth() {
            return $this->width;
        }

        public function getHeight() {
            return $this->height;
        }
    }
    ');
} elseif ($shape == 'Circle') {
    highlight_string('
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

        public function getRadius() {
            return $this->radius;
        }
    }
    ');
}

?>
                    </pre>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS (Optional) -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script> -->
    <script>
        const canvas = document.getElementById('shapeCanvas');
        const ctx = canvas.getContext('2d');

        // วาดรูปทรงที่เลือก
        <?php if ($_SERVER['REQUEST_METHOD'] == 'POST'): ?>
            const shape = "<?php echo $shape; ?>";
            ctx.clearRect(0, 0, canvas.width, canvas.height); // ล้าง canvas ก่อนวาดใหม่

            <?php if ($shape == 'Triangle'): ?>
                const triangleBase = <?php echo $triangle->getBase(); ?>;
                const triangleHeight = <?php echo $triangle->getHeight(); ?>;
                ctx.beginPath();
                ctx.moveTo(canvas.width / 2, canvas.height / 2 - triangleHeight / 2); // จุดยอด
                ctx.lineTo(canvas.width / 2 - triangleBase / 2, canvas.height / 2 + triangleHeight / 2); // มุมซ้าย
                ctx.lineTo(canvas.width / 2 + triangleBase / 2, canvas.height / 2 + triangleHeight / 2); // มุมขวา
                ctx.closePath();
                ctx.fillStyle = 'lightblue';
                ctx.fill();
                ctx.stroke();

            <?php elseif ($shape == 'Rectangle'): ?>
                const rectangleWidth = <?php echo $rectangle->getWidth(); ?>;
                const rectangleHeight = <?php echo $rectangle->getHeight(); ?>;
                ctx.fillStyle = 'lightgreen';
                ctx.fillRect(canvas.width / 2 - rectangleWidth / 2, canvas.height / 2 - rectangleHeight / 2, rectangleWidth, rectangleHeight);

            <?php elseif ($shape == 'Circle'): ?>
                const circleRadius = <?php echo $circle->getRadius(); ?>;
                ctx.beginPath();
                ctx.arc(canvas.width / 2, canvas.height / 2, circleRadius, 0, 2 * Math.PI);
                ctx.fillStyle = 'lightcoral';
                ctx.fill();
                ctx.stroke();
            <?php endif; ?>
        <?php endif; ?>
    </script>
</body>

</html>