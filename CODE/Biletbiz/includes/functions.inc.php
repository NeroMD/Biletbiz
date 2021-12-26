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
    $sql = "SELECT * FROM logintype WHERE loginEmail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)) {
        header("location:../signup.php?error=stmtFail");
        exit();
    }
    
    mysqli_stmt_bind_param($stmt,"s",$email);
    mysqli_stmt_execute($stmt);
    
    $resultData = mysqli_stmt_get_result($stmt);
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
    
    
    $sql = "INSERT INTO user (email,username,isBanned,isAdminstrator) VALUES (?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)) {
        header("location:../signup.php?error=stmtFail");
        exit();
    }
    
    
    
    mysqli_stmt_bind_param($stmt,"ssii",$email,$name,$comp,$comp);
    mysqli_stmt_execute($stmt);
    
    
    
    
    mysqli_stmt_close($stmt);
    header("location:../signup.php?error=none");
    exit();
    

}

function emptyInputLogin($username,$password){
    $result;
    if (empty($username)|| empty($password)) {
        $result=true;
    }
    else{
        $result=false;
    }
    return $result;
}

function loginUser($conn,$username,$passwrd){
    $uidExists = emailExists($username,$conn);
    if($uidExists==false){
        header("location:../login.php?error=wrongLogin");
     exit();
    }
    $pwdHashed = $uidExists["loginPassword"];
    $checkPwd = password_verify($passwrd,$pwdHashed);
    

    if($checkPwd==false){
        header("location:../login.php?error=wrongLogin");
     exit();
    }
    else if($checkPwd==true){
        session_start();
        $_SESSION["uid"]=$uidExists["loginEmail"];
        $_SESSION["isCompany"]=$uidExists["isCompany"];
        header("location:../index.php");
        exit();
    }

}

function emptyInputCreateEvent($name,$email,$date,$price,$descp,$location,$capacity){
    $result;
    if (empty($name)|| empty($email)|| empty($price)|| empty($date)|| empty($descp)|| empty($location)|| empty($capacity)) {
        $result=true;
    }
    else{
        $result=false;
    }
    return $result;
}

function createEvent($conn,$name,$email,$date,$price,$desc,$locat,$capacity){
    $sql = "INSERT INTO Event(ECompanyEmail,EventName,EventPrice,EventDate,EventDescription,EventLocation,EventNoLongerPurchasable,EventCapacity)
VALUES(?,?,?,?,?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)) {
        header("location:../createEvent.php?error=stmtFail");
        exit();
    }
    
    $event = 1;

    mysqli_stmt_bind_param($stmt,"ssdsssii",$email,$name,$price,$date,$desc,$locat,$event,$capacity);
    mysqli_stmt_execute($stmt);
    
    mysqli_stmt_close($stmt);
    $confirm = mysqli_insert_id($conn);
    #createTicket($conn, $capacity, $confirm);
    header("location:../createEvent.php?error=none");
    exit();
    

}
#function emailExistsComp($email,$conn){
 #   $sql = "SELECT * FROM company WHERE CompanyEmail = ?;";
  #  $stmt = mysqli_stmt_init($conn);
  #  if (!mysqli_stmt_prepare($stmt,$sql)) {
  #      header("location:../signup.php?error=stmtFai");
  #      exit();
  #  }
    
  #  mysqli_stmt_bind_param($stmt,"s",$email);
  #  mysqli_stmt_execute($stmt);
    
  #  $resultData = mysqli_stmt_get_result($stmt);
  #  if ($row = mysqli_fetch_assoc($resultData)) {
  #      $result = false;
  #      return $result;
   # }
   # else{
        
   #     $result=true;
 #       return $result;
  #  }

   # mysqli_stmt_close($stmt);

#}

function invalidDate($date){
    $result;
    $time = date_default_timezone_get();
    if ($date>$time) {
        $result=true;
    }
    else{
        $result=false;
    }
    return $result;
}

function createTicket($conn,$capacity,$eventID,$seatNo){
    $sql = "INSERT INTO Ticket(seat,TUserEmail,idEventID) VALUES(?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)) {
        header("location:../createEvent.php?error=stmtFail");
        exit();
    }
    $placeholder = 'ugurkaya@hotmail.com';
    
    mysqli_stmt_bind_param($stmt,"isi",$seatNo,$placeholder,$eventID);
    mysqli_stmt_execute($stmt);
    
    

    
    mysqli_stmt_close($stmt);
    header("location:../createEvent.php?error=none");
    exit();
    

}

function EventDetail($conn,$eventID){
    $sql = "SELECT * FROM event WHERE idEvent=?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)) {
    echo "STMT FAIL";
            
    }   
    
    mysqli_stmt_bind_param($stmt,"i", $eventID);
    mysqli_stmt_execute($stmt);
    
    $resultData = mysqli_stmt_get_result($stmt);
    $row=mysqli_fetch_assoc($resultData);
    mysqli_stmt_close($stmt);
    
    return $row;      

   
}

function remainingCapacity($conn,$eventID){
    $sql = "SELECT * FROM event WHERE idEvent=?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)) {
    echo "STMT FAIL";
            
    }   
    
    mysqli_stmt_bind_param($stmt,"i", $eventID);
    mysqli_stmt_execute($stmt);
    
    $resultData = mysqli_stmt_get_result($stmt);
    $row=mysqli_fetch_assoc($resultData);
    mysqli_stmt_close($stmt);
    $capacity = $row["EventCapacity"];
    
    $sql = "SELECT count(*) FROM ticket WHERE idEventID=?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)) {
    echo "STMT FAIL";
            
    }   
    
    mysqli_stmt_bind_param($stmt,"i", $eventID);
    mysqli_stmt_execute($stmt);
    
    $resultData = mysqli_stmt_get_result($stmt);
    $row=mysqli_fetch_assoc($resultData);
    $bought = $row["count(*)"];
    return $capacity-$bought;
}

function remainingSeats($conn,$eventID){
    $sql = "SELECT * FROM event WHERE idEvent=?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)) {
    echo "STMT FAIL";
            
    }   
    
    mysqli_stmt_bind_param($stmt,"i", $eventID);
    mysqli_stmt_execute($stmt);
    
    $resultData = mysqli_stmt_get_result($stmt);
    $row=mysqli_fetch_assoc($resultData);
    mysqli_stmt_close($stmt);
    $capacity = $row["EventCapacity"];
    
    $sql = "SELECT * FROM biletbizdatabase.ticket where idEventID=(?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)) {
    echo "STMT FAIL";
            
    }   
    
    mysqli_stmt_bind_param($stmt,"i", $eventID);
    mysqli_stmt_execute($stmt);
    
    $resultData = mysqli_stmt_get_result($stmt);
    
    $result = array();
    while ($row = mysqli_fetch_assoc($resultData)){
        
        array_push($result, $row["seat"]);
    }
    sort($result);
    $ret=array();
    $count=0;
    for($x=0;$x<$capacity;$x++){
        $k=$x+1;
        if($k==$result[$count]){
            $count++;
        }
        else{
            array_push($ret, $k);
        }
    }
    return $ret;
}

function bookSeat($conn,$seatNo,$eventID,$uid){
    $sql = "INSERT INTO Ticket(seat,TUserEmail,idEventID) VALUES(?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)) {
        header("location:../createEvent.php?error=stmtFail");
        exit();
    }
    
    $x='ugurkaya@hotmail.com';
    mysqli_stmt_bind_param($stmt,"isi",$seatNo,$uid,$eventID);
    mysqli_stmt_execute($stmt);
    
    

    
    mysqli_stmt_close($stmt);
    header("location:../listevent.php?$uid");
    exit();
    

}
