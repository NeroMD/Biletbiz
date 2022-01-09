<?php
if(isset($_POST["submit"])){
require_once 'dbh.inc.php';
require_once 'functions.inc.php';
$ticketID = $_POST["ticket"];

refundTicket($conn, $ticketID);
}
else{

    
     header("location:../myticket.php?yok");
     exit();
    
    
}