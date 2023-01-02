<html>

<head>

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/menu.css">


    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@200;400;700&display=swap" rel="stylesheet">
</head>

<body>
    <section class="max-w-sm m-auto">

        <a class="loginbtn" href="
        <?php if (isset($page) && $page == "main") echo "";
        else echo "../";
        ?>
        ">Home</a>

        <a href="pages/form">
            <span class="loginbtn">
                <span class="material-icons">
                    attach_money
                </span>Simulate
            </span>
        </a>
        <?php
        if (isset($_SESSION["user_id"])) {
        ?>
            <a href="includes/logout.php">
                <span class="loginbtn">
                    <span class="material-icons">
                        directions_run
                    </span>Log out
                </span>
            </a>

        <?php
        } else {
        ?>

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
        <?php
        }
        ?>
        <div class="container">
            <details>
                <summary>menu</summary>
                <p class="details">

                <div class="wrapper d-flex" style="zoom:0.8;">
                    <div class="custom-control custom-radio iconSelect mr-2">
                        <input type="radio" id="lang1" name="lang" value="en" class="custom-control-input" checked>
                        <label class="custom-control-label" for="lang1">
                            <span class="labelToggle">EN</span></label>
                    </div>

                    <div class="custom-control custom-radio iconSelect ">
                        <input type="radio" id="lang2" name="lang" value="ml" class="custom-control-input">
                        <label class="custom-control-label" for="lang2">
                            <span class="labelToggle">ML</span></label>
                    </div>
                </div>

                <div class="wrapper d-flex" style="zoom:0.8;">
                    <div class="custom-control custom-radio iconSelect mr-2">
                        <input type="radio" id="light" name="mode" value="light" class="custom-control-input" checked>
                        <label class="custom-control-label" for="light">
                            <span class="labelToggle">Light</span></label>
                    </div>

                    <div class="custom-control custom-radio iconSelect ">
                        <input type="radio" id="dark" name="mode" value="dark" class="custom-control-input">
                        <label class="custom-control-label" for="dark">
                            <span class="labelToggle">Dark</span></label>
                    </div>
                </div>
                </p>
            </details>
        </div>
    </section>
</body>

</html>