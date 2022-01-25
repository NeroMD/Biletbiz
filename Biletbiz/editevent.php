<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Event</title>
    <link rel="stylesheet" href="css/event.css">
        <script defer src="http://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    </head>
    <style>
        .container {
            background-image: url(back.jpg);
            background-size: 100% 100%;
            height: 40cm;
        }

         

        .bttn {
            background-color: #5c3737;
            color: white;
            padding: 9px 20px;
            border-radius: 5px;
            cursor: pointer;
            width: 15%;
            opacity: 0.9;

        }

        #popup,
        #popup1,
        #popup2,
        #popup3,
        #popup4,
        #popup5,
        #popup6 {
            position: fixed;
            background: #eee9e9;
            transition: 0.5s;
            top: -100%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 1000;
            width: 350px;
            height: 200px;
            padding: 80px 50px 50px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 08);
            visibility: hidden;
        }

        #popup.active,
        #popup1.active,
        #popup2.active,
        #popup3.active,
        #popup4.active,
        #popup5.active,
        #popup6.active {
            visibility: visible;
            top: 50%;
        }

        #popup.content,
        #popup1.content,
        #popup2.content,
        #popup3.content,
        #popup4.content,
        #popup5.content,
        #popup6.content {
            position: relative;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;

        }

        #popup .content .inputbox,
        #popup1 .content .inputbox,
        #popup2 .content .inputbox,
        #popup3 .content .inputbox,
        #popup4 .content .inputbox,
        #popup5 .content .inputbox,
        #popup6 .content .inputbox {
            position: relative;
            width: 95%;
            margin-top: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        #popup .content .inputbox input,
        #popup1 .content .inputbox input,
        #popup2 .content .inputbox input,
        #popup3 .content .inputbox input,
        #popup4 .content .inputbox input,
        #popup5 .content .inputbox input,
        #popup6 .content .inputbox input {
            width: 1000%;
            border: 1px solid;
            border-radius: 5px;
            padding: 15px;
            outline: none;
            font-size: 18px;
        }

        #popup .content .inputbox a,
        #popup1 .content .inputbox a,
        #popup2 .content .inputbox a,
        #popup3 .content .inputbox a,
        #popup4 .content .inputbox a,
        #popup5 .content .inputbox a,
        #popup6 .content .inputbox a {
            background-color: rgb(80, 53, 53);
            color: rgb(245, 245, 245);
            margin-left: 10px;
        }

        .close {
            position: absolute;
            top: 30px;
            right: 30px;
            cursor: pointer;

        }
        input[type=text],
        input[type=number],
        input[type=date] {
            width: 60%;
            padding: 15px;
            margin: 5px 0 22px 0;
            display: inline-block;
            border: 1px solid rgb(58, 56, 59);
            background: #f1f1f1;
            border-radius: 5px;

        }

        input[type=text]:focus,
        input[type=number]:focus,
        input[type=date]:focus {
            background-color: #ddd;
            outline: none;
        }
    </style>
    <?php
    session_start();
    if ($_SESSION["isCompany"] == 1 && isset($_GET["ID"])) {
        require_once 'includes/dbh.inc.php';

        $sql = "SELECT * FROM event where idEvent=? ;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "STMT FAIL";
        }

        mysqli_stmt_bind_param($stmt, "i", $_GET["ID"]);
        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($resultData);
    }
    ?>
    <body>
    <div class="container" style="background-image: url(foto/back.jpg);height: 48cm">
        <!--Navbar-->
        <div class="navbar">
            <div class="logo" style="margin-left: 700px">
                <a href="companypage.php"><img src="foto/logo.png" alt="Logo" style="width:250px; height:70px;"></a>
            </div>
            <!--Event Form-->
            <div class="eventform">
                <br>
                <h1>Edit Event</h1>



                <!---->
                <br>
                <label for="name"><b>Event Name</b></label>
                <?php echo'<input type="text" placeholder="' . $row["EventName"] . '" name="name" disabled>'; ?>
                <button type="submit" class="bttn" onclick="popup1Toggle();">Edit</button>
                
                <div id="popup1">
                    <div class="content">
                        <center><form action="includes/nameUpdate.inc.php"></form>
                            <input type="text" placeholder="Enter Event Name" style="width: 180px;" name="email"
                                   required><?php
                                       echo '<input type="hidden" name="ID" value="' . $_GET["ID"] . '">';
                                       ?>
                                <div class="bttn">
                                    <a href="#" style="color:white; font-size: 15px;text-decoration: none;">Update</a>
                                </div></form>
                                <a class="close" onclick="popup1Toggle();"><img src="foto/exit.png"
                                                                                style="width: 15px;height: 15px; margin-left: 50px"></a>
                        </center>
                    </div>
                </div>
                <!---->

                <label for="date"><b>Event Date</b></label>

                <?php echo'<input type="text" placeholder="' . $row["EventDate"] . '" name="text" disabled>'; ?>
                <button type="submit" class="bttn" onclick="popup2Toggle();">Edit</button>
                <div id="popup2">
                    <div class="content">
                        <center><form action="includes/dateUpdate.inc.php" method="post">
                                <input type="date" placeholder="Enter Date" style="width: 180px;" name="email" required><?php
                                    echo '<input type="hidden" name="ID" value="' . $_GET["ID"] . '">';
                                    ?>
                                    <div class="bttn">
                                        <a href="#" style="color:white; font-size: 15px;text-decoration: none;">Update</a>
                                    </div></form>
                            <a class="close" onclick="popup2Toggle();"><img src="foto/exit.png"
                                                                            style="width: 15px;height: 15px;"></a>
                        </center>
                    </div>
                </div>
                <!---->

                <label for="number"><b>Event Price</b></label>
                <?php echo'<input type="number" placeholder="' . $row["TicketPrice"] . 'TL" name="name" disabled>' ?>
                <button type="submit" class="bttn" onclick="popup3Toggle();">Edit</button>
                <div id="popup3">
                    <div class="content">
                        <center><form action="includes/priceUpdate.inc.php" method="post">
                                <input type="number" placeholder="Enter Event Price" style="width: 180px;" name="email"
                                       required><?php
                                           echo '<input type="hidden" name="ID" value="' . $_GET["ID"] . '">';
                                           ?>
                                    <div class="bttn">
                                        <a href="#" style="color:white; font-size: 15px;text-decoration: none;">Update</a>
                                    </div></form>
                            <a class="close" onclick="popup3Toggle();"><img src="foto/exit.png"
                                                                            style="width: 15px;height: 15px;"></a>
                        </center>
                    </div>
                </div>

                <!---->

                <label for="name"><b>Event Description</b></label>
                <?php echo'<input type="text" placeholder="' . $row["EventDescription"] . '" name="name" disabled>'; ?>
                <button type="submit" class="bttn" onclick="popup4Toggle();">Edit</button>
                <div id="popup4">
                    <div class="content">
                        <center><form action="includes/descUpdate.inc.php" method="post">
                                <input type="text" placeholder="Enter Event Description" name="name" required><?php
                                    echo '<input type="hidden" name="ID" value="' . $_GET["ID"] . '">';
                                    ?>
                                    <div class="bttn">
                                        <a href="#" style="color:white; font-size: 15px;text-decoration: none;">Update</a>
                                    </div></form>
                            <a class="close" onclick="popup4Toggle();"><img src="foto/exit.png"
                                                                            style="width: 15px;height: 15px;"></a>
                        </center>
                    </div>
                </div>
                <!---->

                <label for="name"><b>Event Location</b></label>
                <?php echo'<input type="text" placeholder="' . $row['EventLocation'] . '" name="name" disabled>'; ?>
                <button type="submit" class="bttn" onclick="popup5Toggle();">Edit</button>
                <div id="popup5">
                    <div class="content">
                        <center>
                            <form action="includes/locUpdate.inc.php" method="post">
                                <input type="text" placeholder="Enter Event Location" name="name" required><?php
                                    echo '<input type="hidden" name="ID" value="' . $_GET["ID"] . '">';
                                    ?>
                                    <div class="bttn">
                                        <a href="#" style="color:white; font-size: 15px;text-decoration: none;">Update</a>
                                    </div></form>
                            <a class="close" onclick="popup5Toggle();"><img src="foto/exit.png"
                                                                            style="width: 15px;height: 15px;"></a>
                        </center>
                    </div>
                </div>
                <!---->

                <label for="number"><b>Event Capacity</b></label>
                <?php echo'<input type="number" placeholder="' . $row["EventCapacity"] . '" name="name" disabled>'; ?>
                <button type="submit" class="bttn" onclick="popup6Toggle();">Edit</button>
                <div id="popup6">
                    <div class="content">
                        <center>
                            <form action="includes/capacityUpdate.inc.php" method="post">
                                <input type="number" placeholder="Enter Event Capacity" style="width: 180px;"
                                       name="email" required><?php
                                           echo '<input type="hidden" name="ID" value="' . $_GET["ID"] . '">';
                                           ?>
                                    <div class="bttn">
                                        <a href="#" style="color:white; font-size: 15px;text-decoration: none;">Update</a>
                                    </div></form>
                            <a class="close" onclick="popup6Toggle();"><img src="foto/exit.png"
                                                                            style="width: 15px;height: 15px;"></a>
                        </center>
                    </div>
                </div>
                <!---->
                <br><br>
                <form action="">
                    <p>
                    <center>Can the event be purchased?<center>
                            </p><br>
                            <input type="radio" id="yes" name="fav_language" value="Yes" required>
                                <label for="yes">Yes</label>
                                <input type="radio" id="no" name="fav_language" value="No" style="margin-left: 20px;" required>
                                    <label for="no">No</label><br>

                                    <br>

                                    <p>Is there a seat available?</p><br>
                                    <input type="radio" id="yes1" name="seat" value="Yes1" required>
                                        <label for="yes1">Yes</label>
                                        <input type="radio" id="no1" name="seat" value="No1" style="margin-left: 20px;" required>
                                            <label for="no1">No</label><br>
                                            <br>
                                            <input type="radio" id="vip" name="vip" value="vip" style="margin-left: 20px;">
                                                <label for="vip">VIP Ticket</label><br>
                                                </form><br>
                                                <a href="listEvent.php"><button type="submit" class="button">Save Change</button></a>
                                                </form>
                                                <script>
                                                    function popupToggle() {
                                                        const popup = document.getElementById('popup');
                                                        popup.classList.toggle('active')
                                                    }
                                                    function popup1Toggle() {
                                                        const popup1 = document.getElementById('popup1');
                                                        popup1.classList.toggle('active')
                                                    }
                                                    function popup2Toggle() {
                                                        const popup2 = document.getElementById('popup2');
                                                        popup2.classList.toggle('active')
                                                    }
                                                    function popup3Toggle() {
                                                        const popup3 = document.getElementById('popup3');
                                                        popup3.classList.toggle('active')
                                                    }
                                                    function popup4Toggle() {
                                                        const popup4 = document.getElementById('popup4');
                                                        popup4.classList.toggle('active')
                                                    }
                                                    function popup5Toggle() {
                                                        const popup5 = document.getElementById('popup5');
                                                        popup5.classList.toggle('active')
                                                    }
                                                    function popup6Toggle() {
                                                        const popup6 = document.getElementById('popup6');
                                                        popup6.classList.toggle('active')
                                                    }
                                                </script>
                                                </div>
                                                </div>
                                                </div>

                                                <!--Footer-->
                                                <div class="footer">
                                                    <p class="footertext">Copyright &copy; BiletBiz 2021</p>
                                                </div>
                                                </body>

                                                </html>