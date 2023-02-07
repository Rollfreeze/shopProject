<?php
    if (isset($_POST)) {
        $age = array("Peter" => 35, "Ben" => 37, "Joe" => 43);
        echo json_encode($age);
    }
?>