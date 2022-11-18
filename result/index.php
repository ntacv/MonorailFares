<!DOCTYPE html>
<html>

<head>
    <title>KL Monorail Fares</title>

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/toggleButton.css">

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

        <!-- 
Variables: 
    ARRAYS
        $stations
        $fares
    OTHER
        $stationFrom
        $stationTo
        $tokenNumber
        $tokenWay
        $discount
        $total


        show directions for the trip they do
-->
        <?php

        $stations = array("KL Sentral", "Tun Sambanthan", "Maharajalela", "Hang Tuah", "Imbi", "Bukit Bintang", "Raja Chulan", "Bukit Nanas", "Medan Tuanku", "Chow Kit", "Titiwangsa");
        $fares = array(
            array(0, 1.20, 1.60, 1.60, 1.60, 2.10, 2.10, 2.10, 2.50, 2.50, 2.50),
            array(1.20, 0, 1.20, 1.60, 1.60, 1.60, 2.10, 2.10, 2.10, 2.50, 2.50),
            array(1.60, 1.20, 0, 1.20, 1.20, 1.60, 1.60, 1.60, 2.10, 2.10, 2.50),
            array(1.60, 1.60, 1.20, 0, 1.20, 1.20, 1.20, 1.60, 1.60, 2.10, 2.10),
            array(1.60, 1.60, 1.20, 1.20, 0, 1.20, 1.20, 1.60, 1.60, 1.60, 2.10),
            array(2.10, 1.60, 1.60, 1.20, 1.20, 0, 1.20, 1.20, 1.60, 1.60, 2.10),
            array(2.10, 2.10, 1.60, 1.20, 1.20, 1.20, 0, 1.20, 1.20, 1.60, 1.60),
            array(2.10, 2.10, 1.60, 1.60, 1.60, 1.20, 1.20, 0, 1.20, 1.20, 1.60),
            array(2.50, 2.10, 2.10, 1.60, 1.60, 1.60, 1.20, 1.20, 0, 1.20, 1.60),
            array(2.50, 2.50, 2.10, 2.10, 1.60, 1.60, 1.60, 1.20, 1.20, 0, 1.20),
            array(2.50, 2.50, 2.50, 2.10, 2.10, 2.10, 1.60, 1.60, 1.60, 1.20, 0)
        );
        $discount = array(
            array("name" => "Adult", "value" => 1, "icon" => "groups"),
            array("name" => "Senior", "value" => 0.25, "icon" => "elderly"),
            array("name" => "Disabled", "value" => 0.40, "icon" => "accessible"),
            array("name" => "Students", "value" => 0.30, "icon" => "school"),
        );



        $stationFrom = $_REQUEST['stationFrom'];
        $stationTo = $_REQUEST['stationTo'];
        $tokenNumber = $_REQUEST['tokenNumber'];
        $tokenWay = $_REQUEST['tokenWay'];
        $discountValue = $_REQUEST['discountValue'];
        #$total = $_REQUEST['total'];


        $discountPercent = $discount[$discountValue]['value'];
        $discountName = $discount[$discountValue]['name'];


        echo $stationFrom;
        echo $stationTo;
        echo $tokenNumber;
        echo $tokenWay;
        echo $discountValue;

        ?>

        <h2>Your trip</h2>
        <p>
            <span class="material-icons">
                arrow_forward
            </span>
            <?php echo $stations[$stationFrom]; ?>
            <span class="material-icons">
                arrow_forward
            </span>
            <?php echo $stations[$stationTo]; ?>
        </p>

        <table class="receipt">
            <tr>
                <td>hi</td>
            </tr>
            <?php
            $travelCost = $fares[$stationFrom][$stationTo];
            if ($travelCost == 0) {
                echo "<tr>It's too close!</tr>";
            } else {
                echo "<tr><td>" . $stations[$stationFrom] . " <-> " . $stations[$stationTo] . " </td><td></td><td>" . $travelCost . "</td></tr>";
                if ($tokenWay == 1) {
                    $total = $fares[$stationFrom][$stationTo];
                    echo "<tr><td>One way</td><td> x1</td><td>" . $total . "</td></tr>";
                } else {
                    $total = $fares[$stationFrom][$stationTo] * 2;
                    echo "<tr><td>Return</td><td>x2</td><td>" . $total . "</td></tr>";
                }
                if ($discountPercent != 1) {
                    $total = $total * $discountPercent;
                    echo "<tr><td>" . $discountName . " discount </td><td>" . $discountPercent * 100 . "%</td><td>" . $total . "</td></tr>";
                }
                if ($tokenNumber != 1) {
                    $total = $total * $tokenNumber;
                    echo "<tr><td>Number of trips</td><td> x" . $tokenNumber . "</td><td> " . $total . "</td></tr>";
                }
                echo "<tr class='primary-color text-2xl '><td><p >Your total is </p></td><td></td><td>RM" . $total . "</td></tr>";
            }
            ?>
        </table>


        <?php
        $travelCost = $fares[$stationFrom][$stationTo];
        if ($travelCost == 0) {
            echo "It's too close!";
        } else {
            echo $stations[$stationFrom] . " <-> " . $stations[$stationTo] . " " . $travelCost . "<br>";
            if ($tokenWay == 1) {
                $total = $fares[$stationFrom][$stationTo];
                echo "One way x1" . "<br>";
            } else {
                $total = $fares[$stationFrom][$stationTo] * 2;
                echo "Return x2 " . $total . "<br>";
            }
            if ($discountPercent != 1) {
                $total = $total * $discountPercent;
                echo "" . $discountName . " discount " . $discountPercent * 100 . "% " . $total . "<br>";
            }
            if ($tokenNumber != 1) {
                $total = $total * $tokenNumber;
                echo "Number of trips x" . $tokenNumber . " " . $total . "<br>";
            }
            echo "<p class='primary-color text-2xl '>Your total is RM" . $total . "</p>";
        }
        ?>
    </section>
</body>

</html>