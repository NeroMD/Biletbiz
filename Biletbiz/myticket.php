<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Tickets</title>
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

            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        .bar__button, button.bar__button[type="submit"]{
            float: right;
            font-size: 16px;
            position: relative;
            top: inherit;
            right: inherit;
            
            padding: 0;
            width: 60px;
            letter-spacing: 1px;
            height: 26px;
            background-color: #5c3737;
            color: white;
            border-radius: 5px;
            cursor: pointer;
            opacity: 0.9;
        }
    </style>
</head>

<body>
<div class="container">
    <div class="navbar">
        <div class="logo" style="margin-left:750px"> 
            <a href="includes/indexer.inc.php"><img src="foto/logo.png" alt="Logo" style="width:250px; height:70px;"></a>
        </div>
    </div>
    <br><br>
    <h2><center>My Tickets</center></h2>
    <table>
        <tr>
            <th>Event Name</th>
            <th>Date</th>
            <th>Seats</th>
            <th>VIP</th>
        
        </tr>
        <?php
        session_start();
        if (isset($_SESSION["uid"])) {

            require_once 'includes/dbh.inc.php';

            $sql = "SELECT * FROM ticket where TUserEmail=? ;";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                echo "STMT FAIL";
            }

            mysqli_stmt_bind_param($stmt, "s", $_SESSION['uid']);
            mysqli_stmt_execute($stmt);

            $resultData = mysqli_stmt_get_result($stmt);
            while ($row = mysqli_fetch_assoc($resultData)) {
                $sql = "SELECT * FROM event where idEvent=? ;";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    echo "STMT FAIL";
                }

                mysqli_stmt_bind_param($stmt, "s", $row["idEventID"]);
                mysqli_stmt_execute($stmt);
                $res = mysqli_stmt_get_result($stmt);
                $ro = mysqli_fetch_assoc($res);
                $date = $ro["EventDate"];

                $result = true;
                $time = date("Y-m-d");
                if ($date > $time) {
                    $result = false;
                }
                echo '<tr>
                <td> ' . $ro["EventName"] . ' </td>
                <td> ' . $ro["EventDate"] . '</td>
                
                
                
                <td> ' . $row["seat"] . '</td>
                <td> ' . $row["isVip"] . '</td>
            ';
                if ($result == false) {
                    echo '<form action="includes/refund.inc.php" method="post">
                    <input type="hidden" name="ticket" value="' . $row['TicketID'] . '">
   <td> <button type="submit" name="submit" class="bar__button">refund</button></td>
</form>';
                }
                echo '</tr><br>';
            }


            mysqli_stmt_close($stmt);
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