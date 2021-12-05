<?php
    include_once 'header.php'
    ?>
        
    <section class="signupForm">
        <h2>Sign Up</h2>
        <form action="includes/signup.inc.php" method="post">
            <input type="text" name="name" placeholder="Your name">
            <input type="email" name="email" placeholder="Email">
            <input type="password" name="psswrd" placeholder="Password">
            <input type="password" name="repsswrd" placeholder="Repeat password">
            <button type="submit" name="submit">Sign Up</button>
        </form>

        <?php

            if (isset($_GET["error"])){
                if($_GET["error"] == 'emptyinput'){
                    echo "<p>Fill al the input boxes</p>"
                }
                else if($_GET["error"] == 'invalidEmail'){
                    echo "<p>Invalid Email</p>"
                }
                else if($_GET["error"] == 'pswrdNoMatch'){
                    echo "<p>Password is not equal to repeat password</p>"
                }
                else if($_GET["error"] == 'emailInUse'){
                    echo "<p>Email in use</p>"#not good for security
                }
                else if($_GET["error"] == 'stmtFail'){
                    echo "<p>Something went wrong</p>"
                }
                else if($_GET["error"] == 'none'){
                    echo "<p>Signup successful</p>"
                }
            }


            ?>


    </section>


   



<?php
    include_once 'footer.php'
    ?>