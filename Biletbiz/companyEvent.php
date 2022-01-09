<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="event.css">
    <title>List Event</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Lobster+Two&display=swap');

        .container {
            background-image: url(back.jpg);
            background-size: 100% 100%;
            height: 20cm;
        }

        button {
            margin-top: 50px;
            margin-left: 550px;
            width: 10%;

        }

         

        table {
            border-collapse: collapse;
            width: 60%;
            margin: auto;
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

<body>
    <div class="container">
        <!--Navbar-->
        
<?php
session_start();
if(isset($_SESSION["uid"])){
require_once 'includes/dbh.inc.php';
require_once 'includes/Event.inc.php';
$sql = "SELECT * FROM event where ECompanyEmail=?;";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt,$sql)) {
            echo "STMT FAIL";
            
             }   
    
            mysqli_stmt_bind_param($stmt,"s",$_SESSION["uid"]);
            mysqli_stmt_execute($stmt);
    
            $resultData = mysqli_stmt_get_result($stmt);
            ?>
        <div class="navbar">
            <div class="logo">
                <a href="companypage.html"><img src="logo.png" alt="Logo" style="width:250px; height:70px;"></a>
            </div>
        </div>
        <br><br>
        <h2>
            <center>List Event</center>
        </h2><br>
        <table>
            <tr>
                <th>Event Name</th>
                <th>Date</th>
                
                <th>Location</th>
                <th>Price Tickets</th>
                <th>Capacity</th>
                
            </tr>
            <?php
            while ($row = mysqli_fetch_assoc($resultData)) {
                
                echo '<tr>
                <td><a href="showParticipants.php?ID='.$row["idEvent"].'">'.$row["EventName"].'</a></td>
                <td>'.$row["idEvent"].' </td>
                <td>'.$row["EventDate"].' </td>
                <td>'.$row["EventLocation"].' </td>
                <td>'.$row["TicketPrice"].' </td>
                <td>'.$row["EventCapacity"].' </td>
                <td><td><a href="editevent.php?ID='.$row["idEvent"].'">Edit Event</a></td>
            </tr>';
            }
    
    
}

            
            ?>


        </table>
            <a href="editevent.html"><button type="submit" class="button" style="margin-left: 600px;">Edit</button></a>
         
    </div>
    <div class="footer">
        <p class="footertext">Copyright &copy; BiletBiz 2021</p>
    </div>
</body>

</html>