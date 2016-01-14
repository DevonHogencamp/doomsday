<?php

session_start();

$registered = $_SESSION["registered"];
$UserName = $_SESSION["userName"];

if(isset($_SESSION['userName'])){
    header('location: profile.php');
}

include_once('databaseconnect.php');


//START Login
$error = false;
$success = false;

if(@$_POST['login']) {

    if(!$_POST['user']){
        $error .= '<p>Username is a required field!</p>';
    }

    if(!$_POST['pass']){
        $error .= '<p>Password is a required field!</p>';
    }

    $query = $con->prepare("SELECT * FROM Users WHERE userName = :username AND password = :password");
    $result = $query->execute(
        array(
            'username' => $_POST['user'],
            'password' => $_POST['pass']
        )
    );
    $userinfo = $query->fetch();

    if ($userinfo) {

        $success = "User, " . $_POST['user'] . " was successfully logged in.";

        $_SESSION["firstName"] = $userinfo['firstName'];
        $_SESSION["userName"] = $userinfo['userName'];

        header("Location: profile.php");
    } else {
        $success = "There was an error logging into the account.";
    }
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
                    <form id="login" method="POST" >
                        Username: <input type="text" id="username" name="user" required><br>
                        Password: <input type="password" id="password" name="pass" required><br>
                        <button type="submit" name="login" value="1">Sign In</button>
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
                        if($error){
                            echo '<br>';
                            echo $error;
                        }
                        if($success){
                            echo '<br>';
                            echo $success;
                        }
                        ?>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>