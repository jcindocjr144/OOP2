<?php

require_once 'EmployeeRoster.php';

$rosterSize = (int) readline("Enter the roster size: ");
$roster = new EmployeeRoster($rosterSize);

function addEmployee($roster) {
    echo "\nChoose employee type:\n";
    echo "1. Commission Employee\n";
    echo "2. Hourly Employee\n";
    echo "3. Piece Worker\n";
    $type = (int) readline("Enter your choice: ");

    $employeeNumber = (int) readline("Enter employee number: ");
    $name = readline("Enter employee name: ");

    switch ($type) {
        case 1:
            $salary = (float) readline("Enter base salary: ");
            $itemsSold = (int) readline("Enter number of items sold: ");
            $commissionRate = (float) readline("Enter commission rate per item: ");
            $employee = new CommissionEmployee($employeeNumber, $name, $salary, $itemsSold, $commissionRate);
            break;
        
        case 2:
            $hoursWorked = (float) readline("Enter hours worked: ");
            $hourlyRate = (float) readline("Enter hourly rate: ");
            $employee = new HourlyEmployee($employeeNumber, $name, $hoursWorked, $hourlyRate);
            break;

        case 3:
            $itemsProduced = (int) readline("Enter number of items produced: ");
            $wagePerItem = (float) readline("Enter wage per item: ");
            $employee = new PieceWorker($employeeNumber, $name, $itemsProduced, $wagePerItem);
            break;

        default:
            echo "Invalid choice. Returning to main menu.\n";
            return;
    }

    if ($roster->add($employee)) {
        echo "Employee added successfully!\n";
    } else {
        echo "Roster is full. Cannot add more employees.\n";
    }
}

function displayMenu() {
    echo "\nMenu:\n";
    echo "1. ADD AN EMPLOYEE\n";
    echo "2. DISPLAY ALL EMPLOYEES\n";
    echo "3. DISPLAY COMMISSION EMPLOYEES\n";
    echo "4. DISPLAY HOURLY EMPLOYEES\n";
    echo "5. DISPLAY PIECE WORKERS\n";
    echo "6. DISPLAY PAYROLL\n";
    echo "7. SHOW EMPLOYEE COUNTS\n";
    echo "8. REMOVE AN EMPLOYEE\n";
    echo "9. EXIT\n";
}

function displayEmployeeCounts($roster) {
    echo "Total employees: " . $roster->count() . "\n";
    echo "Commission Employees: " . $roster->countCE() . "\n";
    echo "Hourly Employees: " . $roster->countHE() . "\n";
    echo "Piece Workers: " . $roster->countPE() . "\n";
}

function removeEmployee($roster) {
    $employeeNumber = (int) readline("Enter the employee number to remove: ");
    if ($roster->remove($employeeNumber)) {
        echo "Employee removed successfully.\n";
    } else {
        echo "Employee not found.\n";
    }
}

while (true) {
    displayMenu();
    $choice = (int) readline("Enter your choice: ");
    
    switch ($choice) {
        case 1:
            addEmployee($roster);
            break;
        case 2:
            echo "Displaying all employees:\n";
            $roster->display();
            break;
        case 3:
            echo "Displaying Commission Employees:\n";
            $roster->displayCE();
            break;
        case 4:
            echo "Displaying Hourly Employees:\n";
            $roster->displayHE();
            break;
        case 5:
            echo "Displaying Piece Workers:\n";
            $roster->displayPE();
            break;
        case 6:
            echo "Displaying Payroll:\n";
            $roster->payroll();
            break;
        case 7:
            displayEmployeeCounts($roster);
            break;
        case 8:
            removeEmployee($roster);
            break;
        case 9:
            echo "Exiting program.\n";
            exit();
        default:
            echo "Invalid choice. Please try again.\n";
    }
}

?>
