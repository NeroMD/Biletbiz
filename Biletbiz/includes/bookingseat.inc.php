<?php

if(isset($_POST["submit"])){

    $email=$_POST["email"];
    $event= $_POST["eventID"];
    $seat=$_POST["seat"];
    
    $sea=array();
    foreach ($_POST['seat'] as $element) {        array_push($sea, $element); }
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';


    

    bookSeats($conn,$sea,$event,$email);
}
else{

    
     header("location:../login.php");
     exit();
    
    
}