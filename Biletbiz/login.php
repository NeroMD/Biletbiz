<?php
    include_once 'header.php'
    ?>
        
    <section class="signupForm">
        <h2>Log in</h2>
        <form action="includes/login.inc.php" method="post">
            
            <input type="email" name="email" placeholder="Email">
            <input type="password" name="psswrd" placeholder="Password">

            <button type="submit" name="submit">Log in



        </form>
        <form action="ForgotPassword.php" method="post">
            <div>
                <input type="submit" title="Forgot Password" class="ForgotPassword" name="ForgotPassword"  method="POST" href="ForgotPassword.php?>"></input>
            </div>
        </form>


            <button type="submit" name="submit">Log in</button>
        </form>




        <?php

            if (isset($_GET["error"])){
                if($_GET["error"] == 'emptyinput'){
                    echo "<p>Fill all the input boxes</p>";
                }
                else if($_GET["error"] == 'wrongLogin'){
                    echo "<p>Incorrect login info</p>";
                }
                
            }


            ?>
    </section>



<?php
    include_once 'footer.php'
    ?>