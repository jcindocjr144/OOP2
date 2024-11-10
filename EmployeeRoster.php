<?php

require_once 'CommissionEmployee.php';
require_once 'HourlyEmployee.php';
require_once 'PieceWorker.php';

class EmployeeRoster {
    private $roster;

    public function __construct($rosterSize) {
        $this->roster = array_fill(0, $rosterSize, null);
    }

    public function add(Employee $e) {
        for ($i = 0; $i < count($this->roster); $i++) {
            if ($this->roster[$i] === null) {
                $this->roster[$i] = $e;
                return true;
            }
        }
        return false;  // Roster is full
    }

    public function remove($employeeNumber) {
        foreach ($this->roster as $i => $employee) {
            if ($employee !== null && $employee->getEmployeeNumber() === $employeeNumber) {
                $this->roster[$i] = null;
                return true;
            }
        }
        return false;
    }

    public function count() {
        return count(array_filter($this->roster));
    }

    public function countCE() {
        return count(array_filter($this->roster, fn($e) => $e instanceof CommissionEmployee));
    }

    public function countHE() {
        return count(array_filter($this->roster, fn($e) => $e instanceof HourlyEmployee));
    }

    public function countPE() {
        return count(array_filter($this->roster, fn($e) => $e instanceof PieceWorker));
    }

    public function display() {
        foreach ($this->roster as $employee) {
            if ($employee !== null) {
                echo "Employee Number: " . $employee->getEmployeeNumber() . ", Name: " . $employee->getName() . "\n";
            }
        }
    }

    public function displayCE() {
        foreach ($this->roster as $employee) {
            if ($employee instanceof CommissionEmployee) {
                echo "Employee Number: " . $employee->getEmployeeNumber() . ", Name: " . $employee->getName() . "\n";
            }
        }
    }

    public function displayHE() {
        foreach ($this->roster as $employee) {
            if ($employee instanceof HourlyEmployee) {
                echo "Employee Number: " . $employee->getEmployeeNumber() . ", Name: " . $employee->getName() . "\n";
            }
        }
    }

    public function displayPE() {
        foreach ($this->roster as $employee) {
            if ($employee instanceof PieceWorker) {
                echo "Employee Number: " . $employee->getEmployeeNumber() . ", Name: " . $employee->getName() . "\n";
            }
        }
    }

    public function payroll() {
        foreach ($this->roster as $employee) {
            if ($employee !== null) {
                echo "Employee Number: " . $employee->getEmployeeNumber() . ", Name: " . $employee->getName() .
                    ", Earnings: " . $employee->earnings() . "\n";
            }
        }
    }
}

?>
