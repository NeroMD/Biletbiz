<?php

if(isset($_POST["submit"])){

    $username = $_POST["email"];
    $passwrd= $_POST["ID"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';


    


    UpdateEventName($conn,$username,$passwrd);
}
else{

    
     header("location:../login.php");
     exit();
    
    
}