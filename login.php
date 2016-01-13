<?php
session_start();
if(isset($_SESSION['userName'])!="")
{
    header("Location: Account.php");
}
include_once 'databaseconnect.php';

function SignIn(){

    if(!empty($_POST['user']))
    {
        $query = $con->prepare("SELECT * FROM Users WHERE userName = '$_POST[user]' AND password = '$_POST[pass]'");
        $result = $query->execute(
            array(
                'id' => NULL,
                'username' => $_POST['username'],
                'password' => $_POST['password'],
            )
        );

        if(!empty($row['userName']) AND !empty($row['password'])) {
            $_SESSION['userName'] = $_POST['user'];
            $_SESSION['firstName'] = $row['firstName'];
            echo "SUCCESSFUL LOGIN.";
            header("Location: profile.php");
        }
        else {
            $_SESSION['loginfail'] = 1;
            echo "FAILED.";
            header("Location: Account.php");
        }
    }
    else {
        $_SESSION['loginfail'] = 1;
        echo "FAILED.";
        header("Location: Account.php");
    }
}
if(isset($_POST['submit']))
{
    SignIn();
}

?>