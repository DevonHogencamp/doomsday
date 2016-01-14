<?php
session_start();
if(isset($_SESSION['userName'])!="")
{
    header("Location: Account.php");
}

include_once('databaseconnect.php');

$error = false;
$success = false;

if(@$_POST['signup']) {

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
            'password' => $_POST['pass'],
        )
    );
    if ($result) {
        $success = "User, " . $_POST['user'] . " was successfully logged in.";
        header("Location: profile.php");
    } else {
        $success = "There was an error logging into the account.";
    }
}
