<?php
class Sale {
    private $code;
    private $name;
    private $type;
    private $price;
    private $unit;
    private $total;
    private $discount;
    private $payment;

    public function __construct($code, $name, $type, $price, $unit) {
        $this->code = $code;
        $this->name = $name;
        $this->type = $type;
        $this->price = $price;
        $this->unit = $unit;
        $this->calculateTotals();
    }

    private function calculateTotals() {
        $this->total = $this->price * $this->unit;
        $this->discount = $this->calculateDiscount();
        $this->payment = $this->total - $this->discount;
    }

    private function calculateDiscount() {
        if ($this->total >= 20000) {
            return $this->total * 0.20;
        } else if ($this->total >= 15000) {
            return $this->total * 0.15;
        } else if ($this->total >= 10000) {
            return $this->total * 0.10;
        } else if ($this->total >= 5000) {
            return $this->total * 0.05;
        } else {
            return 0;
        }
    }

    public function getCode() {
        return htmlspecialchars($this->code);
    }

    public function getName() {
        return htmlspecialchars($this->name);
    }

    public function getType() {
        return htmlspecialchars($this->type);
    }

    public function getPrice() {
        return number_format($this->price, 2);
    }

    public function getUnit() {
        return htmlspecialchars($this->unit);
    }

    public function getTotal() {
        return number_format($this->total, 2);
    }

    public function getDiscount() {
        return number_format($this->discount, 2);
    }

    public function getPayment() {
        return number_format($this->payment, 2);
    }
}
?>
