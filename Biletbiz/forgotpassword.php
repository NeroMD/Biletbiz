<!DOCTYPE html>
<html lang="en">

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
            height: 16cm;
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
            width: 60%;
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

        .resetpassword {
            width: 450px;
            height: 450px;
            margin: auto;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="navbar">
            <div class="logo">
                <a href="index.php"><img src="foto/logo.png" alt="Logo" style="width:250px; height:70px;"></a>
            </div>
            <div class="resetpassword">
                <br>
                <h1>Forgot Password?</h1>
                <label for="email"><b>Email</b></label><br>
                <form action="passwordresettoken.php" method="post">
                <input type="text" placeholder="Enter Email" name="email" required>
                <div class="clear">

                    <button type="submit" class="registerbutton">Send Code</button>
                </div>
            </div>
            </form>

                    
                </div>
            </div>

        </div>
    </div>
    <div class="footer">
        <p class="footertext">Copyright &copy; BiletBiz 2021</p>
    </div>
</body>

</html>