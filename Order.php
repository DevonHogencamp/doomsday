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
        
        /*** INSERT data ***/
        $count = $dbh->exec("INSERT INTO users(idusers, username, password) VALUES (NULL, 'test', 'password')");

        /*** echo the number of affected rows ***/
        echo $count;

        /*** close the database connection ***/
        $dbh = null;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
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
                <form>
                    <div id="formCol1">
                        <table id="infoForm">
                            <tr>
                                <td>First Name: </td>
                                <td><input type="text"></td>
                            </tr>
                            <tr>
                                <td>Last Name: </td>
                                <td><input type="text"></td>
                            </tr>
                            <tr>
                                <td>Email: </td>
                                <td><input type="text"></td>
                            </tr>
                            <tr>
                                <td>Address 1: </td>
                                <td><input type="text"></td>
                            </tr>
                            <tr>
                                <td>Address 2: </td>
                                <td><input type="text"></td>
                            </tr>
                            <tr>
                                <td>Phone Number: </td>
                                <td><input type="text"></td>
                            </tr>
                        </table>
                    </div>
                    <div id="formCol2">
                        <table id="billingForm">
                            <tr>
                                <td>Card Type: </td>
                                <td><input type="text"></td>
                            </tr>
                            <tr>
                                <td>Card Number: </td>
                                <td><input type="text"></td>
                            </tr>
                            <tr>
                                <td>Expiration: </td>
                                <td><input type="text"></td>
                            </tr>
                            <tr>
                                <td><br></td>
                            </tr>
                            <tr>
                                <td>Billing Name: </td>
                                <td><input type="text"></td>
                            </tr>
                            <tr>
                                <td>Email: </td>
                                <td><input type="text"></td>
                            </tr>
                            <tr>
                                <td>Billing Address 1: </td>
                                <td><input type="text"></td>
                            </tr>
                            <tr>
                                <td>Billing Address 2: </td>
                                <td><input type="text"></td>
                            </tr>
                            <tr>
                                <td>Phone Number: </td>
                                <td><input type="text"></td>
                            </tr>
                            <tr>
                                <td><button type="submit">Submit</button></td>
                                <td><button type="reset">Reset All</button></td>
                            </tr>
                        </table>
                    </div>
                </form>
            </div>
        </body>
</html>