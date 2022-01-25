<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="css/registercss.css">
        <script defer src="http://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    </head>
    <style>.footer {
            background: #634a4a;
            margin-top: 0px;
            height: 200px;
        }

        .footertext {
            font-size: 20px;
            text-align: center;
            line-height: 180px;
        }</style>
    <body>
    <div class="container" style="background-image: url(foto/back.jpg);height: 20cm">
        <div class="navbar">
            <div class="logo">
                <a href="index.php"><img src="foto/logo.png" alt="Logo" style="width:250px; height:70px;margin-left: 150px"></a>
            </div>
            <div class="registerform">
                <section class="signupForm">
                    <form action="includes/signup.inc.php" method="post">
                        <br>
                        <h1>Register</h1><br>
                        <p>Please fill in this form to create an account.</p>
                        <br>
                        <label for="name"><b>Name & Surname</b></label>
                        <input type="text" placeholder="Enter Name & Surname" name="name" required>

                            <label for="email"><b>Email</b></label>
                            <input type="email" placeholder="Enter Email" name="email" required>

                                <label for="psw"><b>Password</b></label>
                                <input type="password" placeholder="Enter Password" name="psswrd" required>

                                    <label for="psw-repeat"><b>Repeat Password</b></label>
                                    <input type="password" placeholder="Repeat Password" name="repsswrd" required>

                                        <label>
                                            <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
                                        </label>
                                        <div class="clear">
                                            <button type="submit" name="submit" class="registerbutton">Register</button></a>
                                            <a href="index.php"><button type="button" class="cancelbutton">Cancel</button></a>

                                        </div>
                                        </form>
                                        <?php
                                        if (isset($_GET["error"])) {
                                            if ($_GET["error"] == 'emptyinput') {
                                                echo "<p>Fill all the input boxes</p>";
                                            } else if ($_GET["error"] == 'invalidEmail') {
                                                echo "<p>Invalid Email</p>";
                                            } else if ($_GET["error"] == 'pswrdNoMatch') {
                                                echo "<p>Password is not equal to repeat password</p>";
                                            } else if ($_GET["error"] == 'emailInUse') {
                                                echo "<p>Email in use</p>"; #not good for security
                                            } else if ($_GET["error"] == 'stmtFail') {
                                                echo "<p>Something went wrong</p>";
                                            } else if ($_GET["error"] == 'none') {
                                                echo "<p>Signup successful</p>";
                                            }
                                        }
                                        ?>
                                        </section>
                                        </div>
                                        </div>
                                        </div>
                                        <div class="footer">
                                            <p class="footertext" style="color: black;">Copyright &copy; BiletBiz 2021</p>
                                            <?php
                                            include_once 'footer.php'
                                            ?>
                                        </div>
                                        </body>

                                        </html>