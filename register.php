<?php
session_start();
if(isset($_SESSION['userName'])!="")
{
    header("Location: index.php");
}
include_once 'databaseconnect.php';

?>

<!DOCTYPE html>
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
                    <form method="POST" >
                        <table id="loginTable">
                            <tr>
                                <td>Username: <input type="text" id="username" name="username"></td>
                                <td>Password: <input type="password" id="password" name="password"></td>
                            </tr>
                            <tr>
                                <td>First Name: <input type="text" name="firstName" required/></td>
                                <td>

                                </td>
                            </tr>
                            <tr>
                                <td>Last Name: <input type="text" name="lastName" required/></td>
                            </tr>
                        </table>
                        <button type="submit" name="signup">Register</button>
                        <a href="Account.php">
                            <button type="button">Already have an account?</button>
                        </a>
                        <br>
                        <?php
                        if(isset($_POST['signup']))
                        {
                        $username = mysql_real_escape_string($_POST['username']);
                        $password = mysql_real_escape_string($_POST['password']);
                        $firstName = mysql_real_escape_string($_POST['firstName']);
                        $lastName = mysql_real_escape_string($_POST['lastName']);

                        if(isset($username)){
                            $mysql_get_users = mysql_query("SELECT * FROM Users where username='$username'");

                            $get_rows = mysql_affected_rows($con);

                            if($get_rows >=1){
                                echo "Username in Use";
                            }
                            else{
                                if(mysql_query("INSERT INTO Users(UserNameID,userName,password,firstName,lastName) VALUES(NULL,'$username','$password','$firstName','$lastName')"))
                                {
                                    $_SESSION['registered'] = 1;
                                    echo "Registered.";
                                    header("Location: Account.php");
                                }
                                else {
                                    echo "Error Creating Account.";
                                }
                            }
                        }
                        }
                        ?>

                        <br>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>