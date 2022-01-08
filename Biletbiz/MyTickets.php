<?php
    include_once 'header.php'
    
    ?>

<?php
if(isset($_SESSION["uid"])){
    
    require_once 'includes/dbh.inc.php';
            
            $sql = "SELECT * FROM ticket where TUserEmail=? ;";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt,$sql)) {
            echo "STMT FAIL";
            
             }   
    
            mysqli_stmt_bind_param($stmt,"s",$_SESSION['uid']);
            mysqli_stmt_execute($stmt);
    
            $resultData = mysqli_stmt_get_result($stmt);
            while ($row = mysqli_fetch_assoc($resultData)) {
                $sql = "SELECT * FROM event where idEvent=? ;";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt,$sql)) {
            echo "STMT FAIL";
            
             }   
    
            mysqli_stmt_bind_param($stmt,"s",$row["idEventID"]);
            mysqli_stmt_execute($stmt);
            $res=mysqli_stmt_get_result($stmt);
            $ro=mysqli_fetch_assoc($res);
            $date=$ro["EventDate"];
    
            $result=true;
            $time = date("Y-m-d");
            if ($date>$time) {
            $result=false;
            }
                echo '<p>event name = '.$ro["EventName"].'   &emsp;       seat = '.$row["seat"].'    &emsp;      At '.$ro["EventDate"].'</p>';
                if($result==false){echo '<form action="includes/refund.inc.php" method="post">
                    <input type="hidden" name="ticket" value="'.$row['TicketID'].'">
    <button type="submit" name="submit">refund</button>
</form>';}
                echo '<br>';
            }
            

            mysqli_stmt_close($stmt);

        
        
        
        
    
    
    
    
    
}
?>





<?php
    include_once 'header.php'
    
    ?>