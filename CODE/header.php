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
<body>
    <div class="container">
    <div class="navbar">
        <ul>
          <li><a href="#">Concert</a> </li>
          <li><a href="#">Cinema</a> </li>
          <li><a href="#">Theatre</a> </li>
        </ul>
        <div class="searchbox">
          <input class="searchtxt" type="text" name="" placeholder="Search...">
          <a class="searchbutton" href="#"><i class="fas fa-search"></i></a>
        </div>
        <div class="logo">
            <a href="index.php"><img src="foto/logo.png" alt="Logo" style="width:250px; height:70px;"></a>
        </div>
        <?php
        if(isset($_SESSION["uid"])){
            echo  "<li><a href=''>profile</a></li>";
            echo "<li><a href='includes/logout.inc.php'>Log out</a></li>";
        }
        else{
            echo  '<!--Logn-->
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
            <a href="signup.php" class="btn btn-warning">Register</a>
          </ul>
        </div>';
            
        }
    ?>

      </div>
    </div>