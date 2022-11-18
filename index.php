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




        <form action="result" method="get">
            <br />
            <h3>Configure your trip</h3>

            <div class="wrapper d-flex">
                <div class="custom-control custom-radio iconSelect mr-2">
                    <input type="radio" id="way1" name="tokenWay" value="1" class="custom-control-input" checked>
                    <label class="custom-control-label" for="way1">
                        <span class="material-icons">
                            arrow_right_alt
                        </span>One way</label>
                </div>

                <div class="custom-control custom-radio iconSelect ">
                    <input type="radio" id="way2" name="tokenWay" value="2" class="custom-control-input">
                    <label class="custom-control-label" for="way2">
                        <span class="material-icons">
                            compare_arrows
                        </span>Return</label>
                </div>
            </div>
            <br />
            <h3>
                <span class="material-icons">
                    place
                </span>
                From
            </h3>
            <select name='stationFrom' required>
                <option value=''>Select departure station</option>
                <?php
                for ($departureStation = 0; $departureStation < count($stations); $departureStation++) {
                    echo "<option value='$departureStation'>" . $stations[$departureStation] . "</option>";
                }
                ?>
            </select>
            <br /><br />

            <h3>
                <span class="material-icons">
                    add_location
                </span>
                To
            </h3>
            <select name='stationTo' required>
                <option value=''>Select arrival station</option>
                <?php
                for ($arrivalStation = 0; $arrivalStation < count($stations); $arrivalStation++) {
                    echo "<option value='$arrivalStation'>" . $stations[$arrivalStation] . "</option>";
                }
                ?>
            </select>
            <br /><br />
            <h3>
                <span class="material-icons">
                    dialpad
                </span>
                Number of trips
            </h3>
            <select name='tokenNumber' required>
                <option value='1'>for 1 trip</option>
                <?php
                for ($i = 2; $i <= 10; $i++) {
                    echo "<option value='$i'>for " . $i . " trips</option>";
                }
                ?>
            </select>
            <br /><br />
            <h3>
                <span class="material-icons">
                    local_offer
                </span>
                Discount
            </h3>



            <div class="wrapper d-flex">
                <?php
                for ($i = 0; $i < count($discount); $i++) { ?>
                    <div class="custom-control custom-radio iconSelect 
                    <?php
                    if ($i < -1 + count($discount)) {
                        echo "mr-2";
                    }
                    ?>
                    ">
                        <input type="radio" id="discount<?php echo $i ?>" name="discountValue" value="<?php echo $i ?>" class="custom-control-input" <?php if ($i == 0) {
                                                                                                                                                            echo " checked ";
                                                                                                                                                        } ?>>
                        <label class="custom-control-label" for="discount<?php echo $i ?>">

                            <?php
                            echo "<i class='material-icons'>" . $discount[$i]["icon"] . "</i>" . $discount[$i]["name"];
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


        <div class="wrapper d-flex" style="zoom:0.8;">
            <div class="custom-control custom-radio iconSelect mr-2">
                <input type="radio" id="lang1" name="lang" value="en" class="custom-control-input" checked>
                <label class="custom-control-label" for="lang1">
                    <span class="labelToggle">EN</span></label>
            </div>

            <div class="custom-control custom-radio iconSelect ">
                <input type="radio" id="lang2" name="lang" value="ml" class="custom-control-input">
                <label class="custom-control-label" for="lang2">
                    <span class="labelToggle">ML</span></label>
            </div>
        </div>
        <br />
        <br />
        <br /><br />
        <br /><br />
        <br /><br />
        <br /><br />
        <br />


        <svg width="48" height="48" xmlns="http://www.w3.org/2000/svg">

            <g>
                <title>Layer 1</title>
                <path id="svg_1" d="m20.55861,41.04329q-4.05,0 -6.925,-2.85t-2.875,-6.95q0,-3 1.875,-5.775q1.875,-2.775 5.425,-3.675l0,3.3q-2.05,0.7 -3.175,2.5t-1.125,3.65q0,2.85 1.975,4.825t4.825,1.975q3,0 5.025,-2.35q2.025,-2.35 1.475,-5.65l3,0q0.65,4.25 -2.275,7.625t-7.225,3.375zm15.7,-4.3l-5.55,-8.2l-11.15,0l0,-15l3,0l0,12l9.85,0l6.35,9.55l-2.5,1.65z" />
                <ellipse ry="3.1151" rx="3.1151" id="svg_2" cy="9.21014" cx="21.02571" />
                <ellipse ry="0.36959" rx="0.26399" id="svg_3" cy="8.47096" cx="21.76489" />
            </g>
        </svg>


    </section>

</body>

</html>