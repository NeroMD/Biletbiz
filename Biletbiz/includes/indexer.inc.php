<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();

if($_SESSION["isCompany"]==1){
    header("location:../companypage.php");
    exit();
}
 if($_SESSION["isAdmin"]==1){    
     header("location:../index.php");exit();
 }
 else {
     header("location:../index.php");exit();
}
