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
    <script defer src="http://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    
</head>
        <!--Navbar-->
        <body>
           
            <!--Event Form-->
            <div class="eventform">
                <br>
                <section class="createEventForm">
                <h1>Create Event</h1>
                <form action="includes/createEvent.inc.php" method="post">
                <?php
                    echo '<input type="hidden" name="email" value="'.$_SESSION['uid'].'">';
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

                
                <button type="submit" class="button" name="submit">Create Event</button>
            </form>
                
                <?php

            if (isset($_GET["error"])){
                if($_GET["error"] == 'emptyinput'){
                    echo "<p>Fill all the input boxes</p>";
                }
                else if($_GET["error"] == 'invalidDate'){
                    echo "<p>Date cannot be past</p>";
                }
                
            }


            ?>
                
                </section>
            </div>
       
   
     <?php
    include_once 'footer.php'
    
    ?>