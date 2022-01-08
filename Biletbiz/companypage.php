<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="css/stylesheet.css">
    <script defer src="http://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>

</head>

<body>
    <div class="container">
        <div class="navbar">
            <ul>
                <li><a href="createEvent.html">Create Event</a> </li>
                <li><a href="listEvent.html">List Event</a> </li>
            </ul>
            <div class="searchbox">
                <input class="searchtxt" type="text" name="" placeholder="Search...">
                <a class="searchbutton" href="#"><i class="fas fa-search"></i></a>
            </div>
            <div class="logo">
                <img src="logo.png" alt="Logo" style="width:250px; height:70px;">
            </div>
            <div class="logout">
                <ul class="logout">
                    <a class="button" onclick="popupToggle();">Logout</a>
                    <div id="popup">
                        <div class="inputbox">
                            <h2><center>Are you sure?</center></h2>
                        </div>
                        <div class="buton">
                            <a href="index.html" class="buton" style="color: black;font-size: 25px;margin-right: 50px;">Yes</a> 
                            <a href="companypage.html" class="buton" style="color: black;font-size: 25px;">No</a>
                        </div>
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
    </div>
    <div class="footer">
        <p class="footertext">Copyright &copy; BiletBiz 2021</p>
    </div>
</body>

</html>