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
            array(0,1.20,1.60,1.60,1.60,2.10,2.10,2.10,2.50,2.50,2.50),
            array(1.20, 0, 1.20,1.60,1.60,1.60,2.10,2.10,2.10,2.50,2.50),
            array(1.60,1.20,0,1.20,1.20,1.60,1.60,1.60,2.10,2.10,2.50),
            array(1.60,1.60,1.20,0,1.20,1.20,1.20,1.60,1.60,2.10,2.10),
            array(1.60,1.60,1.20,1.20,0,1.20,1.20,1.60,1.60,1.60,2.10),
            array(2.10,1.60,1.60,1.20,1.20,0,1.20,1.20,1.60,1.60,2.10),
            array(2.10,2.10,1.60,1.20,1.20,1.20,0,1.20,1.20,1.60,1.60),
            array(2.10,2.10,1.60,1.60,1.60,1.20,1.20,0,1.20,1.20,1.60),
            array(2.50,2.10,2.10,1.60,1.60,1.60,1.20,1.20,0,1.20,1.60),
            array(2.50,2.50,2.10,2.10,1.60,1.60,1.60,1.20,1.20,0,1.20),
            array(2.50,2.50,2.50,2.10,2.10,2.10,1.60,1.60,1.60,1.20,0)
        );
        ?>



        <form action="Ex4-3Result.php" method="get">
            <br />
            <h3>Choose your trip</h3>
            <br />

            <input type="radio" name="trip" value="1" checked> One-way
            <input type="radio" name="trip" value="2"> Round-trip


            <h3>From</h3>
            <select name='selectWeight' required>
                <option value=''>Select weight...</option>
                <?php
                for ($i = 0; $i < count($weight); $i++) {
                    echo "<option value='$i'>" . $weight[$i] . "</option>";
                }
                ?>
            </select>
            <br /><br />

            To
            <select name='selectCategory' required>
                <option value=''>Select category...</option>
                <?php
                for ($y = 0; $y < count($category); $y++) {
                    echo "<option value='$y'>" . $category[$y] . "</option>";
                }
                ?>
            </select>
            <br /><br />
            <h3>Discount</h3>
            <select name='selectWeight'>
                <option value=''>Select a discount...</option>
                <?php
                for ($i = 0; $i < count($weight); $i++) {
                    echo "<option value='$i'>" . $weight[$i] . "</option>";
                }
                ?>
            </select>
            <br />
            <br /><br />
            <input type="submit" value="Submit" class="primary-bg" />
        </form>



        <details>
            <summary>Show fule fares</summary>
            <p>
                Table
                <table>
                    <tr>
                        <th>From/To</th>
                        <?php
                            //echo "<table>";
                            //echo "<tr>";
                            //echo "<th>From/To</th>";
                            for ($i = 0; $i < count($stations); $i++) {
                                echo "<td>" . $stations[$i] . "</td>";
                            }
                            //echo "</tr>";
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
                        //echo "</table>";
                    ?>
                </table>


            </p>
        </details>


        <div class="wrapper d-flex">
            <div class="custom-control custom-radio iconSelect mr-2">
                <input type="radio" id="customRadio1" name="customRadio" value="1" class="custom-control-input" checked>
                <label class="custom-control-label" for="customRadio1">
                    email
                </label>
            </div>

            <div class="custom-control custom-radio iconSelect ml-2">
                <input type="radio" id="customRadio2" name="customRadio" value="2" class="custom-control-input">
                <label class="custom-control-label" for="customRadio2">
                    phone
                </label>
            </div>
        </div>


    </section>

</body>

</html>