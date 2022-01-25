<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
    <link rel="stylesheet" href="css/navbar.css">
        <script defer src="http://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    </head>
    <style>
        
        .dropdown {
            position: relative;
            display: block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #460707;
            min-width: 160px;

        }

        .dropdown-content a {
            color: black;
            padding: 20px 90px;
            text-decoration: underline;
            display: block;
        }

        .dropdown-content a:hover {
            letter-spacing: 1px;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown:hover .dropbtn {
            background-color: #3a1e1e;
        }
    </style>
    <body>

    <div class="navbar" style="background-color: #8b2323;">
        <ul>

            <li><a href="listEvent.php">All Events</a> </li>
        </ul>

        <form action="Search.php" method="post">
            <div class="searchbox" method="post">
                <input class="searchtxt" type="text" name="query" placeholder="Search...">
                    <input class="searchbutton" type="submit" methods="post" href="Search.php"><i class="fas fa-search"></i></input>
            </div>
        </form>



        <div class="logo">
            <a href="includes/indexer.inc.php"><img src="foto/logo.png" alt="Logo" style="width:250px; height:70px;"></a>
        </div>
        <?php
        if (isset($_SESSION["uid"])) {

            echo "<li><a href='includes/logout.inc.php'>Log out</a></li>";
            echo "<li><a href='myticket.php'>MyTickets</a></li>";
            if ($_SESSION["isCompany"] == 1) {
                echo "<li><a href='createEvent.php'>Create Event</a></li>";
                echo "<li><a href='companyEvent.php'>MyEvents</a></li>";
            }
            if ($_SESSION["isAdmin"] == 1) {
                echo "<li><a href='BanUser.php'>BanUser</a></li><li><a href='Approve.php'>Company Request</a></li>";
            }
        } else {
            echo '<!--Logn-->
        <div class="login">
          <ul class="login">
            <a class="button" onclick="popupToggle();">Login</a>
            <div id="popup">
              <div class="content">
                <img src="foto/user.png">
                <section class="signinForm">    
                    <form action="includes/login.inc.php" method="post">

                          <div class="inputbox">
                            <input type="text" placeholder="Enter Email Adress" name="email" required>
                          </div>
                          <div class="inputbox">
                            <input type="password" placeholder="Enter Password" name="psswrd" required>
                          </div>
                          <div class="inputbox">
                              <button class="popbuton" name="submit" type="submit" >Login</button>
                          </div>
                          <a href="forgotpassword.php" style="color:black; font-size: 20px;">Forgot Password?</a>
                        </div>
                        <a class="close" onclick="popupToggle();"><img src="foto/exit.png" style="width: 15px;height: 15px;"></a>
                        </div>
                    </form>

            </section>
            <script>
              function popupToggle() {
                const popup = document.getElementById("popup");
                popup.classList.toggle("active")
              }
            </script>
          </ul>
        </div>
          <div class="login">
        <ul class="login">
          <div class="dropdown">
            <a href="#" class="btn">Register</a>
            <div class="dropdown-content">
              <a href="signup.php" style="font-size: 17px;">Person Register</a>
              <a href="companyRegister.php" style="font-size: 17px;">Company Register</a>
            </div>
          </div>
        </ul>
      </div>
        ';
        }
        ?>

    </div>

</body>