<!DOCTYPE html>
<html lang="en">
    <?php
    session_start();
    include_once 'includes/Event.inc.php';
    include_once 'includes/dbh.inc.php';
    ?>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bookingseat.css">
        <title>Booking Seat</title>
    </head>
    <style>
        button {
            background-color: #374d45;
            color: white;
            padding: 14px 20px;
            margin-left: 60px;
            border-radius: 5px;
            cursor: pointer;
            width: 50%;
            opacity: 0.9;
        }

        button:hover {
            opacity: 1;
        }
    </style>
    <body>
    <div class="container">
        <div class="navbar">
            <div class="logo">
                <a href="includes/indexer.inc.php"><img src="foto/logo.png" alt="Logo" style="width:250px; height:70px;"></a>

            </div>
        </div>
        <div class="partpage">
            <div class="sol"><?php 
            if (isset($_POST["submit"])&& $_POST["type"]=="std") {
                echo '<form action="includes/bookingseat.inc.php" method="post">';
                    
                    $p = 4;
                    
                        for ($l = 0; $l < $_POST["AA"]; $l++) {

                            echo "<select id='categories' name='seat[]' class='price' required>";


                            $arr = remainingSeats($conn, $_POST["ID"]);

                            for ($x = 0; $x < count($arr); $x++) {
                                echo '<option  value=' . $arr[$x] . '>' . $arr[$x] . '</option>';
                            }


                            echo '</select>';
                        }

                        echo '<input type="hidden" name="email" value="' . $_SESSION['uid'] . '">';
                        echo '<input type="hidden" name="eventID" value="' . $_POST["ID"] . '">';
                        if (isset($_POST["ID"])) {
                            echo '<button type="submit" class="button" name="submit">Buy</button>';
                        }
                        echo '</form>'; 
                    }
                    if (isset($_POST["submit"])&& $_POST["type"]=="vip") {
                echo '<form action="includes/bookVipSeat.inc.php" method="post">';
                    
                    $p = 4;
                    
                        for ($l = 0; $l < $_POST["AA"]; $l++) {

                            echo "<select id='categories' name='seat[]' class='price' required>";


                            $arr = remainingVIPSeats($conn, $_POST["ID"]);

                            for ($x = 0; $x < count($arr); $x++) {
                                echo '<option  value=' . $arr[$x] . '>' . $arr[$x] . '</option>';
                            }


                            echo '</select>';
                        }

                        echo '<input type="hidden" name="email" value="' . $_SESSION['uid'] . '">';
                        echo '<input type="hidden" name="eventID" value="' . $_POST["ID"] . '">';
                        if (isset($_POST["ID"])) {
                            echo '<button type="submit" class="button" name="submit">Buy</button>';
                        }
                        echo '</form>'; 
                    }
                    
                    

?>


            </div>
            <div class="sag">
                <div class="seatsimage">
<!--                    <img src="foto/seats.png" style="height: 400px;">-->
                </div>
            </div>

        </div>

        <div class="footer">
            <p class="footertext">Copyright &copy; BiletBiz 2021</p>
        </div>
    </div>

</body>

</html>