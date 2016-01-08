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
        $query = mysql_query("SELECT *  FROM Users where userName = '$_POST[user]' AND password = '$_POST[pass]'") or die(mysql_error());
        $row = mysql_fetch_array($query) or die(mysql_error());
        if(!empty($row['userName']) AND !empty($row['password']))
        {
            $_SESSION['userName'] = $_POST['user'];
            $_SESSION['firstName'] = $row['firstName'];
            echo "SUCCESSFUL LOGIN.";
            header("Location: profile.php");
        }
        else
        {
            $_SESSION['loginfail'] = 1;
            echo "FAILED.";
            header("Location: Account.php");
        }
    }
    else{
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