
<?php
include_once 'header.php';

if(isset($_GET["ID"])){
    
    require_once 'includes/dbh.inc.php';
    require_once 'includes/Event.inc.php';
    $row = EventDetail($conn, $_GET["ID"]);
    $remain= remainingCapacity($conn, $_GET["ID"]);



echo $row['EventName'].'<br>';
echo $row['EventDescription'].'<br>';
echo $row['EventLocation'].'<br>';
echo $row['EventDate'].'<br>';
echo $row['EventCapacity'].'<br>';
echo $remain.'<br>';

}
if(isset($_SESSION["uid"])){
    echo '<a href=bookingseat.php?ID='.$row["idEvent"].'>Buy ticket</a>';
}
else{
    echo '<p>yok</p>';
}
?>












<?php
    include_once 'footer.php'
    ?>