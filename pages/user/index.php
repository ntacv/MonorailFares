<?php
session_start();


//todo embed?? result by include with get param
//todo add user funny picture

$page = "user";
$user = true;
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

    <?php
    //log in function
    if (isset($_SESSION['user_id']) && isset($_SESSION['user_name'])) {

        $id = $_SESSION['user_id'];
        $name = $_SESSION['user_name'];
    }


    ?>

    <section class="max-w-sm m-auto">
        <br /><br />
        <h1 class="text-4xl">
            <span class="material-icons bigIcon">
                directions_railway
            </span>KL Monorail fares
        </h1>


        <?php
        include "../../includes/menu.php";
        ?>


        <br />
        <?php

        //check if session is set
        if (isset($_SESSION['user_name'])) {
            echo "<h3>Hello <span class='primary-color'>" . $_SESSION['user_name'] . "</span>! Your user ID is: <span class='primary-color'>" . $_SESSION['user_id'] . "</span></h3>
            <h3>You will need your user id to connect again. </h3>";
        } else {
            echo "<h3>no session, try to connect</h3><br>";
        }
        ?>

        <br>
        <br>
        <h2 class="text-2xl">Your orders</h2>
        <br>
        <?php

        // Creating database connection
        $conn = new mysqli('localhost', 'root', '', 'monorail_fares');

        // Check connection
        if ($conn == false) {
            die("ERROR: Connection failed: " . $conn->connect_error);
        }

        // SQL command
        $sql = "SELECT * FROM orders WHERE user_id = $id";

        if ($result = $conn->query($sql)) {
            if ($result->num_rows > 0) {


                //pages/result?tokenWay=1&stationFrom=0&stationTo=4&tokenNumber=2&discountValue=1

                echo "<table class=\"table-links\">";
                echo "<tr>";
                echo "<th>date of purchase</th>";
                echo "<th>price</th>";
                echo "</tr>";
                while ($row = $result->fetch_array()) {

                    $tokenWay = $row['way'];
                    $stationFrom = $row['station_from'];
                    $stationTo = $row['station_to'];
                    $tokenNumber = $row['number'];
                    $discountValue = $row['discount_id'];
                    $price = $row['price'];

                    $date = strtotime($row['date']);
                    $date = date("F jS Y h:i a", $date);
                    //$date = new DateTime($row['date']);
                    //$new_date = $date->format('d m Y H:i');
                    //if ($new_date) echo $new_date;

                    echo "<tr onclick=\"window.location='./result?tokenWay=$tokenWay&stationFrom=$stationFrom&stationTo=$stationTo&tokenNumber=$tokenNumber&discountValue=$discountValue&user';\">";
                    //?tokenWay=$tokenWay&stationFrom=$stationFrom&stationTo=$stationTo&tokenNumber=$tokenNumber&discountValue=$discountValue
                    echo "<td>" . $date . "</td>";
                    echo "<td>RM " . $row['price'] . "</td>";
                    echo "</tr></a>";
                }
                echo "</table>";
                // Free result set
                $result->free();
            } else {
                echo "No records matching your query were found.";
            }
        }
        // Close connection
        $conn->close();

        ?>


        <br />
        <br />
    </section>

</body>

</html>