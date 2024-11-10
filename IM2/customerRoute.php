<?php
    require_once "./controller.php";

    function saveCustomer($customer){
        $db = new baseController();
        $dbcon = $db->getDb();
        $sql = "call sp_save_customer(:p_cust_id,:p_fname,:p_lname,:p_mname,:p_bday)";
        $stmt = $dbcon->prepare($sql);
        $stmt->bindParam(":p_cust_id",$customer['cust_id']);
        $stmt->bindParam(":p_fname",$customer['fname']);
        $stmt->bindParam(":p_lname",$customer['lname']);
        $stmt->bindParam(":p_mname",$customer['mname']);
        $stmt->bindParam(":p_bday",$customer['bday']);
        $stmt->execute();
        echo "done";
    }

    $cus = array(
        "cust_id" => 0,
        "fname"=> $_POST['fname'],
        "lname"=> $_POST['lname'],
        "mname" => $_POST['mname'],
        "bday" => $_POST['bday']
    );

    saveCustomer($cus);
?>