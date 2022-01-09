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

<body>
    <div class="container">
        <div class="navbar">
            <div class="logo">
                <a href="index.php"><img src="foto/logo.png" alt="Logo" style="width:250px; height:70px;"></a>
            </div>
        </div>
        <div class="partpage">
            <div class="sol">
                <form action="includes/bookingseat.inc.php" method="post">
                    <?php $p=4; 
                    if(isset($_POST["submit"])){
                    for($l=0;$l<$_POST["AA"];$l++){
                    
echo "<select id='categories' name='seat[]' class='price' required>";
                    
                    
                    $arr= remainingSeats($conn, $_POST["ID"]);
                    
                    for($x=0;$x<count($arr);$x++){
                        echo '<option  value='.$arr[$x].'>'.$arr[$x].'</option>';
                    }
                   
                    
                   echo '</select>';
                     }
                    
                    echo '<input type="hidden" name="email" value="'.$_SESSION['uid'].'">';
                    echo '<input type="hidden" name="eventID" value="'.$_POST["ID"].'">';
                    if(isset($_POST["ID"])){
                      echo  '<button type="submit" name="submit">buy</button>';
                    }
                    
                    }
                    ?>
                </form>
                

                

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