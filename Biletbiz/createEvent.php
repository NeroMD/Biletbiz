<?php
include_once 'header.php'
?>
</body>
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Create Event</title>
<link rel="stylesheet" href="css/event.css">
    <link rel="stylesheet" href="css/navbar.css">
        <script defer src="http://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>

        </head>

        <!--Navbar-->

        <body>
            <!--Event Form-->
        <div class="container" style="background-image: url(foto/back.jpg);height: 29cm">
            <div class="eventform">
                <br>
                <section class="createEventForm">
                    <h1>Create Event</h1>
                    <form action="includes/createEvent.inc.php" method="post">
                        <?php
                        echo '<input type="hidden" name="email" value="' . $_SESSION['uid'] . '">';
                        ?>

                        <label for="name"><b>Event Name</b></label>
                        <input type="text" placeholder="Enter Event Name" name="name" required>

                            <label for="date"><b>Event Date</b></label>
                            <input type="date" placeholder="DD/MM/YYYY" name="date" required>

                                <label for="number"><b>Event Price</b></label>
                                <input type="number" placeholder="Enter Event Price" name="price" required>

                                    <label for="name"><b>Event Description</b></label>
                                    <input type="text" placeholder="Enter Event Description" name="descp" required>

                                        <label for="name"><b>Event Location</b></label>
                                        <input type="text" placeholder="Enter Event Location" name="location" required>

                                            <label for="number"><b>Event Capacity</b></label>
                                            <input type="number" placeholder="Enter Event Capacity" name="capacity" required>

                                                <br><br>
                                                <form action="">
                                                    <p>
                                                    <center>Can the event be purchased?<center>
                                                            </p><br>
                                                            <input type="radio" id="yes" name="fav_language" value="Yes" required>
                                                                <label for="yes">Yes</label>
                                                                <input type="radio" id="no" name="fav_language" value="No" style="margin-left: 20px;" required>
                                                                    <label for="no">No</label><br>

                                                                    <br>

                                                                    <p>Is there a seat available?</p><br>
                                                                    <input type="radio" id="yes1" name="seat" value="Yes1" required>
                                                                        <label for="yes1">Yes</label>
                                                                        <input type="radio" id="no1" name="seat" value="No1" style="margin-left: 20px;" required>
                                                                            <label for="no1">No</label><br>
                                                                            <br>
                                                                            <input type="radio" id="vip" name="vip" value="vip" style="margin-left: 20px;">
                                                                                <label for="vip">VIP Ticket</label><br>
                                                                                </form>
                                                                                </form>
                                                                                <br>
                                                                                <button type="submit" class="button" name="submit">Create Event</button>
                                                                                </form>

                                                                                <?php
                                                                                if (isset($_GET["error"])) {
                                                                                    if ($_GET["error"] == 'emptyinput') {
                                                                                        echo "<p>Fill all the input boxes</p>";
                                                                                    } else if ($_GET["error"] == 'invalidDate') {
                                                                                        echo "<p>Date cannot be past</p>";
                                                                                    }
                                                                                }
                                                                                ?>

                                                                                </section>
                                                                                </div>
                                                                                </div>
                                                                                <div class="footer">
                                                                                    <p class="footertext" style="color: black;">Copyright &copy; BiletBiz 2021</p>
                                                                                    <?php
                                                                                    include_once 'footer.php'
                                                                                    ?>
                                                                                </div>