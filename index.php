<?php
session_start();

$page = "main";
$error = "";
?>
<!DOCTYPE html>
<html>

<head>
    <title>KL Monorail Fares</title>

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/toggleButton.css">

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="include/script.js"></script>

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@200;400;700&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>


<body>

    <?php
    //log in function
    if (isset($_POST['user_id']) && isset($_POST['user_name'])) {


        $id = $_POST['user_id'];
        $name = $_POST['user_name'];
        // Creating database connection
        $conn = new mysqli("localhost", "root", "", "monorail_fares");

        // Checking connection
        if ($conn == false) {
            die("ERROR: Could not connect. " . $conn->connect_error);
        }

        $sql = "SELECT * FROM users WHERE user_id = $id";

        if ($conn->query($sql) == true) {
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            if ($row != null) {
                //echo print_r($row);

                if ($row['name'] == $name) {

                    //echo "Welcome back " . $name . "! User id is " . $id;
                    header("Location: pages/form");

                    $_SESSION['user_id'] = $_POST['user_id'];
                    $id = $_SESSION["user_id"];
                    $_SESSION['user_name'] = $_POST['user_name'];
                    $name = $_SESSION["user_name"];
                } else {
                    $error = "User name does not match. Please try again.";
                }
            } else {
                $error = "User ID not defined. Please try again or log in.";
            }
        } else {
            $error = "ERROR: Could not able to execute $sql. " . $conn->error;
        }
    }


    ?>

    <section class="max-w-sm m-auto">
        <br /><br />
        <h1 class="text-4xl">
            <span class="material-icons bigIcon">
                directions_railway
            </span>KL Monorail fares
        </h1>


        <?php
        include "includes/menu.php";
        ?>
        <br />


        <form action="" method="POST" class="loginform 
        <?php if (isset($_SESSION['user_id'])) echo "none"; ?>">
            <input type="text" name="user_id" placeholder="User ID" required autofocus class="login_input_id w-1/5" pattern="\d*" maxlength="4">

            <input type="text" name="user_name" placeholder="Username" required />
            <input type="submit" value="Log in" class="primary-bg" />
            <br>
        </form>
        <?php

        //check if session is set
        if (isset($_SESSION['user_name'])) {
            echo "<h3>Username: <span class='primary-color'>" . $_SESSION['user_name'] . "</span> <br>User ID: <span class='primary-color'>" . $_SESSION['user_id'] .
                "</span></h3><h3>You will need your user id to connect again. </h3>";
        } else {
            echo $error;
        }
        ?>
        <br>
        <p>
            You can use this website to calculate the fare for your Kuala Lumpur Monorail trip. You can log in to have history of your trips.
            <br>
            <a href="pages/form">
                <span class="loginbtn">
                    <span class="material-icons">
                        attach_money
                    </span>Simulate
                </span>
            </a>
        </p>
        <?php
        include "includes/fares.php";
        ?>

        <a class="loginbtn" href="pages/all">
            <span class="material-icons">
                clear_all
            </span>
            All transactions</a>
        <br />
        <br />
    </section>

</body>

</html>