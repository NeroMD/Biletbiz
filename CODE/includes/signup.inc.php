<?php

if(isset($_POST["submit"])){
$name=$_POST["name"];
$email=$_POST["email"];
$password=$_POST["psswrd"];
$repassword=$_POST["repsswrd"];

require_once 'dbh.inc.php';
require_once 'functions.inc.php';

if(emptyInputSignup($name,$email,$password,$repassword) !== false){#if anything else then false
    header("location:../signup.php?error=emptyinput");
    exit();
}

if(invalidEmail($email) !== false){#12
    header("location:../signup.php?error=invalidEmail");
    exit();
}

if(pswrdMatch($password,$repassword) !== false){#12
    header("location:../signup.php?error=pswrdNoMatch");
    exit();
}

if(emailExists($email,$conn) !== false){#12
    header("location:../signup.php?error=emailInUse");
    exit();
}

createUser($conn,$name,$email,$password);

}
else{
    header("location:../signup.php");
    exit();
}