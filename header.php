<?php 
session_start();

?>
<header>
        <nav class="navbar">
        <div class="brand-title">
        <span class="span1">Game</span>
        <span class="span2">Hub</span>
      </div>
      <a href="#" class="toggle-button">
        <span class="bar"></span>
        <span class="bar"></span>
        <span class="bar"></span>
            <div class="navbar-links">
                <ul>
                    <li><a href="./index.php">Home</a></li>
                    <li><a href="./highscore.php">Hi-Score</a></li>
                    <li><a href="./games.php">Games</a></li>
                    <?php
                    if (isset($_SESSION["useruid"])){
                        echo"<li><a href='Profiel.php'>Profile Page</a></li>";
                        echo"<li><a href='includes/logout.inc.php'>Log out</a></li>"; 
                    }
                    else{
                        echo"<li><a href='Inloggen.php''>Login</a></li>";
                    }
                    ?>
                    
                    
                </ul>
        </nav>
        </div>
    </header>