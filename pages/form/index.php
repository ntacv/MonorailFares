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
    <?php
    //log in function
    if (isset($_SESSION['user_id']) && isset($_SESSION['user_name'])) {
        $id = $_SESSION['user_id'];
        $name = $_SESSION['user_name'];

        echo "Welcome back " . $name . "! User id is " . $id . "<br>";
        echo "Your order will be saved under this user id.";
    } else {
        echo "you are not logged in.";
    }


    ?>

    <section class="max-w-sm m-auto">
        <br /><br />
        <h1 class="text-4xl">
            <span class="material-icons bigIcon">
                directions_railway
            </span>KL Monorail fares
        </h1>

        <br>
        <?php
        include "../../includes/menu.php";
        ?>
        <?php
        include "../../includes/fares.php";


        if (isset($_post['user_id'])) {
            $user_id = $_post['user_id'];
            echo "<h3>Hello $user_id </h3>";
        }

        ?>

        <form action="./result" method="post">
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
        <br />
    </section>

</body>

</html>