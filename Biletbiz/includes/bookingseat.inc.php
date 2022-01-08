<?php

if(isset($_POST["submit"])){

    $email=$_POST["email"];
    $event= $_POST["eventID"];
    $seat=$_POST["seat"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';


    

    bookSeat($conn,$seat,$event,$email);
}
else{

    
     header("location:../login.php");
     exit();
    
    
}