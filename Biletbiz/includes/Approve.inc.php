<?php

if(isset($_POST["submit"])){

    $username = $_POST["email"];
   

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';


    


    approveCompanyRequest($conn,$username);
}
else{

    
     header("location:../login.php");
     exit();
    
    
}