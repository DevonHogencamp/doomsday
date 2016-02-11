<?php
session_start();
include_once('databaseconnect.php');
$error = false;
$success = false;

if(@$_POST['order']) {

    //if($_POST['username'] !== mysql_query("SELECT * FROM Users WHERE userName = '$_POST[username]'")){
    //   $error .= '<p>Username Not Recognized in Database.</p><p><a href="register.php">Register Here.</a></p>';
    //}


    $query = $con->prepare("INSERT INTO Orders (Orderid, firstname, lastname, email, addressone, addresstwo, phone, cardtype, cardnumber, expiration, billingname, billingaddressone, billingaddresstwo) VALUES (:orderid, :firstname, :lastname, :email, :addressone, :addresstwo, :phone, :cardtype, :cardnumber, :expiration, :billingname, :billingaddressone, :billingaddresstwo)");
    $result = $query->execute(
        array(
            'orderid' => NULL,
            'firstname' => $_POST['firstname'],
            'lastname' => $_POST['lastname'],
            'email' => $_POST['email'],
            'addressone' => $_POST['addressone'],
            'addresstwo' => $_POST['addresstwo'],
            'phone' => $_POST['phone'],
            'cardtype' => $_POST['cardtype'],
            'cardnumber' => $_POST['cardnumber'],
            'expiration' => $_POST['expiration'],
            'billingname' => $_POST['billingname'],
            'billingaddressone' => $_POST['billingaddressone'],
            'billingaddresstwo' => $_POST['billingaddresstwo']

        )
    );
    if ($result) {
        $success = "Tour Reserved.";
        $_SESSION['ordered'] = 1;
        header("Location: success.php");
    } else {
        $success = "There was an error reserving the tour.";
    }
}
?>

<!DOCTYPE html>

    <html>
        <head>
            <title>Order Page</title>
            <link rel="stylesheet" href="Stylesheet.css" type="text/css">
            <link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
            <script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
        </head>
        
        <body>
        <div class="Bg image">
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
            </div>
            <div class="content">
                <h2>Be prepared for the Future!</h2>
                <p>Order a bunker now!</p>
                <hr class="fade">
                <form method="post">
                    <div id="formCol1">
                        <table id="infoForm">
                            <tr>
                                <td>First Name: </td>
                                <td><input type="text" name="firstname"></td>
                            </tr>
                            <tr>
                                <td>Last Name: </td>
                                <td><input type="text" name="lastname"></td>
                            </tr>
                            <tr>
                                <td>Email: </td>
                                <td><input type="text" name="email"></td>
                            </tr>
                            <tr>
                                <td>Address 1: </td>
                                <td><input type="text" name="addressone"></td>
                            </tr>
                            <tr>
                                <td>Address 2: </td>
                                <td><input type="text" name="addresstwo"></td>
                            </tr>
                            <tr>
                                <td>Phone Number: </td>
                                <td><input type="text" name="phone"></td>
                            </tr>
                        </table>
                    </div>
                    <div id="formCol2">
                        <table id="billingForm">
                            <tr>
                                <td>Card Type: </td>
                                <td><input type="text" name="cardtype"></td>
                            </tr>
                            <tr>
                                <td>Card Number: </td>
                                <td><input type="text" name="cardnumber"></td>
                            </tr>
                            <tr>
                                <td>Expiration: </td>
                                <td><input type="text" name="expiration"></td>
                            </tr>
                            <tr>
                                <td><br></td>
                            </tr>
                            <tr>
                                <td>Billing Name: </td>
                                <td><input type="text" name="billingname"></td>
                            </tr>
                            <tr>
                                <td>Email: </td>
                                <td><input type="text"></td>
                            </tr>
                            <tr>
                                <td>Billing Address 1: </td>
                                <td><input type="text" name="billingaddressone"></td>
                            </tr>
                            <tr>
                                <td>Billing Address 2: </td>
                                <td><input type="text" name="billingaddresstwo"></td>
                            </tr>
                            <tr>
                                <td>Phone Number: </td>
                                <td><input type="text"></td>
                            </tr>
                            <tr>
                                <td><button type="submit" name="order" value="1">Submit</button></td>
                                <td><button type="reset">Reset All</button></td>
                            </tr>
                        </table>
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
            </div>
        </body>
</html>