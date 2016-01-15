<?php
session_start();
include_once('databaseconnect.php');

?>

<!DOCTYPE html>

<html>
<head>
    <title>Tour Page</title>
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
            <h1><span id="headertext">TecVault Bunkers</span></h1>
        </div>
    </div>
    <div class="content">
        <?php
        if(isset($_SESSION['reserved'])){
            echo '<p id="registered">Tour Successfully Registered.</p>';
            unset($_SESSION['reserved']);
        }
        ?>
    </div>
    <br>
    <hr class="fade">
    <br>
</div>
</div>
</body>
</html>
