<?php
include_once 'header.php'
?>
<style>
    * {
        margin: 0;
        padding: 0;
    }
    .container {
        background-image: url(back.jpg);
        background-size: 100% 100%;
        height: 40cm;
    }
    input[type=password],input[type=email] {
        width: 100%;
        padding: 15px;
        margin: 5px 0 22px 0;
        display: inline-block;
        border: none;
        background: #f1f1f1;
    }

    input[type=password]:focus {
        background-color: #ddd;
        outline: none;
    }
    .signupForm {
        width: 450px;
        height: 900px;
        margin-top:180px;    
        margin-left: 600px;
    }
    button {
        background-color: #374d45;
        color: white;
        padding: 14px 20px;
        margin-left: 60px;
        border-radius: 5px;
        cursor: pointer;
        width: 80%;
        opacity: 0.9;
    }

    button:hover {
        opacity: 1;
    }
    .footer {
        background: #634a4a;
        height: 180px;
    }

    .footertext {
        font-size: 20px;
        text-align: center;
        line-height: 180px;
    }
     
</style>

<section class="signupForm">
    <h2>Log in</h2>
    <form action="includes/login.inc.php" method="post">

        <input type="email" name="email" placeholder="Email">
            <input type="password" name="psswrd" placeholder="Password">
                <button type="submit"class="button" name="submit">Log in</button>
                </form>


                <?php
                if (isset($_GET["error"])) {
                    if ($_GET["error"] == 'emptyinput') {
                        echo "<p>Fill all the input boxes</p>";
                    } else if ($_GET["error"] == 'wrongLogin') {
                        echo "<p>Incorrect login info</p>";
                    }
                }
                ?>
                </section>



                <div class="footer">
                    <p class="footertext" style="color: black;">Copyright &copy; BiletBiz 2021</p>
                    <?php
                    include_once 'footer.php'
                    ?>
                </div>
