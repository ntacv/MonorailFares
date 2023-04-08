<?php

//TODO add a sql call to import discount data
//and pass it to session variable 

//error check the index of discount between variable and db
//dicounts id start from 1, array id start from 0
//$sql = "SELECT * FROM discounts";


$discount = array("");

include("sql_request.php");

$sql = "SELECT * FROM discounts";

if ($conn->query($sql) == true) {
    $result = $conn->query($sql);
    while ($row = $result->fetch_array()) {

        if ($row != null) {

            array_push($discount, $row);
            // echo print_r($discount);
            // echo "<br><br>";
        } else {
            $error = "User ID not defined. Please try again or log in.";
        }
    }
} else {
    $error = "ERROR: Could not able to execute $sql. " . $conn->error;
}


//echo print_r($discount);
