<?php

if(isset($_POST["submit"])){
$name=$_POST["name"];
$email=$_POST["email"];
$date=$_POST["date"];
$price=$_POST["price"];
$desc=$_POST["descp"];
$locat=$_POST["location"];
$capacity=$_POST["capacity"];

require_once 'dbh.inc.php';
require_once 'functions.inc.php';

#if(emptyInputCreateEvent($name,$email,$date,$price,$desc,$locat,$capacity) !== false){#if anything else then false
#    header("location:../signup.php?error=emptyinput");
#    exit();
#}

#if(invalidDate($date) !== false){#12
#    header("location:../signup.php?error=invalidEmail");
#    exit();
#}



#if(emailExistsComp($email,$conn) !== false){#12
#    header("location:../signup.php?error=emailInUse");
#    exit();
#}

createEvent($conn,$name,$email,$date,$price,$desc,$locat,$capacity);

}
else{
    header("location:../createEvent.php");
    exit();
}