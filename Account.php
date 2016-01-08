<!DOCTYPE html>

<?php
    /*** mysql hostname ***/
    $hostname = '127.0.0.1';
    
    /*** mysql username ***/
    $username = 'root';
    
    /*** mysql password ***/
    $password = 'root';
    
    try {
        $dbh = new PDO("mysql:host=$hostname;dbname=doomsday", $username, $password);
        /*** echo a message saying we have connected ***/
        echo 'Connected to database';
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
    }
?>

<html>
    <head> 
        <title>Account Page</title>
        <link rel="stylesheet" href="Stylesheet.css" type="text/css">
        <link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
        <script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
    </head>
    
    <body>
        <div class="container">
            <div class="header-cont">
                <div class="header">
                    <ul id="MenuBar2" class="MenuBarHorizontal">
                        <li><a href="Index.html">Home</a></li>
                        <li><a href="Order.html">Order</a></li>
                        <li><a href="Tour.html">Tours</a></li>
                        <li><a href="Account.html">Account</a></li>
                    </ul>
                    <h1>
                        <span id="headertext">TecVault Bunkers</span>
                    </h1>
                </div>
            </div>
            <div class="accountContent">
                <br>
                <div id="loginForm">
                    <form id="login" action="login.php" method="post" >
                        <p>Username: <input type="text" id="username" name="username"><br>
                            Password: <input type="password" id="password" name="password"><br>
                            <button type="submit" name="submit">Sign In</button>
                            <a href="register.html">
                                <button type="button">Register</button>
                            </a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>