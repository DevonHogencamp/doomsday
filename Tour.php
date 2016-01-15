<?php
session_start();
include_once('databaseconnect.php');
$error = false;
$success = false;

if(@$_POST['reservetour']) {

    //if($_POST['username'] !== mysql_query("SELECT * FROM Users WHERE userName = '$_POST[username]'")){
     //   $error .= '<p>Username Not Recognized in Database.</p><p><a href="register.php">Register Here.</a></p>';
    //}


    $query = $con->prepare("INSERT INTO Tours (Orderid, firstname, lastname, username, email, phone, tourdate, location, safezoneid) VALUES (:orderid, :firstname, :lastname, :username, :email, :phone, :tourdate, :location, :safezoneid)");
    $result = $query->execute(
        array(
            'orderid' => NULL,
            'firstname' => $_POST['firstname'],
            'lastname' => $_POST['lastname'],
            'username' => $_POST['username'],
            'email' => $_POST['email'],
            'phone' => $_POST['phone'],
            'tourdate' => $_POST['date'],
            'location' => NULL, //$_POST['location'],
            'safezoneid' => NULL //$_POST['safezoneid']
        )
    );
    if ($result) {
        $success = "Tour Reserved.";
        $_SESSION['reserved'] = 1;
        header("Location: success.php");
    } else {
        $success = "There was an error reserving the tour.";
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
                        <p>First Name: <input type="text" name="firstname" required></p>
                        <p>Last Name: <input type="text" name="lastname" required></p>
                        <p>Username: <input type="text" name="username" required></p>

                        <p>Email: <input type="text" name="email" required></p>
                        <p>Phone Number: <input type="text" name="phone" required></p>
                    </div>
                    <div id="formCol2">
                        <br>
                        <p>Date: <input type="text" name="date" required><br>
                            <i><span id="smallText"> Bunkers are available for touring 24/7.</span></i>
                        </p>
                        <p>Location:
                            <select name="location" required>
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
                            <select name="safezoneid" required>
                                <option value="titanium">Titanium</option>
                                <option value="cobolt">Cobalt</option>
                                <option value="stronghold">Stronghold</option>
                                <option value="tower">Tower</option>
                            </select>
                        </p>
                        <button type="submit" name="reservetour" value="1">Submit</button>
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
                    </div>
                </form>
                <br>
                <hr class="fade">
                <br>
            </div>
        </div>   
    </body>
</html>