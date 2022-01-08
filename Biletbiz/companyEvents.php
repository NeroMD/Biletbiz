
<?php
include_once 'header.php';
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
            while ($row = mysqli_fetch_assoc($resultData)) {
                echo '<a href="showParticipants.php?ID='.$row["idEvent"].'">'.$row["EventName"].'</a><br>';
            }
    
    
}
?>












<?php
    include_once 'footer.php'
    ?>