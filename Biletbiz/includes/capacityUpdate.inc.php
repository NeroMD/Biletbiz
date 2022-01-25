<?php

if(isset($_POST["submit"])){

    $username = $_POST["email"];
    $passwrd= $_POST["ID"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';


    if(getAttandeeCount($conn,$passwrd)>$username){#12
    header("location:../location:../editevent.php?ID=$ID");
    exit();
}
if(getAttandeeCount($conn,$passwrd)==$username){#12
    noLongerPurchase($conn, $passwrd);
}


    UpdateEventCapacity($conn,$username,$passwrd);
}
else{

    
     header("location:../login.php");
     exit();
    
    
}