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
            margin-left: 250px;
            width: 100px;

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

        <div class="navbar">
            <div class="logo">
                <a href="includes/indexer.inc.php"><img src="foto/logo.png" alt="Logo" style="width:250px; height:70px;"></a>
            </div>
        </div>
        <br><br>
        <h2>
            <center>List company requests</center>
        </h2><br>
        <table>
            <tr>
                <th>Company Name</th>
                <th>phone</th>
                <th>Location</th>
                <th>Email</th>
                <th></th>
                <th></th>
            </tr>
            <?php
            session_start();
            if($_SESSION["isAdmin"]==1)
            require_once 'includes/dbh.inc.php';
            
            $sql = "SELECT * FROM company where ApprovedCompany=0 ;";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt,$sql)) {
            echo "STMT FAIL";
            
             }   
    
            
            mysqli_stmt_execute($stmt);
    
            $resultData = mysqli_stmt_get_result($stmt);
            while ($row = mysqli_fetch_assoc($resultData)) {
            echo '<tr>
                <td>'.$row["CompanyName"].'</td>
                <td>'.$row["CompanyPhone"].'</td>
                <td>'.$row["CompanyAdress"].'</td>
                <td>'.$row["CompanyEmail"].'</td>
                <td>  <form action="includes/Approve.inc.php" method="post">
<input type="hidden" name="email" value="'.$row["CompanyEmail"].'">
    <button type="submit" class="button" name="submit">Approve</button>
    </form>
</td>
                <td> <form action="includes/disApprove.inc.php" method="post">
<input type="hidden" name="email" value="'.$row["CompanyEmail"].'">
    <button type="submit" class="button" name="submit">Disapprove</button></td>
    </form>
            </tr>';
    
            
            }
            
?>

        </table>
            
         
    </div>
    <div class="footer">
        <p class="footertext">Copyright &copy; BiletBiz 2021</p>
    </div>
</body>

</html>