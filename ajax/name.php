<?php

    require '../db/connect.php';
    
     // Prepare the statement:
        $stmt = $con1->prepare("SELECT * FROM country WHERE iso_code=?");
        // Bind & execute the query statement:
        $stmt->bind_param("s", $_POST['name']);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            // Note that email field is unique, so should only have
            // one row in the result set.
            $row = $result->fetch_assoc();
        $popn = $row["population"];}
    
    echo $popn;

