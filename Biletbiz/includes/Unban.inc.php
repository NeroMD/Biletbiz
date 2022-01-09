<?php
if(isset($_POST["submit"])){

    $mail = $_POST["email"];
    

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';
    UnbanUser($conn, $mail);



}
else{

    
     header("location:../login.php");
     exit();
    
    
}