<?php
// EvenOddChecker class definition
interface EvenOddInterface {
    public function checkEvenOdd();
    public function getEvenNumbers();
    public function getOddNumbers();
    public function getTotalSum();
}

class NumberChecker implements EvenOddInterface {
    protected $number;
    protected $evenNumbers = [];
    protected $oddNumbers = [];

    public function __construct($number) {
        $this->number = $number;
    }

    public function checkEvenOdd() {
        return "No check defined.";
    }

    public function getEvenNumbers() {
        return $this->evenNumbers;
    }

    public function getOddNumbers() {
        return $this->oddNumbers;
    }

    public function getTotalSum() {
        return array_sum($this->evenNumbers) + array_sum($this->oddNumbers);
    }
}

class EvenOddChecker extends NumberChecker {
    public function checkEvenOdd() {
        if ($this->number % 2 == 0) {
            return "$this->number is Even";
        } else {
            return "$this->number is Odd";
        }
    }

    public function getEvenNumbers() {
        $this->evenNumbers = [];
        for ($i = 1; $i <= $this->number; $i++) {
            if ($i % 2 == 0) {
                $this->evenNumbers[] = $i;
            }
        }
        return $this->evenNumbers;
    }

    public function getOddNumbers() {
        $this->oddNumbers = [];
        for ($i = 1; $i <= $this->number; $i++) {
            if ($i % 2 != 0) {
                $this->oddNumbers[] = $i;
            }
        }
        return $this->oddNumbers;
    }
}

// Processing form input
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $limit = $_POST['limit'];
    echo "<div class='container mt-5'>";
    echo "<h2>Results for numbers 1 to $limit</h2>";
    for ($i = 1; $i <= $limit; $i++) {
        $checker = new EvenOddChecker($i);
        echo $checker->checkEvenOdd() . "<br>";
    }
    $checker = new EvenOddChecker($limit);
    echo "<hr>";
    echo "<p>Odd numbers: " . implode(", ", $checker->getOddNumbers());
    echo " = Total Sum of Odd numbers: " . array_sum($checker->getOddNumbers());
    echo "<p>Even numbers: " . implode(", ", $checker->getEvenNumbers()) ;
    echo " = Total Sum of Even numbers: " . array_sum($checker->getEvenNumbers());
    echo "<hr>Total Sum All : " . $checker->getTotalSum() . "</hr>";
    echo "</div>";
}
?>
