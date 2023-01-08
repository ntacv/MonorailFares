<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>KL Monorail Fares</title>

    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/toggleButton.css">

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
            </span>KL Monorail fares
        </h1>
        <?php

        if (!isset($_REQUEST['stationFrom']) || !isset($_REQUEST['stationTo']) || !isset($_REQUEST['tokenNumber']) || !isset($_REQUEST['tokenWay']) || !isset($_REQUEST['discountValue'])) {
            header("Location: ./form");
            exit();
        }

        include "../../includes/menu.php";
        include "../../includes/fares.php";


        $stationFrom = $_REQUEST['stationFrom'];
        $stationTo = $_REQUEST['stationTo'];
        $tokenNumber = $_REQUEST['tokenNumber'];
        $tokenWay = $_REQUEST['tokenWay'];
        $discountValue = $_REQUEST['discountValue'];
        #$total = $_REQUEST['total'];


        $discountPercent = $discount[$discountValue]['value'];
        $discountName = $discount[$discountValue]['name'];

        $stops = $stationTo - $stationFrom;

        ?>

        <h2 class="text-2xl">Your trip</h2>
        <p>
            <?php echo $stations[$stationFrom]; ?>
            <span class="material-icons">
                arrow_forward
            </span>
            <?php echo $stations[$stationTo]; ?>
        </p>
        <br>
        <table class="receipt">
            <?php
            $travelCost = $fares[$stationFrom][$stationTo];
            if ($travelCost == 0) {
                echo "<tr>It's too close!</tr>";
            } else {
                echo "<tr><td>" . $stops . " stops </td><td></td><td>" . $travelCost . "</td></tr>";
                if ($tokenWay == 1) {
                    $total = $fares[$stationFrom][$stationTo];
                    echo "<tr><td>One way</td><td> x1</td><td>" . $total . "</td></tr>";
                } else {
                    $total = $fares[$stationFrom][$stationTo] * 2;
                    echo "<tr><td>Return</td><td>x2</td><td>" . $total . "</td></tr>";
                }
                if ($tokenNumber != 1) {
                    $total = $total * $tokenNumber;
                    echo "<tr><td>" . $tokenNumber . " trips</td><td> x" . $tokenNumber . "</td><td> " . $total . "</td></tr>";
                }
                if ($discountPercent != 1) {
                    $total = $total * (1 - $discountPercent);
                    $total = round($total, 2);
                    echo "<tr><td>" . $discountName . " discount </td><td>-" . $discountPercent * 100 . "%</td><td>" . $total . "</td></tr>";
                }
                echo "<tr class='primary-color text-2xl '><td><p >Your total is </p></td><td></td><td>RM" . $total . "</td></tr>";
            }
            ?>
        </table>
        <br>
        <?php

        if (isset($_SESSION['user_id']) && isset($_SESSION['user_name']) && !isset($_REQUEST['user'])) {

            $id = $_SESSION['user_id'];
            $name = $_SESSION['user_name'];


            //INSERT INTO orders (discount_id, user_id, date, station_from, station_to, price, number, way) VALUES (1, 1, '2023-01-01 19:00:00', 0, 5, 2.50, 1, 1);


            // Creating database connection
            $conn = new mysqli('localhost', 'root', '', 'monorail_fares');

            // Check connection
            if ($conn == false) {
                die("ERROR: Connection failed: " . $conn->connect_error);
            }

            $now = date("Y-m-d H:i:s"); // 2001-03-10 17:16:18 (le format DATETIME de MySQL)
            // SQL command
            $sql = "INSERT INTO orders (discount_id, user_id, date, station_from, station_to, price, number, way) VALUES ($discountValue, $id, now(), $stationFrom, $stationTo, $total, $tokenNumber, $tokenWay)";

            if ($result = $conn->query($sql)) {
                echo "Trip saved!";
            } else {
                echo "No records matching your query were found.";
            }

            // Close connection
            $conn->close();
        }
        ?>
    </section>
</body>

</html>