<?php

if(isset($_POST["submit"])){
$name=$_POST["name"];
$email=$_POST["email"];
$date=$_POST["date"];
$price=$_POST["price"];
$desc=$_POST["descp"];
$locat=$_POST["location"];
$capacity=$_POST["capacity"];
$vipCap=$_POST['VIPcapacity'];
$vipPrice=$_POST['VIPprice'];

require_once 'dbh.inc.php';
require_once 'functions.inc.php';

if(emptyInputCreateEvent($name,$email,$date,$price,$desc,$locat,$capacity) !== false){#if anything else then false
    header("location:../createEvent.php?error=emptyinput");
    exit();
}

if(invalidDate($date) !== false){#12
    header("location:../createEvent.php?error=invalidDate");
    exit();
}
if($vipCap==0){
    createEvent($conn,$name,$email,$date,$price,$desc,$locat,$capacity);exit();
}


#if(emailExistsComp($email,$conn) !== false){#12
#    header("location:../signup.php?error=emailInUse");
#    exit();
#}

createVIPEvent($conn,$name,$email,$date,$price,$desc,$locat,$capacity,$vipCap,$vipPrice);

}
else{
    header("location:../createEvent.php");
    exit();
}