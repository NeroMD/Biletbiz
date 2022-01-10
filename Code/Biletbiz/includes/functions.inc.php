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
    if(!isBanned($conn,$username)){
            header("location:../login.php?error=wrongLogin");
            exit();
        }
    else if($checkPwd==true){
        
        session_start();
        $_SESSION["uid"]=$uidExists["loginEmail"];
        $_SESSION["isCompany"]=$uidExists["isCompany"];
        $_SESSION["isAdmin"]= isAdmin($username, $conn);
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
    $sql = "INSERT INTO Event(ECompanyEmail,EventName,TicketPrice,EventDate,EventDescription,EventLocation,EventNoLongerPurchasable,EventCapacity)
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
    header("location:../companyEvent.php");
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
    $time = date("Y-m-d");
    if ($date>$time) {
        $result=false;
    }
    else{
        $result=true;
    }
    return $result;
}

//function createTicket($conn,$capacity,$eventID,$seatNo){
//    $sql = "INSERT INTO Ticket(seat,TUserEmail,idEventID) VALUES(?,?,?);";
//    $stmt = mysqli_stmt_init($conn);
//    if (!mysqli_stmt_prepare($stmt,$sql)) {
//        header("location:../createEvent.php?error=stmtFail");
//        exit();
//    }
//    $placeholder = 'ugurkaya@hotmail.com';
//    
//    mysqli_stmt_bind_param($stmt,"isi",$seatNo,$placeholder,$eventID);
//    mysqli_stmt_execute($stmt);
//    
//    
//
//    
//    mysqli_stmt_close($stmt);
//    header("location:../createEvent.php?error=none");
//    exit();
//    
//
//}

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
        header("location:../listevent.php?error=stmtFail");
        exit();
    }
    
    
    mysqli_stmt_bind_param($stmt,"isi",$seatNo,$uid,$eventID);
    mysqli_stmt_execute($stmt);
    
    $confirm = mysqli_insert_id($conn);
    $price = getPrice($conn,$eventID);
    createReceipt($conn, $confirm, $price, $uid);

    
    mysqli_stmt_close($stmt);
    header("location:../listevent.php?");
    exit();
    
}

function isBanned($conn,$mail){
    $sql = "SELECT * FROM user WHERE email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)) {
        header("location:../signup.php?error=stmtFail");//find better one
        exit();
    }
    
    mysqli_stmt_bind_param($stmt,"s",$mail);
    mysqli_stmt_execute($stmt);
    
    $resultData = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($resultData);
    if ($row['isBanned'] == 1) {
        return false;
    } else {
        return true;
    }
}

function refundTicket($conn,$ticketID){
    if(invalidDateTicket($conn, $ticketID)){
        header("location:../MyTickets.php?niceTry");
        exit();
    }
    $sql = "DELETE FROM `biletbizdatabase`.`ticket` WHERE TicketID = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)) {
        header("location:../myticket.php?error=stmtFail");
        exit();
    }
    
    mysqli_stmt_bind_param($stmt,"i",$ticketID);
    mysqli_stmt_execute($stmt);
    header("location:../myticket.php?refunded");
    exit();
}

function invalidDateTicket($conn,$ticketID){
    
    $sql = "SELECT * FROM ticket WHERE TicketID = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)) {
        header("location:../MyTickets.php?error=stmtFail");
        exit();
    }
    
    mysqli_stmt_bind_param($stmt,"i",$ticketID);
    mysqli_stmt_execute($stmt);
    
    $resultData = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($resultData);
    
    $event=$row["idEventID"];
    
    $sql = "SELECT * FROM event WHERE idEvent = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)) {
        header("location:../MyTickets.php?error=stmtFail");
        exit();
    }
    
    mysqli_stmt_bind_param($stmt,"i",$event);
    mysqli_stmt_execute($stmt);
    
    $resultData = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($resultData);
    
    $date=row["EventDate"];
    
    $result;
    $time = date("Y-m-d");
    if ($date>$time) {
        $result=false;
    }
    else{
        $result=true;
    }
    return $result;
}
function eventParticipants($conn,$eventID){
    $sql = "SELECT * FROM ticket WHERE idEventID=?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)) {
    echo "STMT FAIL";
            
    }   
    
    mysqli_stmt_bind_param($stmt,"i", $eventID);
    mysqli_stmt_execute($stmt);
    
    $resultData = mysqli_stmt_get_result($stmt);
    
    $result = array();
    while ($row = mysqli_fetch_assoc($resultData)){
        
        array_push($result, $row["TUserEmail"]);
    }
   $people = array_unique($result);
    
    $sql = "SELECT * FROM user where email=(?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)) {
    echo "STMT FAIL";
            
    }   
    $ret=array();
    for($x=0;$x<count($people);$x++){
    mysqli_stmt_bind_param($stmt,"s", $people[$x]);
    mysqli_stmt_execute($stmt);
    
    $resultData = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($resultData);
    array_push($ret, $row["username"]);
    }
    mysqli_stmt_close($stmt);
    return $ret;
}

function BanUser($conn,$mail){
    $sql = "UPDATE user SET isBanned=1 WHERE email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)) {
        header("location:../BanUser.php?error=stmtFail");
        exit();
    }
    
    mysqli_stmt_bind_param($stmt,"s",$mail);
    mysqli_stmt_execute($stmt);
    
    mysqli_stmt_close($stmt);
    header("location:../BanUser.php?Banned");
    exit();
}
function UnbanUser($conn,$mail){
    $sql = "UPDATE user SET isBanned=0 WHERE email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)) {
        header("location:../BanUser.php?error=stmtFail");
        exit();
    }
    
    mysqli_stmt_bind_param($stmt,"s",$mail);
    mysqli_stmt_execute($stmt);
    
    mysqli_stmt_close($stmt);
    header("location:../BanUser.php?Unbanned");
    exit();
}
function isAdmin($email,$conn){
    $sql = "SELECT * FROM user WHERE email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)) {
        header("location:../login.php?error=stmtFail");
        exit();
    }
    
    mysqli_stmt_bind_param($stmt,"s",$email);
    mysqli_stmt_execute($stmt);
    
    $resultData = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($resultData);
        
        return $row["isAdminstrator"];
    
    
    mysqli_stmt_close($stmt);

}
function UpdateEventName($conn,$value,$ID){
    $sql = "UPDATE event SET EventName=? WHERE idEvent = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)) {
        header("location:../editevent.php?error=stmtFail");
        exit();
    }
    
    mysqli_stmt_bind_param($stmt,"si",$value,$ID);
    mysqli_stmt_execute($stmt);
    
    mysqli_stmt_close($stmt);
    header("location:../editevent.php?ID=$ID");
    exit();
}
function UpdateEventDescription($conn,$value,$ID){
    $sql = "UPDATE event SET EventDescription=? WHERE idEvent = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)) {
        header("location:../editevent.php?error=stmtFail");//yeni sayfa
        exit();
    }
    
    mysqli_stmt_bind_param($stmt,"si",$value,$ID);
    mysqli_stmt_execute($stmt);
    
    mysqli_stmt_close($stmt);
    header("location:../editevent.php?ID=$ID");//yeni sayfa
    exit();
}
function UpdateEventPrice($conn,$value,$ID){
    $sql = "UPDATE event SET TicketPrice=? WHERE idEvent = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)) {
        header("location:../editevent.php?error=stmtFail");//yeni sayfa
        exit();
    }
    
    mysqli_stmt_bind_param($stmt,"di",$value,$ID);
    mysqli_stmt_execute($stmt);
    
    mysqli_stmt_close($stmt);
    header("location:../editevent.php?ID=$ID");//yeni sayfa
    exit();
}
function UpdateEventDate($conn,$value,$ID){
    $sql = "UPDATE event SET EventDate=? WHERE idEvent = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)) {
        header("location:../editevent.php?error=stmtFail");
        exit();
    }
    
    mysqli_stmt_bind_param($stmt,"si",$value,$ID);
    mysqli_stmt_execute($stmt);
    
    mysqli_stmt_close($stmt);
    header("location:../editevent.php?ID=$ID");
    exit();
}
function UpdateEventLocation($conn,$value,$ID){
    $sql = "UPDATE event SET EventLocation=? WHERE idEvent = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)) {
        header("location:../editevent.php?error=stmtFail");
        exit();
    }
    
    mysqli_stmt_bind_param($stmt,"si",$value,$ID);
    mysqli_stmt_execute($stmt);
    
    mysqli_stmt_close($stmt);
    header("location:../editevent.php?ID=$ID");
    exit();
}
function UpdateEventCapacity($conn,$value,$ID){
    $sql = "UPDATE event SET EventCapacity=? WHERE idEvent = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)) {
        header("location:../editevent.php?error=stmtFail");
        exit();
    }
    
    mysqli_stmt_bind_param($stmt,"ii",$value,$ID);
    mysqli_stmt_execute($stmt);
    
    mysqli_stmt_close($stmt);
    header("location:../editevent.php?ID=$ID");
    exit();
}
function UpdateEventPurchasable($conn,$value,$ID){
    $sql = "UPDATE event SET EventNoLongerPurchasable=? WHERE idEvent = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)) {
        header("location:../editevent.php?error=stmtFail");
        exit();
    }
    
    mysqli_stmt_bind_param($stmt,"ii",$value,$ID);
    mysqli_stmt_execute($stmt);
    
    mysqli_stmt_close($stmt);
    header("location:../editevent.php?ID=$ID");
    exit();
}
function createCompanyRequest($conn,$name,$email,$adress,$phone){
    
    $sql = "INSERT INTO company (CompanyEmail, ApprovedCompany, CompanyName, CompanyAdress, CompanyPhone) VALUES (?,?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)) {
        header("location:../companyregister.php?error=stmtFail");
        exit();
    }
    
    
    $zero=0;
    mysqli_stmt_bind_param($stmt,"sisss",$email,$zero,$name,$adress,$phone);
    mysqli_stmt_execute($stmt);
         
    mysqli_stmt_close($stmt);
    header("location:../companyregister.php?error=none");// deis
    exit();    
}
function approveCompanyRequest($conn,$email){
    
    $sql = "UPDATE company SET ApprovedCompany=1 WHERE CompanyEmail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)) {
        header("location:../signup.php?error=stmtFail");// deis
        exit();
    }
    
    
    
    mysqli_stmt_bind_param($stmt,"s",$email);
    mysqli_stmt_execute($stmt); 
    
    $sql = "INSERT INTO logintype (loginEmail,loginPassword,isCompany) VALUES (?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)) {
        header("location:../Approve.php?error=stmtFail");
        exit();
    }
    $password=1;
    $hashedPsswrd=password_hash($password,PASSWORD_DEFAULT);
    $comp=1;
    mysqli_stmt_bind_param($stmt,"ssi",$email,$hashedPsswrd,$comp);
    mysqli_stmt_execute($stmt);
    
    mysqli_stmt_close($stmt);
    
    
    header("location:../Approve.php?error=stmtFail");// deis
    exit();    
}
function disapproveCompanyRequest($conn,$email){
    
    $sql = "DELETE FROM company WHERE CompanyEmail=?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)) {
        header("location:../Approve.php?error=stmtFail1");// deis
        exit();
    }
    
    
    $zero=0;
    mysqli_stmt_bind_param($stmt,"s",$email);
    mysqli_stmt_execute($stmt);
         
    mysqli_stmt_close($stmt);
    header("location:../Approve.php?error=none");// deis
    exit();    
}
function createReceipt($conn,$ticketID,$price,$purchaser,$amount){// receipt price eklencek odenen para yazilcak
    $sql = "INSERT INTO receipt(ReceiptDate,PurchaserEmail,ReceiptTicketID,AmountOfTicketsPurchased,ReceiptPayment) VALUES(?,?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)) {
        header("location:../createEvent.php?error=stmtFail");
        exit();
    }
    $time = date("Y-m-d");
    
    mysqli_stmt_bind_param($stmt,"ssiid",$time,$purchaser,$ticketID,$amount,$price);
    mysqli_stmt_execute($stmt);
    
    

    
    mysqli_stmt_close($stmt);
    
}
function getPrice($conn,$EventID){
    $sql = "SELECT * FROM event WHERE idEvent=?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)) {
    echo "STMT FAIL";
            
    }   
    
    mysqli_stmt_bind_param($stmt,"i", $EventID);
    mysqli_stmt_execute($stmt);
    
    $resultData = mysqli_stmt_get_result($stmt);
    $row=mysqli_fetch_assoc($resultData);
    mysqli_stmt_close($stmt);
    return $row["TicketPrice"];
}
function bookSeats($conn,$seatNo,$eventID,$uid){

    ticketmail($conn,$seatNo,$eventID,$uid);


    $sql = "INSERT INTO Ticket(seat,TUserEmail,idEventID) VALUES(?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)) {
        header("location:../listevent.php?error=stmtFail");
        exit();
    }
    
    foreach($seatNo as $element){
    mysqli_stmt_bind_param($stmt,"isi",$element,$uid,$eventID);
    mysqli_stmt_execute($stmt);
    }
    $confirm = mysqli_insert_id($conn);
    $prices = getPrice($conn,$eventID);
    $price = $prices*sizeof($seatNo);
    $size = sizeof($seatNo);
    createReceipt($conn, $confirm, $price,$uid,$size );

    
    mysqli_stmt_close($stmt);
    header("location:../listevent.php?");
    exit();
    

}
function ticketmail($conn,$seatNo,$eventID,$uid){
    $umail = $uid;
    $sql = "SELECT * FROM event WHERE idEvent='" . $eventID . "'";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)) {
        echo "STMT FAIL ticketmail()";

    }

    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($resultData);
    $eventname = $row["EventName"];
    $date = $row["EventDate"];
    $hour = $row["EventHour"];
    $place = $row["EventLocation"];
    $seat = implode(", ", $seatNo);
    if($row)
    {
        require_once('../phpmailer/PHPMailerAutoload.php');
        $mail = new PHPMailer();

        $mail->IsSMTP();
        //$mail->SMTPDebug = 3;
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = "587";
        $mail->SMTPSecure = "tls";

        $mail->SMTPAuth = true;
        // GMAIL username
        $mail->Username = "donotreplybiletbiz@gmail.com";
        // GMAIL password
        $mail->Password = "dnrbb706050";


        $mail->From='donotreplybiletbiz@gmail.com';
        $mail->FromName='biletbiz';

        $mail->smtpConnect(
            array(
                "ssl" => array(
                    "verify_peer" => false,
                    "verify_peer_name" => false,
                    "allow_self_signed" => true
                )
            )
        );
        $mail->AddAddress($umail, $umail);
        $mail->Subject  =  'Payment Successful';
        $mail->IsHTML(true);
        $mail->Body    = 'Your payment for The '.$eventname.' event successful, at '.$date.' '.$hour.' The place, '.$place.' Your seat number(s)'.$seat.' Have FUN!';
        if($mail->Send())
        {
            echo "Check Your Email and Click on the link sent to your email";
        }
        else
        {
            echo "Mail Error - >".$mail->ErrorInfo;
        }
    }else{
        echo "Invalid Email Address. Go back";
    }



}