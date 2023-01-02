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

        <br />

        <?php

        //Sign up function
        if (isset($_POST['name'])) {
            $_SESSION['name'] = $_POST['name'];
            $name = $_SESSION["name"];

            // Creating database connection
            $conn = new mysqli("localhost", "root", "", "monorail_fares");

            // Checking connection
            if ($conn == false) {
                die("ERROR: Could not connect. " . $conn->connect_error);
            }

            $sql = "INSERT INTO users (name) VALUES ('$name')";

            if ($conn->query($sql) == true) {
                $last_id = $conn->insert_id;
                //echo "<h3>Hello " . $name . "!</h3>";
            } else {
                echo "ERROR: Could not able to execute $sql . " . $conn->error;
            }
        }
        ?>

        <form action="" method="POST" class="signupform">
            <br>
            <input type="text" name="name" placeholder="Your name" required />
            <input type="submit" value="Sign up" class="primary-bg" />
        </form>

        <br />
        <br />
    </section>

</body>

</html>