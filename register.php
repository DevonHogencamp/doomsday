<?php
session_start();
include_once('databaseconnect.php');
$error = false;
$success = false;

if(@$_POST['signup']) {

    if(!$_POST['username']){
        $error .= '<p>Username is a required field!</p>';
    }

    if(!$_POST['firstName']){
        $error .= '<p>First Name is a required field!</p>';
    }

    if($_POST['username'] == mysql_query("SELECT * FROM Users WHERE userName = '$_POST[username]'")){
        $error .= '<p>Username Already in Use.</p>';
    }

    if($_POST['password'] !== $_POST['checkpassword']){
        $error .= '<p>Passwords do not Match.</p>';
    }

    $query = $con->prepare("INSERT INTO Users (UserNameID, userName, password, firstName, lastName, email, phoneNumber, cardNumber) VALUES (:id, :username, :password, :firstname, :lastname, :email, :phoneNumber, :cardNumber)");
    $result = $query->execute(
        array(
            'id' => NULL,
            'username' => $_POST['username'],
            'password' => $_POST['password'],
            'firstname' => $_POST['firstName'],
            'lastname' => $_POST['lastName'],
            'email' => $_POST['email'],
            'phoneNumber' => $_POST['phoneNumber'],
            'cardNumber' => $_POST['cardNumber']
        )
    );
    
    if ($result) {
        $success = "User, " . $_POST['username'] . " was successfully saved.";
        $_SESSION['registered'] = 1;
        header("Location: Account.php");
    } else {
        $success = "There was an error creating the account.";
    }
}
?>

<!DOCTYPE html>
<html>
    <head> 
        <title>Register</title>
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
                    <form name="signup" method="POST" >
                        <table id="loginTable">
                            <tr>
                                <td>Username: <input type="text" id="username" name="username"></td>
                                <td>Phone Number: <input type="text" name="phoneNumber" required></td>
                            </tr>
                            <tr>
                                <td>Email: <input type="text" name="email" required/></td>
                                <td>Card Number: <input type="text" name="cardNumber" required</td>
                            </tr>
                            <tr>
                                <td>First Name: <input type="text" name="firstName" required/></td>
                                <td>Password: <input type="password" id="password" name="password" required></td>
                            </tr>
                            <tr>
                                <td>Last Name: <input type="text" name="lastName" /></td>
                                <td>Confirm Password: <input type="password" id="password" name="checkpassword" required></td>
                            </tr>
                        </table>
                        <button type="submit" name="signup" value="1">Register</button>
                        <a href="Account.php">
                            <button type="button">Already have an account?</button>
                        </a>
                        <br>
                        <?php
                        if($error){
                            echo $error;
                            echo '<br>';
                        }
                        if($success){
                            echo $success;
                            echo '<br>';
                        }
                        ?>
                        <br>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>