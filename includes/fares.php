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
                $colreverse = -$i - 1 + count($stations);
                echo "<td>" . $stations[$colreverse] . "</td>";
            }
            ?>
        </tr>

        <?php
        for ($rows = 0; $rows < count($fares); $rows++) {
            echo "<tr>";
            echo "<td>" . $stations[$rows] . "</td>";
            for ($col = 0; $col < count($fares[$rows]); $col++) {

                $colreverse = -$col - 1 + count($fares[$rows]);
                if ($colreverse < $rows) {
                    break;
                }
                echo "<td class=' ";

                $cell = $fares[$rows][$colreverse];
                if ($cell == 2.50) {
                    echo "bg-red";
                } elseif ($cell == 2.10) {
                    echo "bg-orange";
                } elseif ($cell == 1.60) {
                    echo "bg-yellow";
                } elseif ($cell == 1.20) {
                    echo "bg-green";
                } elseif ($cell == 0) {
                    echo "bg-grey";
                } else {
                    echo "bg-other";
                }

                echo "'>" . $fares[$rows][$colreverse] . "</td>";
            }
            echo "</tr>";
        }
        ?>
    </table>
    </p>
</details>
<br>
<details <?php if (isset($page) && $page == "main") echo "open";
            else echo "closed"; ?>>
    <summary>Show full fares</summary>
    <p><br />

    <h2 class="2xl">From \ To</h2>
    <?php
    for ($rows = 0; $rows < count($stations); $rows++) {
        $colreverse = -$rows - 1 + count($stations);
        echo "<details>";
        echo "<summary>" . $stations[$rows] . "</summary>";





        for ($col = 0; $col < count($fares[$rows]); $col++) {
            $colreverse = -$col - 1 + count($fares[$rows]);
            $col = $col;
            if ($col >= count($stations)) break;
            echo "<span>" . $stations[$col + 1] . "</span>";

            if ($colreverse < $rows) {
                break;
            }
            echo "<span class=' ";

            $cell = $fares[$rows][$col];
            if ($cell == 2.50) {
                echo "bg-red";
            } elseif ($cell == 2.10) {
                echo "bg-orange";
            } elseif ($cell == 1.60) {
                echo "bg-yellow";
            } elseif ($cell == 1.20) {
                echo "bg-green";
            } elseif ($cell == 0) {
                echo "bg-grey";
            } else {
                echo "bg-other";
            }

            echo "'>" . $fares[$rows][$col] . "</span>";
            echo "<br>";
        }


        echo "</details>";
    }

    ?>

    </p>
</details>

<br>
<details <?php if (isset($page) && $page == "main") echo "open";
            else echo "closed"; ?>>
    <summary>Show full fares</summary>
    <p><br />

    <h2 class="2xl">From \ To</h2>
    <?php
    for ($rows = 0; $rows < count($stations); $rows++) {
        $colreverse = -$rows - 1 + count($stations);
        echo "<details>";
        echo "<summary>" . $stations[$rows] . "</summary>";





        for ($col = 0; $col < count($fares[$rows]); $col++) {
            $colreverse = -$col - 1 + count($fares[$rows]);
            $col = $col;
            if ($col >= count($stations)) break;
            echo "<span>" . $stations[$col + 1] . "</span>";

            if ($colreverse < $rows) {
                break;
            }
            echo "<span class=' ";

            $cell = $fares[$rows][$col];
            if ($cell == 2.50) {
                echo "bg-red";
            } elseif ($cell == 2.10) {
                echo "bg-orange";
            } elseif ($cell == 1.60) {
                echo "bg-yellow";
            } elseif ($cell == 1.20) {
                echo "bg-green";
            } elseif ($cell == 0) {
                echo "bg-grey";
            } else {
                echo "bg-other";
            }

            echo "'>" . $fares[$rows][$col] . "</span>";
            echo "<br>";
        }


        echo "</details>";
    }

    ?>

    </p>
</details>

<br />