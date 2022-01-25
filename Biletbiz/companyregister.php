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
    <style>
        .footer {
            background: #634a4a;
            margin-top: 0px;
            height: 200px;
        }

        .footertext {
            font-size: 20px;
            text-align: center;
            line-height: 180px;
        }
    </style>

    <body>
    <div class="container" style="background-image: url(foto/back.jpg);height: 30cm">
        <div class="navbar">
            <div class="logo">
                <a href="index.php"><img src="foto/logo.png" alt="Logo" style="width:250px; height:70px;margin-left: 150px"></a>
            </div>
            <div class="registerform">
                <br><br>
                <h1>Register</h1><br>
                <p>Please fill in this form to create an account.</p>
                <br>
                <form action="includes/regComp.inc.php" method="post">
                    <label for="name"><b>Company Name</b></label>
                    <input type="text" placeholder="Enter Company Name" name="name" required>

                        <label for="email"><b>Company Email</b></label>
                        <input type="text" placeholder="Enter Company Email" name="email" required>

                            <label for="phone"><b>Company Phone Number</b></label><br><br>
                            <input type="text" id="phone" name="phone" placeholder="5xxxxxxxxx"
                                   pattern="[0-9]{10}" required>

                                <label for="adress"><b>Company Address</b></label>
                                <input type="text" placeholder="Enter Company Address" name="adress" required>

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
                                                </form>
                                            </div>
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