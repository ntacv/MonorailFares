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

        <p>Sascha</p>
        <?php
        $weight = array("1 lb", "3 lb", "5 lb", "10 lb", "> 10 lb");
        $category = array("A", "B", "C", "D");
        $rates = array(
            array(1.00, 1.50, 1.65, 1.85),
            array(1.58, 2.00, 2.40, 3.05),
            array(1.71, 2.52, 3.10, 4.00),
            array(2.04, 3.12, 4.00, 5.01),
            array(2.52, 3.75, 5.10, 7.25)
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

                <?php
                echo "<table>";
                echo "<tr>";
                echo "<th>Weight/Category</th>";
                for ($i = 0; $i < count($category); $i++) {
                    echo "<th>" . $category[$i] . "</th>";
                }
                echo "</tr>";

                for ($rows = 0; $rows < count($rates); $rows++) {
                    echo "<tr>";
                    echo "<td>" . $weight[$rows] . "</td>";
                    for ($col = 0; $col < count($rates[$rows]); $col++) {
                        echo "<td>" . $rates[$rows][$col] . "</td>";
                    }
                    echo "</tr>";
                }
                echo "</table>";
                ?>


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