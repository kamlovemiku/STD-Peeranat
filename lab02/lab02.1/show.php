<?php
include("class.php");

echo '<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@400&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ผลการคำนวณ</title>
    <style>
        body {
            font-family: "Sarabun", sans-serif;
            background-color: #48e780cb;
        .result-container {
            margin: 50px auto;
            padding: 20px;
            border-radius: 10px;
            background-color: #48e780cb; 
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center; 
        }
        h2 {
            color: #2c3e50; 
        }
        .result {
            font-size: 1.5rem;
            margin-top: 20px;
            color: #28a745; 
        }
        .btn-custom {
            background-color: #28a745;
            color: white; 
            border: none; 
            border-radius: 5px; 
            padding: 10px 20px; 
            text-decoration: none;
            transition: background-color 0.3s; 
            margin-top: 20px; 
        }
        .btn-custom:hover {
            background-color: #218838; 
        }
    </style>
</head>
<body>

<div class="result-container">
    <h2>ผลการคำนวณ</h2>';

$a = floatval($_POST['num_a']);
$b = floatval($_POST['num_b']);
$operation = $_POST['num'];

$calculator = new classnum($a, $b);
$result = null;
$operator = '';

switch ($operation) {
    case 'add':
        $operator = '+';
        $result = $calculator->add();
        break;
    case 'substract':
        $operator = '-';
        $result = $calculator->substract();
        break;
    case 'multiplication':
        $operator = '*';
        $result = $calculator->multiplication();
        break;
    case 'division':
        if ($b != 0) {
            $operator = '/';
            $result = $calculator->division();
        } else {
            $operator = '/';
            $result = "ไม่สามารถหารด้วยศูนย์";
        }
        break;
    case 'exponent':
        $operator = '^';
        $result = $calculator->exponent();
        break;
    case 'fractional':
        if ($b != 0) {
            $operator = '%';
            $result = $calculator->fractional();
        } else {
            $operator = '%';
            $result = "ไม่สามารถหาเศษด้วยศูนย์";
        }
        break;
    case 'Part':
        if ($b != 0) {
            $operator = '\\';
            $result = $calculator->Part();
        } else {
            $operator = '\\';
            $result = "ไม่สามารถหารด้วยศูนย์";
        }
        break;
}

echo "<div class='result'>$a $operator $b = " . $result . "</div>";
echo "<br>";
echo '<a href="index.html" class="btn btn-outline-dark">กลับ</a>';
echo '</div>';

echo '</body>
</html>';
?>
