<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/event.css">
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
            width: 20%;
        }

        h1 {
            margin-top: 25px;
            margin-left: 450px;
        }
    </style>
</head>

<body>
    <div class="container">
        <!--Navbar-->
        <div class="navbar">
            <div class="logo">
                <a href="index.php"><img src="foto/logo.png" alt="Logo" style="width:250px; height:70px;"></a>
            </div>
        </div>
        <h1>Event List</h1>
        <?php
        
        
            require_once 'includes/dbh.inc.php';
            
            $sql = "SELECT * FROM event ;";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt,$sql)) {
            echo "STMT FAIL";
            
             }   
    
            
            mysqli_stmt_execute($stmt);
    
            $resultData = mysqli_stmt_get_result($stmt);
            while ($row = mysqli_fetch_assoc($resultData)) {
            $date=$row["EventDate"];
    
            $result=true;
            $time = date("Y-m-d");
            if ($date>$time) {
            $result=false;
            }
            if($result){}
            else{
                echo '<div class="th">
            <a href="Event.php?ID='.$row["idEvent"].'">'.$row["EventName"].'</a>
            <dd> '.$row["EventDate"].' <br> '.$row["EventLocation"].' <br> '.$row["EventPrice"].'TL (Capacity : '.$row["EventCapacity"].') <br>Event Is
                Available for Purchase</dd>
        </div>';
            }
            }
            

            mysqli_stmt_close($stmt);

        
        
        
        
        ?>
        
        
    </div>
    <div class="footer">
        <p class="footertext">Copyright &copy; BiletBiz 2021</p>
    </div>
</body>

</html>