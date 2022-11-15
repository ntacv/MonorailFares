<!DOCTYPE html>
<html>

<head>
    <title>KL Monorail Fares</title>

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/toggleButton.css">

    <script src="https://cdn.tailwindcss.com"></script>
</head>


<body>


    <section class="max-w-sm m-auto">

        <h1>KL Monorail fares</h1>

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
        $stations = array("KL Senral", "Tun Sambanthan", "Maharajalela", "Hang Tuah", "Imbi", "Bukit Bintang", "Raja Chulan", "Bukit Nanas", "Medan Tuanku", "Chow Kit", "Titiwangsa");
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
            array("name" => "Adult", "value" => 1),
            array("name" => "Senior Citizens", "value" => 0.25),
            array("name" => "Disabled", "value" => 0.40),
            array("name" => "Students", "value" => 0.30)
        );
        ?>




        <form action="result" method="get">
            <br />
            <h3>Configure your trip</h3>
            <br />
            <div class="wrapper d-flex">
                <div class="custom-control custom-radio iconSelect mr-2">
                    <input type="radio" id="way1" name="way" value="1" class="custom-control-input" checked>
                    <label class="custom-control-label" for="way1">
                        One way
                    </label>
                </div>

                <div class="custom-control custom-radio iconSelect ml-2">
                    <input type="radio" id="way2" name="way" value="2" class="custom-control-input">
                    <label class="custom-control-label" for="way2">
                        Return
                    </label>
                </div>
            </div>
            <br />
            <h3>From</h3>
            <select name='selectDepartureStation' required>
                <option value=''>Select departure station...</option>
                <?php
                for ($departureStation = 0; $departureStation < count($stations); $departureStation++) {
                    echo "<option value='$departureStation'>" . $stations[$departureStation] . "</option>";
                }
                ?>
            </select>
            <br /><br />

            <h3>To</h3>
            <select name='selectArrivalStation' required>
                <option value=''>Select arrival station...</option>
                <?php
                for ($arrivalStation = 0; $arrivalStation < count($stations); $arrivalStation++) {
                    echo "<option value='$arrivalStation'>" . $stations[$arrivalStation] . "</option>";
                }
                ?>
            </select>
            <br /><br />
            <h3>Number of trips</h3>
            <select name='' required>
                <option value='1'>for 1 trip</option>
                <?php
                for ($i = 2; $i < 10; $i++) {
                    echo "<option value='$i'>for " . $i . " trips</option>";
                }
                ?>
            </select>
            <br /><br />
            <h3>Discount</h3>
            <div class="wrapper d-flex">
                <?php
                for ($i = 0; $i < count($discount); $i++) { ?>
                    <div class="custom-control custom-radio iconSelect mr-2">
                        <input type="radio" id="discount<?php echo $i ?>" name="discount" value="1" class="custom-control-input">
                        <label class="custom-control-label" for="discount<?php echo $i ?>">
                            <?php
                            echo $discount[$i]["name"];
                            ?>
                        </label>
                    </div>
                <?php
                }
                ?>
            </div>
            <br />
            <input type="submit" value="Submit" class="primary-bg" />
        </form>


        <br />
        <details>
            <summary>Show fule fares</summary>
            <p><br />
            <table>
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
        <br />




    </section>

</body>

</html>