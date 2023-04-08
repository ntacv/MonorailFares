<?php
session_start();

$input = "";

if (isset($_GET['search_input'])) { //check if form was submitted
    $input = $_GET['search_input']; //get input text

    $message = "<p>You searched for: " . $input . "</p>";
}

include "../../includes/sql_request.php";
?>
<!DOCTYPE html>
<html>

<head>
    <title>KL Monorail Fares</title>

    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/toggleButton.css">

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@200;400;700&display=swap" rel="stylesheet">
</head>

<body>
    <section class="max-w-sm m-auto">
        <br /><br />
        <h1 class="text-4xl">
            <span class="material-icons bigIcon">
                directions_railway
            </span>All transactions
        </h1>
        <?php
        include "../../includes/menu.php";
        ?>
        <br>
        <p>This page is for admin users</p>
        <br>
        <form action="" method="get">
            <input type="text" name="search_input" placeholder="Search...">

            <input type="submit" value="Search" class="primary-bg" />
            <?php
            if ($input != "") {
            ?>
                <input type="submit" name="reset" value="Reset" class="login_btn" />
            <?php } ?>
        </form>
        <?php

        $sql = "SELECT users.user_id, users.name, orders.order_id, orders.user_id, orders.date, orders.price, orders.way, orders.station_from, orders.station_to, orders.number, orders.discount_id 
        FROM orders 
        INNER JOIN users 
        ON users.user_id = orders.user_id
        ";

        if (is_numeric($input)) {
            $sql = $sql . " WHERE users.user_id = '$input' ";
        } else {
            $sql = $sql . " WHERE users.name LIKE '%$input%'";
        }

        if ($result = $conn->query($sql)) {
            if ($result->num_rows > 0) {
                echo "<table class=\"table-links\"><tr><th>ID</th><th>name</th><th>date</th><th>price</th></tr>";
                while ($row = $result->fetch_array()) {

                    $tokenWay = $row['way'];
                    $stationFrom = $row['station_from'];
                    $stationTo = $row['station_to'];
                    $tokenNumber = $row['number'];
                    $discountValue = $row['discount_id'];
                    $price = $row['price'];
                    $date = strtotime($row['date']);
                    $date = date("F jS Y h:i a", $date);

                    //print_r($row);
                    echo "<tr onclick=\"window.location='./result?tokenWay=$tokenWay&stationFrom=$stationFrom&stationTo=$stationTo&tokenNumber=$tokenNumber&discountValue=$discountValue&user';\">
                    <td>" . $row['user_id'] . "</td><td>" . $row['name'] . "</td><td>" . $date . "</td><td>" . $row['price'] . "</td></tr>";
                    //$result->free();
                }
            } else {
                echo "No records matching your query were found.";
            }
        }
        echo "<br>";

        // Close connection
        $conn->close();
        ?>
    </section>
</body>

</html>