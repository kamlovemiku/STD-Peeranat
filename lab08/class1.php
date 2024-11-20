<?php
class Grade
{
    public $midterm;
    public $final;
    public $total; 

    public function __construct($midterm, $final)
    {
        $this->midterm = $midterm;
        $this->final = $final;
    }

    public function Cal_grade()
    {
        $this->total = $this->midterm + $this->final; 
        if ($this->total > 79)
            $grade = "A";
        else if ($this->total > 69)
            $grade = "B";
        else if ($this->total > 59)
            $grade = "C";
        else if ($this->total > 49)
            $grade = "D";
        else
            $grade = "F";
        return $grade;
    }
}

// Example usage
// $studentGrade = new Grade(40, 50); 
// $grade = $studentGrade->Cal_grade(); 
// echo "Grade: " . $grade . "<br>";
// echo "Total Score: " . $studentGrade->total; 
?>
