<?php

session_start();

$registered = $_SESSION["registered"];
$failedlogin = $_SESSION["loginfail"];
$UserName = $_SESSION["userName"];

if(isset($_SESSION['userName'])){
    header('location: profile.php');
}

function redirect() {
    header('location: profile.php');
}
?>
<!DOCTYPE html>
<html>
    <head> 
        <title>Login</title>
        <link rel="stylesheet" href="Stylesheet.css" type="text/css">
        <link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
        <script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
    </head>
    
    <body>
        <div class="container">
            <div class="header-cont">
                <div class="header">
                    <ul id="MenuBar2" class="MenuBarHorizontal">
                        <li><a href="Index.php">Home</a></li>
                        <li><a href="Order.php">Order</a></li>
                        <li><a href="Tour.php">Tours</a></li>
                        <li><a href="Account.php">Account</a></li>
                    </ul>
                    <h1>
                        <span id="headertext">TecVault Bunkers</span>
                    </h1>
                </div>
            </div>
            <div class="accountContent">
                <br>
                <div id="loginForm">
                    <form id="login" action="login.php" method="POST" >
                        Username: <input type="text" id="username" name="user" required><br>
                        Password: <input type="password" id="password" name="pass" required><br>
                        <button type="submit" name="submit">Sign In</button>
                        <a href="register.php">
                            <button type="button">Register Here!</button>
                        </a>
                        <?php
                        if(isset($_SESSION['registered'])){
                            echo '<p id="registered">Successfully Registered</p>';
                            unset($_SESSION['registered']);
                        }
                        ?>
                        <?php
                        if(isset($_SESSION['loginfail'])){
                            echo '<p id="registered">Login Failed.</p>';
                            unset($_SESSION['loginfail']);
                        }
                        ?>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>