<!DOCTYPE html>
<html lang="en">
<?php session_start();?>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        .container {
            background-image: url(back.jpg);
            background-size: 100% 100%;

        }

        .container .navbar {
            width: 100%;
            height: 100px;
            background-color: #8b2323;
        }

        .navbar ul {
            float: left;
            margin-right: 20px;
        }

        .navbar .logo {
            display: inline-block;
            margin-left: 620px;
            margin-top: 20px;
            width: 10px;
            height: 70px;
        }

        .footer {
            background: #634a4a;
            height: 180px;
        }

        .footertext {
            font-size: 20px;
            text-align: center;
            line-height: 180px;
        }

        input[type=text] {
            width: 80%;
            padding: 15px;
            margin: 5px 0 22px 0;
            display: inline-block;
            border: none;
            background: #f1f1f1;
            border-radius: 5px;
        }

        input[type=text]:focus {
            background-color: #ddd;
            outline: none;
        }

        h1 {
            margin-bottom: 25px;
            margin-top: 120px;
        }

        button {
            background-color: #374d45;
            color: white;
            padding: 14px 20px;
            margin: 8px 57px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 40%;
            opacity: 0.9;
        }

        button:hover {
            opacity: 1;
        }
        .clear::after {
            content: "";
            clear: both;
            display: table;
        }

         input[type=password] {
            width: 80%;
            padding: 15px;
            margin: 5px 0 22px 0;
            margin-bottom: 20px;
            display: inline-block;
            border: none;
            background: #f1f1f1;
            border-radius: 5px;
        }

        input[type=password]:focus {
            background-color: #ddd;
            outline: none;
        }
         .changepassword {
            width: 450px;
            height: 450px;
            margin: auto;
        }
    </style>
</head>

<body>
<div class="container" style="background-image: url(foto/back.jpg);height: 20cm">
    <div class="navbar">
        <div class="logo">
            <a href="includes/indexer.inc.php"><img src="foto/logo.png" alt="Logo" style="width:250px; height:70px;"></a>
        </div>

        <div class="changepassword">
            <form action="includes/changePass.inc.php" method="post">
            <br>
            <center>
            <h1>Change Password</h1>
            </center>
            <label for="psw"><b>Old Password</b></label><br>
            <center>
            <input type="password" placeholder="Enter Old Password" name="opsw" required><br>
                </center>
                <label for="psw-repeat"><b>New Password</b></label><br>
                <center>
                <input type="password" placeholder="Enter New Password" name="npsw" required>
                <?php
                        echo '<input type="hidden" name="email" value="' . $_SESSION['uid'] . '">';
                        ?>
                    
                    <div class="clear">
                        <button type="submit" name="submit">Change Password</button>
                    </div>
                </form>
                    </center>
                    </div>


                    </div>
                    </div>

                    </div>
                    </div>
                    <div class="footer">
                        <p class="footertext">Copyright &copy; BiletBiz 2021</p>
                    </div>
                    </body>

                    </html>