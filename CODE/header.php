<?php
    session_start();
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/index.css">
        <title></title>
    </head>
    <body>

        
        <ul>
  <li><a class="active" href="#home">Home</a></li>
  <li><a href="#news">News</a></li>

    <?php
        if(isset($_SESSION["uid"])){
            echo  "<li><a href=''>profile</a></li>";
            echo "<li><a href='includes/logout.inc.php'>Log out</a></li>";
        }
        else{
            echo  "<li><a href='login.php'>Login</a></li>";
            echo "<li><a href='signup.php'>Sign Up</a></li>";
        }
    ?>


        </ul>
        