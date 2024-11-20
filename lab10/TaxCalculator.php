<?php
// TaxCalculator.php
require_once 'Employee.php';

class TaxCalculator extends Employee {

    // Constructor inheriting from Employee
    public function __construct($name, $salary) {
        parent::__construct($name, $salary);
    }

    // Method to calculate monthly tax
    public function calculateMonthlyTax() {
        return $this->salary * 0.07;
    }

    // Method to calculate yearly income
    public function calculateYearlyIncome() {
        return $this->salary * 12;
    }

    // Method to calculate yearly tax
    public function calculateYearlyTax() {
        $yearlyIncome = $this->calculateYearlyIncome();
        return $yearlyIncome * 0.07;
    }

    // Method to calculate net income
    public function calculateNetIncome() {
        $yearlyIncome = $this->calculateYearlyIncome();
        $yearlyTax = $this->calculateYearlyTax();
        return $yearlyIncome - $yearlyTax;
    }
}
?>
