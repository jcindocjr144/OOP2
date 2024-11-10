<?php

require_once 'Employee.php';

class PieceWorker extends Employee {
    private $itemsProduced;
    private $wagePerItem;

    public function __construct($employeeNumber, $name, $itemsProduced, $wagePerItem) {
        parent::__construct($employeeNumber, $name);
        $this->itemsProduced = $itemsProduced;
        $this->wagePerItem = $wagePerItem;
    }

    public function earnings() {
        return $this->itemsProduced * $this->wagePerItem;
    }
}

?>
