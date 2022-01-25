<?php

if(isset($_POST["submit"])){

    $username = $_POST["email"];
    $passwrd= $_POST["ID"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

if(invalidDate($username) !== false){#12
    header("location:../location:../editevent.php?ID=$ID");
    exit();
}
    


    UpdateEventDate($conn,$username,$passwrd);
}
else{

    
     header("location:../login.php");
     exit();
    
    
}