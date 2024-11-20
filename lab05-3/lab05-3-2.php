.
<?php
class ClassNum {
    private $productnum;
    private $price;

    public function __construct($productnum, $price) {
        $this->productnum = $productnum;
        $this->price = $price;
    }

    public function totalAll() {
        return $this->price * $this->productnum;
    }

    public function freeAll() {
        return floor($this->productnum / 3);
    }

    public function discountAll() {
        $free = $this->freeAll();
        return $free * $this->price;
    }

    public function payAll() {
        $total = $this->totalAll();
        $discount = $this->discountAll();
        return $total - $discount;
    }
}
?>
