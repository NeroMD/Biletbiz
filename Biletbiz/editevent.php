<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Event</title>
    <link rel="stylesheet" href="css/event.css">
    <script defer src="http://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
</head>
<style>
    .container {
        background-image: url(back.jpg);
        background-size: 100% 100%;
        height: 40cm;
    }

    .btn:hover {
        opacity: 1;
    }

    .btn {
        background-color: #5c3737;
        color: white;
        padding: 9px 20px;
        border-radius: 5px;
        cursor: pointer;
        width: 15%;
        opacity: 0.9;
        margin-left: 200px;

    }

    .bttn {
        background-color: #5c3737;
        color: white;
        padding: 9px 20px;
        border-radius: 5px;
        cursor: pointer;
        width: 15%;
        opacity: 0.9;

    }

    #popup,
    #popup1,
    #popup2,
    #popup3,
    #popup4,
    #popup5,
    #popup7,
    #popup8,
    #popup6 {
        position: fixed;
        background: #eee9e9;
        transition: 0.5s;
        top: -100%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 1000;
        width: 350px;
        height: 120px;
        padding: 80px 50px 50px;
        box-shadow: 0 15px 30px rgba(0, 0, 0, 08);
        visibility: hidden;
    }

    #popup.active,
    #popup1.active,
    #popup2.active,
    #popup3.active,
    #popup4.active,
    #popup7.active,
    #popup8.active,
    #popup5.active,
    #popup6.active {
        visibility: visible;
        top: 50%;
    }

    #popup.content,
    #popup1.content,
    #popup2.content,
    #popup3.content,
    #popup4.content,
    #popup7.content,
    #popup8.content,
    #popup5.content,
    #popup6.content {
        position: relative;
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;

    }

    #popup .content .inputbox,
    #popup1 .content .inputbox,
    #popup2 .content .inputbox,
    #popup3 .content .inputbox,
    #popup7 .content .inputbox,
    #popup8 .content .inputbox,
    #popup4 .content .inputbox,
    #popup5 .content .inputbox,
    #popup6 .content .inputbox {
        position: relative;
        width: 95%;
        margin-top: 10px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    #popup .content .inputbox input,
    #popup1 .content .inputbox input,
    #popup2 .content .inputbox input,
    #popup3 .content .inputbox input,
    #popup7 .content .inputbox input,
    #popup8 .content .inputbox input
    #popup4 .content .inputbox input,
    #popup5 .content .inputbox input,
    #popup6 .content .inputbox input {
        width: 1000%;
        border: 1px solid;
        border-radius: 5px;
        padding: 15px;
        outline: none;
        font-size: 18px;
    }

    #popup .content .inputbox a,
    #popup1 .content .inputbox a,
    #popup2 .content .inputbox a,
    #popup3 .content .inputbox a,
    #popup4 .content .inputbox a,
    #popup5 .content .inputbox a,
    #popup8 .content .inputbox a,
    #popup7 .content .inputbox a,
    #popup6 .content .inputbox a {
        background-color: rgb(80, 53, 53);
        color: rgb(245, 245, 245);
        margin-left: 10px;
    }

    .close {
        position: absolute;
        top: 30px;
        right: 30px;
        cursor: pointer;

    }
</style>
<?php
        
            session_start();
            if($_SESSION["isCompany"]==1&&isset($_GET["ID"])){
            require_once 'includes/dbh.inc.php';
            
            $sql = "SELECT * FROM event where idEvent=? ;";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt,$sql)) {
            echo "STMT FAIL";
            
             }   
    
            mysqli_stmt_bind_param($stmt,"i",$_GET["ID"]);
            mysqli_stmt_execute($stmt);
    
            $resultData = mysqli_stmt_get_result($stmt);
            $row = mysqli_fetch_assoc($resultData);}
                    ?>
<body>
    <div class="container">
        <!--Navbar-->
        <div class="navbar">
            <div class="logo">
                <a href="includes/indexer.inc.php"><img src="foto/logo.png" alt="Logo" style="width:250px; height:70px;"></a>
            </div>
            <!--Event Form-->
            <div class="eventform">
                <br>
                <h1>Edit Event</h1>
                
                    

                    <!---->
                    <br>
                    <label for="name"><b>Event Name</b></label>
                    <?php echo'<input type="text" placeholder="'.$row["EventName"].'" name="name" disabled>';?>
                    <a class="btn" onclick="popup1Toggle();">Edit</a><br>
                    <div id="popup1">
                        <div class="content">
                            <center><form action="includes/nameUpdate.inc.php" method="post">
                                <input type="text" placeholder="Enter Event Name" style="width: 180px;" name="email"
                                    required><?php
                    echo '<input type="hidden" name="ID" value="'.$_GET["ID"].'">';
                ?>
                                <div class="bttn">
                                    <button type="submit" class="button" name="submit">Update</button>
                                </div></form>
                                <a class="close" onclick="popup1Toggle();"><img src="foto/exit.png"
                                        style="width: 15px;height: 15px;"></a>
                            </center>
                        </div>
                    </div>
                    <!---->

                    <label for="date"><b>Event Date</b></label>
                    <?php echo'<input type="text" placeholder="'.$row["EventDate"].'" name="text" disabled>';?>
                    <a class="btn" onclick="popup2Toggle();">Edit</a><br>
                    <div id="popup2">
                        <div class="content">
                            <center><form action="includes/dateUpdate.inc.php" method="post">
                                <input type="date" placeholder="Enter Date" style="width: 180px;" name="email" required><?php
                    echo '<input type="hidden" name="ID" value="'.$_GET["ID"].'">';
                ?>
                                <div class="bttn">
                                    <button type="submit" class="button" name="submit">Update</button>
                                </div></form>
                                <a class="close" onclick="popup2Toggle();"><img src="foto/exit.png"
                                        style="width: 15px;height: 15px;"></a>
                            </center>
                        </div>
                    </div>
                    <!---->

                    <label for="number"><b>Event Price</b></label>
                    <?php echo'<input type="number" placeholder="'.$row["TicketPrice"].'TL" name="name" disabled>'?>
                    <a class="btn" onclick="popup3Toggle();">Edit</a><br>
                    <div id="popup3">
                        <div class="content">
                            <center><form action="includes/priceUpdate.inc.php" method="post">
                                <input type="number" placeholder="Enter Event Price" style="width: 180px;" name="email"
                                    required><?php
                    echo '<input type="hidden" name="ID" value="'.$_GET["ID"].'">';
                ?>
                                <div class="bttn">
                                    <button type="submit" class="button" name="submit">Update</button>
                                </div></form>
                                <a class="close" onclick="popup3Toggle();"><img src="foto/exit.png"
                                        style="width: 15px;height: 15px;"></a>
                            </center>
                        </div>
                    </div>

                    <!---->

                    <label for="name"><b>Event Description</b></label>
                    <?php echo'<input type="text" placeholder="'.$row["EventDescription"].'" name="name" disabled>';?>
                    <a class="btn" onclick="popup4Toggle();">Edit</a><br>
                    <div id="popup4">
                        <div class="content">
                            <center><form action="includes/descUpdate.inc.php" method="post">
                                <input type="text" placeholder="Enter Event Description" name="name" required><?php
                    echo '<input type="hidden" name="ID" value="'.$_GET["ID"].'">';
                ?>
                                <div class="bttn">
                                    <button type="submit" class="button" name="submit">Update</button>
                                </div></form>
                                <a class="close" onclick="popup4Toggle();"><img src="foto/exit.png"
                                        style="width: 15px;height: 15px;"></a>
                            </center>
                        </div>
                    </div>
                    <!---->

                    <label for="name"><b>Event Location</b></label>
                    <?php echo'<input type="text" placeholder="'.$row['EventLocation'].'" name="name" disabled>';?>
                    <a class="btn" onclick="popup5Toggle();">Edit</a><br>
                    <div id="popup5">
                        <div class="content">
                            <center>
                                <form action="includes/locUpdate.inc.php" method="post">
                                <input type="text" placeholder="Enter Event Location" name="name" required><?php
                    echo '<input type="hidden" name="ID" value="'.$_GET["ID"].'">';
                ?>
                                <div class="bttn">
                                    <button type="submit" class="button" name="submit">Update</button>
                                </div></form>
                                <a class="close" onclick="popup5Toggle();"><img src="foto/exit.png"
                                        style="width: 15px;height: 15px;"></a>
                            </center>
                        </div>
                    </div>
                    <!---->

                    <label for="number"><b>Event Capacity</b></label>
                    <?php echo'<input type="number" placeholder="'.$row["EventCapacity"].'" name="name" disabled>';?>
                    <a class="btn" onclick="popup6Toggle();">Edit</a><br>
                    <div id="popup6">
                        <div class="content">
                            <center>
                                <form action="includes/capacityUpdate.inc.php" method="post">
                                <input type="number" placeholder="Enter Event Capacity" style="width: 180px;"
                                    name="email" required><?php
                    echo '<input type="hidden" name="ID" value="'.$_GET["ID"].'">';
                ?>
                                <div class="bttn">
                                    <button type="submit" class="button" name="submit">Update</button>
                                </div>
                            </form>
                                <a class="close" onclick="popup6Toggle();"><img src="foto/exit.png"
                                        style="width: 15px;height: 15px;"></a>
                            </center>
                        </div>
                    </div>
                    <!---->
                    <br><br>
                    
                    <?php
                    if($row["VipAvailability"]==1){
                        echo '<label for="number"><b>Event VIP Capacity</b></label>
                     <input type="number" placeholder="'.$row["VIPEventCapacity"].'" name="name" disabled>
                    <a class="btn" onclick="popup7Toggle();">Edit</a><br>
                    <div id="popup7">
                        <div class="content">
                            <center>
                                <form action="includes/vipcap.inc.php" method="post">
                                <input type="number" placeholder="Enter Event Capacity" style="width: 180px;"
                                    name="email" required>
                    <input type="hidden" name="ID" value="'.$_GET["ID"].'">
                
                                <div class="bttn">
                                    <button type="submit" class="button" name="submit">Update</button>
                                </div>
                            </form>
                                <a class="close" onclick="popup7Toggle();"><img src="foto/exit.png"
                                        style="width: 15px;height: 15px;"></a>
                            </center>
                        </div>
                    </div>
                    <!---->
                    <br><br>
                    
                    <label for="number"><b>Event VIP PRICE</b></label>
                     <input type="number" placeholder="'.$row["VIPTicketPrice"].'" name="name" disabled>
                    <a class="btn" onclick="popup6Toggle();">Edit</a><br>
                    <div id="popup8">
                        <div class="content">
                            <center>
                                <form action="includes/vippri.inc.php" method="post">
                                <input type="number" placeholder="Enter Event Capacity" style="width: 180px;"
                                    name="email" required>
                    <input type="hidden" name="ID" value="'.$_GET["ID"].'">
                
                                <div class="bttn">
                                    <button type="submit" class="button" name="submit">Update</button>
                                </div>
                            </form>
                                <a class="close" onclick="popup8Toggle();"><img src="foto/exit.png"
                                        style="width: 15px;height: 15px;"></a>
                            </center>
                        </div>
                    </div>
                    <!---->
                    <br><br>
                    <script>
                    function popup7Toggle() {
                        const popup = document.getElementById("popup7");
                        popup7.classList.toggle("active")
                    }
                    function popup8Toggle() {
                        const popup = document.getElementById("popup8");
                        popup8.classList.toggle("active")
                    }</script>
';
                    }
                    ?>

                <script>
                    function popupToggle() {
                        const popup = document.getElementById('popup');
                        popup.classList.toggle('active')
                    }
                    function popup1Toggle() {
                        const popup1 = document.getElementById('popup1');
                        popup1.classList.toggle('active')
                    }
                    function popup2Toggle() {
                        const popup2 = document.getElementById('popup2');
                        popup2.classList.toggle('active')
                    }
                    function popup3Toggle() {
                        const popup3 = document.getElementById('popup3');
                        popup3.classList.toggle('active')
                    }
                    function popup4Toggle() {
                        const popup4 = document.getElementById('popup4');
                        popup4.classList.toggle('active')
                    }
                    function popup5Toggle() {
                        const popup5 = document.getElementById('popup5');
                        popup5.classList.toggle('active')
                    }
                    function popup6Toggle() {
                        const popup6 = document.getElementById('popup6');
                        popup6.classList.toggle('active')
                    }
                </script>
            </div>
        </div>
    </div>

    <!--Footer-->
    <div class="footer">
        <p class="footertext">Copyright &copy; BiletBiz 2021</p>
    </div>
</body>

</html>