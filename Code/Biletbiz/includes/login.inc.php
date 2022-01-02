<?php

if(isset($_POST["submit"])){

    $username = $_POST["email"];
    $passwrd= $_POST["psswrd"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';


    if(emptyInputLogin($username,$passwrd) !== false){#if anything else then false
        header("location:../login.php?error=emptyinput");
        exit();
    }


    loginUser($conn,$username,$passwrd);
}
else{

    
     header("location:../login.php");
     exit();
    
    
}