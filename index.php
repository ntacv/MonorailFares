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
                    array("name" => "Senior Citizens", "value" => 0.25),
                    array("name" => "Disabled", "value" => 0.40),
                    array("name" => "Students", "value" => 0.30)
        );
        ?>




        <form action="" method="get">
            <br />
            <h3>Choose your trip</h3>
            <br />

            <div class="wrapper d-flex">
                <div class="custom-control custom-radio iconSelect mr-2">
                    <input type="radio" id="customRadio1" name="customRadio" value="1" class="custom-control-input" checked>
                    <label class="custom-control-label" for="customRadio1">
                        One way
                    </label>
                </div>

                <div class="custom-control custom-radio iconSelect ml-2">
                    <input type="radio" id="customRadio2" name="customRadio" value="2" class="custom-control-input">
                    <label class="custom-control-label" for="customRadio2">
                        Return
                    </label>
                </div>
            </div>

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
            <h3>Discount</h3>
            <select name='selectDiscount'>
                <option value=''>Select a discount...</option>
                <?php
                for ($i = 0; $i < count($discount); $i++) {
                    echo "<option value='$discount[$i]["val"]'>" . $discount[$i]["name"] . "</option>";
                }
                ?>
            </select>
            <br />


            <div class="wrapper d-flex">
                <div class="custom-control custom-radio iconSelect mr-2">
                    <input type="radio" id="customRadio1" name="customRadio" value="1" class="custom-control-input" checked>
                    <label class="custom-control-label" for="customRadio1">
                        Adult
                    </label>
                </div>

                <div class="custom-control custom-radio iconSelect ml-2">
                    <input type="radio" id="customRadio2" name="customRadio" value="2" class="custom-control-input">
                    <label class="custom-control-label" for="customRadio2">
                        Student
                    </label>
                </div>

                <div class="custom-control custom-radio iconSelect ml-2">
                    <input type="radio" id="customRadio2" name="customRadio" value="2" class="custom-control-input">
                    <label class="custom-control-label" for="customRadio2">
                        Senior
                    </label>
                </div>

                <div class="custom-control custom-radio iconSelect ml-2">
                    <input type="radio" id="customRadio2" name="customRadio" value="2" class="custom-control-input">
                    <label class="custom-control-label" for="customRadio2">
                        Disabled
                    </label>
                </div>
            </div>


            <br /><br />
            <input type="submit" value="Submit" class="primary-bg" />
        </form>



        <details>
            <summary>Show fule fares</summary>
            <p>
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
                        echo "<td>" . $fares[$rows][$col] . "</td>";
                    }
                    echo "</tr>";
                }
                ?>
            </table>
            </p>
        </details>




    </section>

</body>

</html>