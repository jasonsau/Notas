<?php
require_once "../Model/EmployeeModel.php";
session_start();

$employeeModel = new EmployeeModel();

if($_POST['function'] == 'register') {
    $employeeName = $_POST['employee-name'];
    $employeeLastName = $_POST['employee-last-name'];
    $employeeDui = $_POST['employee-dui'];
    $employeeAddress = $_POST['employee-address'];
    $employeeDateBirthday = $_POST['employee-date-birthday'];
    $employeeEmail = $_POST['employee-email'];
    $employeeCellPhone = $_POST['employee-cellphone'];
    $employeeWorkPosition = (int)$_POST['work-position'];

    $response = $employeeModel->InsertEmpleoyee($employeeName, $employeeLastName, 
        $employeeDui, $employeeAddress, $employeeDateBirthday, 
        $employeeWorkPosition, $employeeEmail, $employeeCellPhone);

    /* $password = password_hash($_POST['password'], PASSWORD_BCRYPT); */
    /* $isSuperUser = (int)$_POST['is-super-user']; */
    /* $email = $_POST['email']; */
    /* $response = $modelUser->RegisterUser($username, $password, */ 
    /*     $isSuperUser, $firstName, $lastName, $email); */
    echo json_encode($response);
}

if($_POST['function'] == 'show-employees') {
    $response = $employeeModel->SelectEmployees();
    echo json_encode($response);
}

if($_POST['function'] == 'delete-employee') {
    $employeeId = $_POST['employee-id'];
    $response = $employeeModel->DeleteEmployees($employeeId);
    echo json_encode($response);
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
