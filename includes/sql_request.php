<?php 

if ( $_SESSION['dev'] == "prod"){
    
    $servername = "entafrfgccnathan.mysql.db";
    $username = "entafrfgccnathan";
    $password = "Enta1402";
    $database = "entafrfgccnathan";
}
else{
    // or local
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "monorail_fares";
}


// Create connection
$conn = new mysqli($servername, $username, $password, $database);
//$conn = new mysqli("entafrfgccnathan.mysql.db", "entafrfgccnathan", "Enta1402", "entafrfgccnathan");
//$conn = new mysqli('localhost', 'root', '', 'monorail_fares');


// Checking connection
if ($conn == false) {
    die("ERROR: Could not connect. " . $conn->connect_error);
}

/*
$sql = "SELECT * FROM users ";
if ($conn->query($sql) == true) {
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    foreach ($row as $key => $value) {
        echo $key . " : " . $value . "<br>";
    }
    //echo $row;
}

*/