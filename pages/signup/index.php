<?php
session_start();

include "../../includes/sql_request.php";
?>
<!DOCTYPE html>
<html>

<head>
    <title>KL Monorail Fares</title>

    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/toggleButton.css">

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
        <?php
        include "../../includes/menu.php";
        ?>
        <br>

        <h2 class="text-xl">Create an account</h2>
        <br>
        <form action="" method="POST" class="signupform">
            <input type="text" name="name" placeholder="Your name" required autofocus />
            <input type="submit" value="Sign up" class="primary-bg" />
        </form>
        <br>
        <?php
        //Sign up function
        if (isset($_POST['name'])) {
            $_SESSION['name'] = $_POST['name'];
            $name = $_SESSION["name"];

            $sql = "SELECT name FROM users WHERE name = '$name'";

            $result = $conn->query($sql);
            if ($result == true) {
                $input_name = $result->fetch_assoc();
                if ($input_name != null) {
                    echo "Sorry username already used, please try another one";
                    echo "<br>";
                } else {

                    $sql = "INSERT INTO users (name) VALUES ('$name')";
                    $result = $conn->query($sql);
                    $last_id = $conn->insert_id;
                    $_SESSION['user_name'] = $name;
                    $_SESSION['user_id'] = $last_id;
                    echo "Your account has been created. ";
                    //echo "Your account <span class='primary-color'>" . $name . "</span> has been created. Your user ID is <span class='primary-color'>" . $last_id . "</span>";
                    echo "<br>";
                }
            } else {
                echo "ERROR: Could not able to execute $sql . " . $conn->error;
            }
        }
        if (isset($_SESSION['user_id']) && isset($_SESSION['user_name'])) {
            echo "You are logged in as <span class='primary-color'>" . $_SESSION['user_name'] . "</span> with <span class='primary-color'>" . $_SESSION['user_id'] . "</span> as user ID";
        ?>
            <br><br>
            <a class="loginbtn" href="../../">
                <span class="material-icons">
                    home
                </span>Home
            </a>
        <?php
        }
        ?>

        <br />
        <br />
    </section>

</body>

</html>