<?php
session_start();
include_once 'includes/Event.inc.php';
include_once 'includes/dbh.inc.php';
if(isset($_GET["ID"])){
    
}

?>

<?php
                    if(isset($_GET["ID"])){
                    $arr= eventParticipants($conn, $_GET["ID"]);
                    for($x=0;$x<count($arr);$x++){
                        echo 'name = '.$arr[$x].'';
                    }
}                  

                    ?>