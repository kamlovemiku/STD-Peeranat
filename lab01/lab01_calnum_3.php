<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ผลการคำนวณ</title>
   
    <style>
         body{
            background-color:black;
            text-align: center;
        }
        .container {
            background-color: darkblue;
            max-width: 600px;
            margin: auto; 
            border: 2px solid #ccc; 
            padding: 20px; 
            text-align: center; 
            margin-top: 50px;
        }

        .mt-3 {
            margin-top: 20px; 
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container">
        <h1 class="text-center">ผลการคำนวณ</h1>
        <hr>

        <div class="mt-3">
            <?php
              
                $num_a = $_POST['num_a'];
                $num_b = $_POST['num_b'];

               
                class Calculator {
                    private $a;
                    private $b;

                    public function __construct($a, $b) {
                        $this->a = $a;
                        $this->b = $b;
                    }

                    public function add() {
                        return $this->a + $this->b;
                    }
                }

                
                $calculator = new Calculator($num_a, $num_b);

          
                $sum = $calculator->add();

           
                echo "<p>ผลรวมของ $num_a และ $num_b คือ:</p>";
                echo "<p class='h3'>$sum</p>";
            ?>
        </div>

        <div class="mt-3 text-center">
            <a href="?p=lab01_3" class="bbtn btn-success">กลับ</a>
        </div>
    </div>
</body>
</html>
