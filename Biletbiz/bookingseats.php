<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bookingseat.css">
    <title>Booking Seat</title>
    <style>
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
        </div>
        <div class="partpage">
            <div class="sol">
                <select id="categories" class="price" required>
                    <option>Select Category of Seats</option>
                    <option>Category 1 - 250.00TL</option>
                    <option>Category 2 - 200.00TL</option>
                    <option>Category 3 - 175.00TL</option>
                    <option>Category 4 - 150.00TL</option>
                    <option>Category 5 - 125.00TL</option>
                </select>

                <select id="people" class="adet" name="AA" required>
                    <option>Select Number Of People</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>

                <div class="login">
                    <ul class="login">
                        <br><br>
                        <a class="button1" onclick="popupToggle();">Next</a>
                        <div id="popup">
                            <div class="content">
                                <img src="user.png" style="margin-left: 100px;">
                                <br>
                                <label for="email"><b>Email</b></label>
                                <input type="text" placeholder="Enter Email" name="email" required>
                                <label for="psw"><b>Password</b></label>
                                <input type="password" placeholder="Enter Password" name="psw" required><br><br>
                                <div class="buton">
                                    <a href="payment.html"
                                        style="color:black; font-size: 25px;margin-left:5px;">Login</a>
                                </div><br><br>
                                <a href="forgotpassword.html" style="color:black; font-size: 20px; float:right">Forgot
                                    Password?</a>
                            </div>
                            <a class="close" onclick="popupToggle();"><img src="exit.png"
                                    style="width: 15px;height: 15px;"></a>
                            <a class="close" onclick="popupToggle();"><img src="exit.png"
                                    style="width: 15px;height: 15px;"></a>
                        </div>
                        <script>
                            function popupToggle() {
                                const popup = document.getElementById('popup');
                                popup.classList.toggle('active')
                            }
                        </script>
                    </ul>
                </div>

            </div>
            <div class="sag">
                <div class="seatsimage">
                    <img src="seats.png" style="height: 400px;">
                </div>
            </div>

        </div>

        <div class="footer">
            <p class="footertext">Copyright &copy; BiletBiz 2021</p>
        </div>
    </div>

</body>

</html>