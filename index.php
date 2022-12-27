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

        <br />
        <?php
        if (isset($_POST['submit'])) {
            echo "<h3>Hello !</h3>";
        } else {
        ?>

            <span class="loginbtn" onclick="document.querySelector('.loginform').style.display = 'block';">
                <span class="material-icons">
                    person
                </span>Log in
            </span>
            <span class="loginbtn" onclick="document.querySelector('.signupform').style.display = 'block';">
                <span class="material-icons">
                    person_add
                </span>Sign up
            </span>

            <form action="" method="POST" class="loginform none">
                <br>
                <input type="text" name="user_id" placeholder="User ID" required />
                <input type="submit" value="Log in" class="primary-bg" />
            </form>

            <form action="" method="POST" class="signupform none">
                <br>
                <input type="text" name="name" placeholder="Your name" required />
                <input type="submit" value="Sign up" class="primary-bg" />
            </form>
        <?php
        }
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
        <br />
        <a class="loginbtn" href="all">All transactions</a>
        <br />
    </section>

</body>

</html>