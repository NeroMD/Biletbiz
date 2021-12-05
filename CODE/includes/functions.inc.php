<?php

function emptyInputSignup($name,$email,$password,$repassword){
    $result;
    if (empty($name)|| empty($email)|| empty($password)|| empty($repassword)) {
        $result=true;
    }
    else{
        $result=false;
    }
    return $result;
}

function invalidEmail($email){
    $result;
    if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
        $result=true;
    }
    else{
        $result=false;
    }
    return $result;
}

function pswrdMatch($password,$repassword){
    $result;
    if ($password !== $repassword) {
        $result=true;
    }
    else{
        $result=false;
    }
    return $result;
}

function emailExists($email,$conn){
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)) {
        header("location:../signup.php?error=stmtFail");
        exit();
    }
    
    mysqli_stmt_bind_param($stmt,"s",$email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result();
    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }
    else{
        $result=false;
        return $result;
    }

    mysqli_stmt_close($stmt);

}

function createUser($conn,$name,$email,$password){
    $sql = "INSERT INTO users (userName,email,passwrd) VALUES (?,?,?)";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)) {
        header("location:../signup.php?error=stmtFail");
        exit();
    }
    
    $hashedPsswrd=password_hash($password,PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt,"sss",$name,$email,$hashedPsswrd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location:../signup.php?error=none");
    exit();
    

}