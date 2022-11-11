<!DOCTYPE html>
<html>

<head>
    <title>KL Monorail Fares</title>

    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>


<body>


    <section class="max-w-5">
        <h3>KL Monorail fares</h3>

    </section>


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



    <form action="Ex4-3Result.php" method="get">
        <br>
        <h3>Shipping Rate Lookup</h3>
        <?php
        echo "Weight:";
        echo "<select name='selectWeight' required>";
        echo "<option value=''>Select weight...</option>";
        for ($i = 0; $i < count($weight); $i++) {
            echo "<option value='$i'>" . $weight[$i] . "</option>";
        }
        echo "</select>";
        echo "<br><br>";

        echo "Category:";
        echo "<select name='selectCategory' required>";
        echo "<option value=''>Select category...</option>";
        for ($y = 0; $y < count($category); $y++) {
            echo "<option value='$y'>" . $category[$y] . "</option>";
        }
        echo "</select>";
        ?>
        <br><br>
        <input type="submit" value="Submit" />
    </form>
</body>

</html>