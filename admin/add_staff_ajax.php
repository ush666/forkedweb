<?php

    require_once '../classes/staff.class.php';
    //require_once '../tools/functions.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      
        $name = $_POST['name'];
        $discount_type = $_POST['discount_type'];
        $amount = $_POST['amount'];
        $min_spend = $_POST['min_spend'];
        $slots = $_POST['slots'];
        $expiration = $_POST['expiration'];

        $staff = new Staff();
        $staff->name = $name;
        $staff->discount_type = $discount_type;
        $staff->amount = $amount;
        $staff->min_spend = $min_spend;
        $staff->slots = $slots;
        $staff->expiration = $expiration;

        if ($staff->add()) {
            echo "success";
        } else {
            echo "Failed to add staff.";
        }
    }

?>