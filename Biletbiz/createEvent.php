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
        <style>
            .check {
                display: block;
                position: relative;
                padding-left: 200px;
                margin-bottom: 12px;
                cursor: pointer;
                font-size: 15px;
                -webkit-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
            }
            .check input {
                position: absolute;
                opacity: 0;
                cursor: pointer;
                height: 0;
                width: 0;
            }
            .checkmark {
                position: absolute;
                top: 0;
                left: 180px;
                height: 15px;
                width: 15px;
                background-color: #5e0e0e;
            }

            .check input:checked ~ .checkmark {
                background-color: #ccc;
            }
            .checkmark:before {
                content: "";
                position: absolute;
                display: inline;
            }
            .check input:checked ~ .checkmark:before {
                display: none;
            }
            #people.adet, #categories.price {
                 
                border: 1px solid #b1b1b1;
                height: 40px;
                background: #5c3737;
                font-size: 14px;
                border-radius: 9px;
                font-weight: bold;
                color: #ffffff;

            }
        </style>
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

                                            <label for="number"><b>VIP PRICE (if not exists enter 0)</b></label>
                                            <input type="number" placeholder="Enter VIP PRICE" name="VIPprice" required>
                                            
                                            <label for="number"><b>VIP Capacity (if not exists enter 0)</b></label>
                                            <input type="number" placeholder="Enter VIP Capacity" name="VIPcapacity" required>
                                                <br><br>
                                               

                                                    


                                                                <br><br>
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