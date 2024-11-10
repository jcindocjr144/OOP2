<?php

require_once 'Employee.php';

class HourlyEmployee extends Employee {
    private $hoursWorked;
    private $hourlyRate;

    public function __construct($employeeNumber, $name, $hoursWorked, $hourlyRate) {
        parent::__construct($employeeNumber, $name);
        $this->hoursWorked = $hoursWorked;
        $this->hourlyRate = $hourlyRate;
    }

    public function earnings() {
        $overtimeRate = 1.5 * $this->hourlyRate;
        if ($this->hoursWorked > 40) {
            $regularPay = 40 * $this->hourlyRate;
            $overtimePay = ($this->hoursWorked - 40) * $overtimeRate;
            return $regularPay + $overtimePay;
        }
        return $this->hoursWorked * $this->hourlyRate;
    }
}

?>
