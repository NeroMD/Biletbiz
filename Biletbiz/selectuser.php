<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select User</title>
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
            margin-left: 530px;
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
            background-color: #491a1a;
            color: white;
            padding: 14px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 30%;
            height: 120px;
            opacity: 0.9;

        }

        button:hover {
            opacity: 10;
            transition: 0.5s;
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

        .popbuton {
            background-color: #9aa3a0;
            color: white;
            padding: 14px 20px;
            position: relative;
            margin-left: 50px;
            border: none;
            cursor: pointer;
            width: 5px;
            opacity: 0.9;
        }

        .popbuton:hover {
            opacity: 5;
            letter-spacing: 3px;
        }

        #popup {
            position: fixed;
            background: #eee9e9;
            transition: 0.5s;
            top: -100%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 1000;
            width: 350px;
            height: 450px;
            padding: 80px 50px 50px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 08);
            visibility: hidden;
        }

        #popup.active {
            visibility: visible;
            top: 50%;
        }

        #popup.content {
            position: relative;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        #popup .content img {
            width: 150px;
            height: 150px;
            margin-left: 100px;

        }

        #popup .content .inputbox {
            position: relative;
            width: 100%;
            margin-top: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        #popup .content .inputbox input {
            width: 1000%;
            border: 1px solid;
            border-radius: 5px;
            padding: 15px;
            outline: none;
            font-size: 18px;
        }

        #popup .content .inputbox a {
            background-color: rgb(80, 53, 53);
            color: rgb(245, 245, 245);
            margin-left: 10px;
        }

        .button1 {
            color: rgb(0, 0, 0);
            text-decoration: none;
            font-size: 20px;
            padding: 6px 3px;
            font-family: Lobster Two;
        }

        .close {
            position: absolute;
            top: 30px;
            right: 30px;
            cursor: pointer;

        }

        .popbuton {
            background-color: #9aa3a0;
            color: white;
            padding: 14px 20px;
            position: relative;
            margin-left: 50px;
            border: none;
            cursor: pointer;
            width: 5px;
            opacity: 0.9;
        }

        .popbuton:hover {
            opacity: 5;
            letter-spacing: 3px;
        }

        #popup1 {
            position: fixed;
            background: #eee9e9;
            transition: 0.5s;
            top: -100%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 1000;
            width: 350px;
            height: 450px;
            padding: 80px 50px 50px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 08);
            visibility: hidden;
        }

        #popup1.active {
            visibility: visible;
            top: 50%;
        }

        #popup1.content {
            position: relative;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        #popup1 .content img {
            width: 150px;
            height: 150px;
            margin-left: 100px;
        }

        #popup1 .content .inputbox {
            position: relative;
            width: 100%;
            margin-top: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        #popup1 .content .inputbox input {
            width: 1000%;
            border: 1px solid;
            border-radius: 5px;
            padding: 15px;
            outline: none;
            font-size: 18px;
        }

        #popup1 .content .inputbox a {
            background-color: rgb(80, 53, 53);
            color: rgb(245, 245, 245);
            margin-left: 10px;
        }

        input[type=text],
        input[type=password] {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            display: inline-block;
            border: none;
            background: #f1f1f1;
        }

        input[type=text]:focus,
        input[type=password]:focus {
            background-color: #ddd;
            outline: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="navbar">
            <div class="logo">
                <a href="index.html"><img src="logo.png" alt="Logo" style="width:250px; height:70px;"></a>
            </div>

            <div class="clear"><br><br>
                <a href="#">
                    <center><button type="submit" class="button" onclick="popupToggle();"
                            style="margin-top: 60px;">Personal Login</button>
                </a></center><br>
                <a href="#">
                    <center><button type="submit" class="button" onclick="popup1Toggle();">Company Login</button>
                </a></center>
            </div>
        </div>


        <div class="login">
            <ul class="login">
                <div id="popup">
                    <div class="content">
                        <img src="user.png">
                        <br>
                        <form action="">
                            <label for="email"><b>E-mail</b></label>
                            <input type="text" placeholder="Enter Email" name="email" required>
                            <label for="psw"><b>Password</b></label>
                            <input type="password" placeholder="Enter Password" name="psw" required><br><br>
                            <a href="personalpage.html"><button type="submit"
                                    style="margin-left: 100px;width: 150px; height: 50px;">Login</button></a>
                        </form>
                        <br><br>
                        <a href="forgotpassword.html" style="color:black; font-size: 20px; float:right">Forgot
                            Password?</a>
                    </div>
                    <a class="close" onclick="popupToggle();"><img src="exit.png" style="width: 15px;height: 15px;"></a>
                </div>

                <script>
                    function popupToggle() {
                        const popup = document.getElementById('popup');
                        popup.classList.toggle('active')

                    }
                </script>
            </ul>
        </div>


        <div class="login">
            <ul class="login">
                <div id="popup1">
                    <div class="content">
                        <img src="user.png"><br>
                        <form action="">
                            <label for="email"><b>E-mail</b></label>
                            <input type="text" placeholder="Enter Email" name="email" required>
                            <label for="psw"><b>Password</b></label>
                            <input type="password" placeholder="Enter Password" name="psw" required><br><br>
                            <a href="companypage.html"><button type="submit"
                                    style="margin-left: 100px;width: 150px; height: 50px;">Login</button></a>
                        </form><br><br>
                        <a href="forgotpassword.html" style="color:black; font-size: 20px; float:right">Forgot
                            Password?</a>
                    </div>
                    <a class="close" onclick="popup1Toggle();"><img src="exit.png"
                            style="width: 15px;height: 15px;"></a>
                </div>
                <script>
                    function popup1Toggle() {
                        const popup1 = document.getElementById('popup1');
                        popup1.classList.toggle('active')
                    }
                </script>
            </ul>
        </div>

    </div>
    <div class="footer">
        <p class="footertext">Copyright &copy; BiletBiz 2021</p>
    </div>

</body>

</html>