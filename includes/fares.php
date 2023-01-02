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
?>

<br />
<details <?php if (isset($page) && $page == "main") echo "open";
            else echo "closed"; ?>>
    <summary>Show full fares</summary>
    <p><br />
    <table class="chart">
        <tr>
            <th>From \ To</th>
            <?php
            for ($i = 0; $i < count($stations); $i++) {
                echo "<td>" . $stations[$i] . "</td>";
            }
            ?>
        </tr>

        <?php
        for ($rows = 0; $rows < count($fares); $rows++) {
            echo "<tr>";
            echo "<td>" . $stations[$rows] . "</td>";
            for ($col = 0; $col < count($fares[$rows]); $col++) {
                echo "<td class=' ";

                if ($fares[$rows][$col] == 2.50) {
                    echo "bg-red";
                } elseif ($fares[$rows][$col] == 2.10) {
                    echo "bg-orange";
                } elseif ($fares[$rows][$col] == 1.60) {
                    echo "bg-yellow";
                } elseif ($fares[$rows][$col] == 1.20) {
                    echo "bg-green";
                } elseif ($fares[$rows][$col] == 0) {
                    echo "bg-grey";
                } else {
                    echo "bg-other";
                }

                echo "'>" . $fares[$rows][$col] . "</td>";
            }
            echo "</tr>";
        }
        ?>
    </table>
    </p>
</details>

<br />