
<?php
    include_once 'header.php'
    
    ?>
<?php
if($_SESSION["isAdmin"]==1){
echo '<form action="includes/Ban.inc.php" method="post">
            
            <input type="email" name="email" placeholder="Email">
            
            <button type="submit" name="submit">Ban User</button>
        </form><br><br><form action="includes/Unban.inc.php" method="post">
            
            <input type="email" name="email" placeholder="Email">
            
            <button type="submit" name="submit">Unban User</button>
        </form>';
}