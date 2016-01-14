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

    $query = $con->prepare("INSERT INTO Users (UserNameID, userName, password, firstName, lastName) VALUES (:id, :username, :password, :firstname, :lastname)");
    $result = $query->execute(
        array(
            'id' => NULL,
            'username' => $_POST['username'],
            'password' => $_POST['password'],
            'firstname' => $_POST['firstName'],
            'lastname' => $_POST['lastName']
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
                <h2>Can't Decide? Need some help?</h2>
                <p>Come take a tour at any of our facilities.</p>
                <br>
                <hr class="fade">
                <br>
                <form method="POST">
                    <div id="formCol1">
                        <h3>Sign Up!</h3>
                        <p>First Name: <input type="text" name="firstname"></p>
                        <p>Last Name: <input type="text" name="lastname"></p>
                        <p>Username: <input type="text" name="username"></p>

                        <p>Email: <input type="text" name="email"></p>
                        <p>Phone Number: <input type="text" name="phone"></p>
                    </div>
                    <div id="formCol2">
                        <br>
                        <p>Date: <input type="date" name="date"><br>
                            <i><span id="smallText"> Bunkers are available for touring 24/7.</span></i>
                        </p>
                        <p>Location:
                            <select name="location">
                                <optgroup label="Western USA">
                                    <option value="california">California SafeZone</option>
                                    <option value="washington">Washington SafeZone</option>
                                </optgroup>
                                <optgroup label="Central USA">
                                    <option value="kansas">Kansas SafeZone</option>
                                    <option value="texas">Texas SafeZone</option>
                                </optgroup>
                                <optgroup label="Eastern USA">
                                    <option value="newyork">New York SafeZone</option>
                                    <option value="florida">Flordia SafeZone</option>
                                </optgroup>
                            </select>
                        </p>
                        <p>SafeZone ID:
                            <select name="safezoneid">
                                <option value="titanium">Titanium</option>
                                <option value="cobolt">Cobalt</option>
                                <option value="stronghold">Stronghold</option>
                                <option value="tower">Tower</option>
                            </select>
                        </p>
                        <button type="submit" name="signup">Submit</button>
                </form>
                        <?php













                        ?>
                    </div>
                <br>
                <hr class="fade">
                <br>
            </div>
        </div>   
    </body>
</html>