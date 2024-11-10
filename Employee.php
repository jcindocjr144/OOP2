<?php

abstract class Employee {
    protected $employeeNumber;
    protected $name;

    public function __construct($employeeNumber, $name) {
        $this->employeeNumber = $employeeNumber;
        $this->name = $name;
    }

    abstract public function earnings();

    public function getEmployeeNumber() {
        return $this->employeeNumber;
    }

    public function getName() {
        return $this->name;
    }
}

?>
