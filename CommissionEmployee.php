<?php

require_once 'Employee.php';

class CommissionEmployee extends Employee {
    private $salary;
    private $itemsSold;
    private $commissionRate;

    public function __construct($employeeNumber, $name, $salary, $itemsSold, $commissionRate) {
        parent::__construct($employeeNumber, $name);
        $this->salary = $salary;
        $this->itemsSold = $itemsSold;
        $this->commissionRate = $commissionRate;
    }

    public function earnings() {
        return $this->salary + ($this->itemsSold * $this->commissionRate);
    }
}

?>
