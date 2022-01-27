<?php
 
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'includes/dbh.inc.php';

$sql = "INSERT INTO logintype (loginEmail,loginPassword,isCompany) VALUES (?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)) {
        header("location:../signup.php?error=stmtFail");
        exit();
    }
    
    $hashedPsswrd=password_hash($password,PASSWORD_DEFAULT);
    $comp=0;
    mysqli_stmt_bind_param($stmt,"ssi",$email,$hashedPsswrd,$comp);
    mysqli_stmt_execute($stmt);