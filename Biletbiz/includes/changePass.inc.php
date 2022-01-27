<?php

if(isset($_POST["submit"])){

    $username = $_POST["opsw"];
    $passwrd= $_POST["npsw"];
    $uid = $_POST["email"];
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';


    


    changePassword($conn,$uid,$passwrd,$username);
}
else{

    
     header("location:../login.php");
     exit();
    
    
}