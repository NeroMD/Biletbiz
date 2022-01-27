<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Paticipants</title>
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

        table {
            border-collapse: collapse;
            width: 60%;
            margin:auto;
            margin-top: 50px;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
    </style>
</head>
<?php
session_start();
include_once 'includes/Event.inc.php';
include_once 'includes/dbh.inc.php';


?>
<body>
    <div class="container" style="background-image: url(foto/back.jpg);height: 70cm">
        <div class="navbar">
            <div class="logo">
                <a href="includes/indexer.inc.php"><img src="foto/logo.png" alt="Logo" style="width:250px; height:70px;"></a>
            </div>
        </div>
        <br><br>
        <h2><center>Participants</center></h2><br>
        <h4><center> </center></h4><!--Event Name Label-->
        <table>
            <tr>
                <th>Participants Name</th>
<!--                <th>Phone</th>
                <th>Number Of Ticket</th>
                <th>Seats</th>-->
            </tr>
            <?php
                    if(isset($_GET["ID"])){
                    $arr= eventParticipants($conn, $_GET["ID"]);
                    for($x=0;$x<count($arr);$x++){
                        echo '<tr><th>name = '.$arr[$x].'</th></tr>' ;
                    }
}                  

                    ?>
            
            
        </table>
    </div>
    </div>
    <div class="footer">
        <p class="footertext">Copyright &copy; BiletBiz 2021</p>
    </div>

</body>

</html>