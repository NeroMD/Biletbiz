<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About The Event</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        .container {
            background-image: url(back.jpg);
            background-size: 100% 100%;
            height: 20cm;
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
            margin-left: 550px;
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

        .part {
            border: 1px solid black;
            border-radius: 5px;
            width: 600px;
            height: 400px;
            margin-top: 20px;
        }

        .part1 {

            width: 500px;
            height: 300px;

        }

        #people.adet {
            margin-top: 10px;
            border: 1px solid #b1b1b1;
            height: 40px;
            background: #5c3737;
            font-size: 14px;
            border-radius: 9px;
            font-weight: bold;
            color: #ffffff;

        }

        button {
            background-color: #5c3737;
            color: white;
            padding: 9px 20px;
            margin-left: 60px;
            border-radius: 5px;
            cursor: pointer;
            width: 15%;
            opacity: 0.9;
        }

        button:hover {
            opacity: 1;
        }
    </style>
</head>
<?php
include_once 'header.php';
?>
<body>
    <div class="container">
        <br><br>
        <h2>
            <center>About The Event</center>
        </h2><br>
        <center>
        <?php


if(isset($_GET["ID"])){
    
    require_once 'includes/dbh.inc.php';
    require_once 'includes/Event.inc.php';
    $row = EventDetail($conn, $_GET["ID"]);
    $remain= remainingCapacity($conn, $_GET["ID"]);
    echo '<div class="part"><br><br>
                <div class="part1">
                    <h4>'.$row['EventName'].'</h4><br>
                    <h5>Yer : '.$row['EventLocation'].'</h5>
                    <h5>Tarih: '.$row['EventDate'].'</h5>
                    <h5>Bilet : '.$row["TicketPrice"].'TL</h5><br>
                    <p>'.$row['EventDescription'].'</p>
                </div>';




}
if(isset($_SESSION["uid"])&&$_SESSION["isCompany"]!=1){
    
    echo '<form action="bookingseat.php" method="post">
        <select id="people" class="adet" name="AA" required>
                    <option value="" disabled selected>Number Of Tickets</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
                <input type="hidden" name="ID" value="'.$row["idEvent"].'">
                <button type="submit" name="submit">Buy</button>';
}
else{
    echo '<p>Once uye ol</p>';
}
?>
        

                
            </div>
        </center>
    </div>
    </div>
    <div class="footer">
        <p class="footertext">Copyright &copy; BiletBiz 2021</p>
    </div>

</body>

</html>
