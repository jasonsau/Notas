<?php

session_start();
require_once "../Model/UserModel.php";
$modelUser = new UserModel();

if($_POST['register'])
if($_POST['register'] == 'register') {
    $firstName = $_POST['first-name'];
    $lastName = $_POST['last-name'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $isSuperUser = (int)$_POST['is-super-user'];
    $email = $_POST['email'];
    $response = $modelUser->RegisterUser($username, $password, 
        $isSuperUser, $firstName, $lastName, $email);
    echo $response;
}

if($_POST['login'] == 'login' || $_GET['login'] == 'login') {
    if($_SESSION["username"]) {
        header("Location: ../view/admin/home.php");
    } else {
        $username = $_POST['user-name'];
        $password = $_POST['password'];
        $response = $modelUser->LoginUser($username, $password);
        if($response["response"] == true) {
            $_SESSION['username'] = $username;
            header("Location: ../view/admin/home.php");
        } else {
            $_SESSION["message"] = $response["message"];
            /* print $_SESSION["message"]; */
            header("Location: ../index.php");
        }
    }
}

if($_GET["cerrarSession"] == "cerrarSession") {
    session_destroy();
    header("Location: ../index.php");
}

?>
