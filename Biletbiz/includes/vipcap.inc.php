<?php

if(isset($_POST["submit"])){

    $username = $_POST["email"];
    $passwrd= $_POST["ID"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

if(getMaxVIPCount($conn,$passwrd)>$username){#12
    header("location:../editevent.php?ID=$passwrd");
    exit();
}


    


    UpdateEventVIPCapacity($conn,$username,$passwrd);
}
else{

    
     header("location:../login.php");
     exit();
    
    
}