<?php
session_start();
?>
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
        //log out from the session and refresh the page
        if (isset($_REQUEST['logout'])) {
            session_destroy();
            header("Location: ./");
        }

        //log in function
        if (isset($_POST['user_id'])) {
            $_SESSION['user_id'] = $_POST['user_id'];
            $id = $_SESSION["user_id"];
            $_SESSION['user_name'] = $_POST['user_name'];
            $name = $_SESSION["user_name"];

            // Creating database connection
            $conn = new mysqli("localhost", "root", "", "monorail_fares");

            // Checking connection
            if ($conn == false) {
                die("ERROR: Could not connect. " . $conn->connect_error);
            }

            $sql = "SELECT max(user_id) FROM users";

            if ($conn->query($sql) == true) {
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
                echo "row " . print_r($row);
            } else {
                echo "ERROR: Could not able to execute $sql . " . $conn->error;
            }
            echo "<br><br>";

            $sql = "SELECT name FROM users WHERE user_id = $id";

            if ($conn->query($sql) == true) {
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
                echo "row " . print_r($row);
                if ($row['name'] == $name) {
                    //echo "Welcome back " . $name . "! User id is " . $id;
                    //header("Location: pages/form/");
                }
            } else {
                echo "ERROR: Could not able to execute $sql . " . $conn->error;
            }
        }


        //check if session is set
        if (isset($_SESSION['user_name'])) {
            echo "<h3>Hello <span class='primary-color'>" . $_SESSION['user_name'] . "</span>! Your user ID is: <span class='primary-color'>" . $_SESSION['user_id'] . "</span></h3>
            <h3>You will need you user id to connect again. </h3>";
        ?>
            <form action="" method="post">
                <input type="submit" name="logout" value="Log out" class="primary-bg" />
            </form>
            <br>
        <?php
        } else {
            echo "<h3>no session, try to connect</h3><br>";
        }
        ?>
        <a href="pages/form">
            <span class="loginbtn">
                <span class="material-icons">
                    attach_money
                </span>Simulate
            </span>
        </a>
        <span class="loginbtn" onclick="document.querySelector('.loginform').style.display = 'block';">
            <span class="material-icons">
                person
            </span>Log in
        </span>
        <a href="pages/signup">
            <span class="loginbtn">
                <span class="material-icons">
                    person_add
                </span>Sign up
            </span>
        </a>

        <form action="" method="POST" class="loginform none">
            <br>
            <input type="number" name="user_id" placeholder="User ID" required />
            <input type="text" name="user_name" placeholder="Username" required />
            <input type="submit" value="Log in" class="primary-bg" />
        </form>


        <br />
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

        <?php
        include "includes/menu.php";
        ?>
        <br />
        <a class="loginbtn" href="pages/all">All transactions</a>
        <br />
        <br />
    </section>

</body>

</html>