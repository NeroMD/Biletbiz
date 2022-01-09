<?php

if(isset($_POST["submit"])){
$name=$_POST["name"];
$email=$_POST["email"];
$password=$_POST["phone"];
$repassword=$_POST["adress"];

require_once 'dbh.inc.php';
require_once 'functions.inc.php';

if(emptyInputSignup($name,$email,$password,$repassword) !== false){#if anything else then false
    header("location:../signup.php?error=emptyinput");
    exit();
}





if(emailExists($email,$conn) !== false){#12
    header("location:../signup.php?error=emailInUse");
    exit();
}

createCompanyRequest($conn,$name,$email,$repassword,$password);

}
else{
    header("location:../signup.php");
    exit();
}