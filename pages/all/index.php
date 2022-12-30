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


    <section class="max-w-sm m-auto">
        <br /><br />
        <h1 class="text-4xl">
            <span class="material-icons bigIcon">
                directions_railway
            </span>All transactions
        </h1>
        <p>This page is for admin users</p>
        <br>
        <a class="loginbtn" href="../">Home</a>
        <br>
        <br>
        <form action="" method="get">
            <input type="text" name="search_input" placeholder="Search...">

            <input type="submit" value="Search" class="primary-bg" />
        </form>


        <?php
        if (isset($_GET['search_input'])) { //check if form was submitted
            $input = $_GET['search_input']; //get input text
            $message = "<p>You searched for: " . $input . "</p>";
        }
        ?>


        <?php

        // Creating database connection
        $conn = new mysqli('localhost', 'root', '', 'monorail_fares');

        // Check connection
        if ($conn == false) {
            die("ERROR: Connection failed: " . $conn->connect_error);
        }


        $sql = "SELECT * FROM users";
        if ($result = $conn->query($sql)) {
            echo "<h1>Users</h1>";
            while ($row = $result->fetch_array()) {
                print_r($row);
                echo "<br>";
                //$result->free();
            }
        }
        echo "<br>";

        $sql = "SELECT * FROM transactions";
        if ($result = $conn->query($sql)) {
            echo "<h1>Transactions</h1>";
            while ($row = $result->fetch_array()) {
                print_r($row);
                echo "<br>";
                //$result->free();
            }
        }
        echo "<br>";

        $sql = "SELECT * FROM orders";
        if ($result = $conn->query($sql)) {
            echo "<h1>Orders</h1>";
            while ($row = $result->fetch_array()) {
                print_r($row);
                echo "<br>";
                //$result->free();
            }
        }
        echo "<br>";

        // SQL command
        $sql = "SELECT * FROM orders"; //WHERE users.name LIKE '%$input%'";

        if ($result = $conn->query($sql)) {
            if ($result->num_rows > 0) {
                echo "<table>";
                echo "<tr>";
                echo "<th>id</th>";
                echo "<th>name</th>";
                echo "<th>email</th>";
                echo "<th>birthdate</th>";
                echo "</tr>";
                while ($row = $result->fetch_array()) {
                    echo "<tr>";
                    echo "<td>" . $row['order_id'] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
                // Free result set
                $result->free();
            } else {
                echo "No records matching your query were found.";
            }
        }
        // Close connection
        $conn->close();

        ?>

    </section>

</body>

</html>