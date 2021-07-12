<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require_once "../vendor/autoload.php";
require_once "../vendor/phpmailer/phpmailer/src/PHPMailer.php";
require_once "../vendor/phpmailer/phpmailer/src/Exception.php";
require_once "../vendor/phpmailer/phpmailer/src/SMTP.php";

require_once "../Model/Conexion.php";

class EmployeeModel {
    private $conexion = null;

    function __construct () {
        $this->conexion = Conexion::ConexionDataBase();
    }

    function CheckExistDui ($employeeDui) {
        $query = "SELECT *FROM Employees where employeeDui = :employeeDui";
        $queryPrepare = $this->conexion->prepare($query);
        $queryPrepare->execute([
            ":employeeDui" => $employeeDui
        ]);
        $response = $queryPrepare->fetchAll(PDO::FETCH_ASSOC);
        return $response;
    }

    function CheckExistEmail($employeeEmail) {
        $query = "SELECT *FROM Employees WHERE employeeEmail = :employeeEmail";
        $queryPrepare = $this->conexion->prepare($query);
        $queryPrepare->execute([
            ":employeeEmail" => $employeeEmail
        ]);
        $response = $queryPrepare->fetchAll(PDO::FETCH_ASSOC);
        return $response;
    }

    function InsertEmpleoyee($employeeName, $employeeLastName, $employeeDui,
        $employeeAddress, $employeeDateBirthday, $workPositionId,
        $employeeEmail, $employeeCellPhone){
        $responseMessage = "";
        if(count($this->CheckExistDui($employeeDui)) == 0) {
            if(count($this->CheckExistEmail($employeeEmail)) == 0) {
                date_default_timezone_set('UTC');
                $employeeDateCreated = date("Y-m-d H:i:s");
                
                $query = "INSERT INTO Employees (employeeName, employeeLastName,
                    employeeDui, employeeAddress, employeeDateBirthday, 
                    workPositionId, employeeDateCreated, employeeEmail, 
                    employeeCellPhone) VALUES 
                    (:employeeName, :employeeLastName, :employeeDui,
                    :employeeAddress, :employeeDateBirthday, :workPositionId, 
                    :employeeDateCreated, :employeeEmail, :employeeCellPhone)";

                $queryPrepare = $this->conexion->prepare($query);
                $response = $queryPrepare->execute([
                    ":employeeName" => $employeeName,
                    ":employeeLastName" => $employeeLastName,
                    ":employeeDui" => $employeeDui,
                    ":employeeAddress" => $employeeAddress,
                    ":employeeDateBirthday" => $employeeDateBirthday,
                    ":workPositionId" => $workPositionId,
                    ":employeeDateCreated" => $employeeDateCreated,
                    ":employeeEmail" => $employeeEmail,
                    ":employeeCellPhone" => $employeeCellPhone
                ]);
                if($response == true) {
                    $employeeId = 0;
                    $responseFunction = $this->CheckExistDui($employeeDui);
                    foreach($responseFunction as $data) {
                        $employeeId = (int)$data['employeeId'];
                    }
                    $userName = $this->CreateUserName($employeeName, $employeeLastName);
                    $passwordName = $this->CreatePasswordUser($userName);
                    if($userName != null && $passwordName != null
                        && $employeeId != null) {
                        $responseMessage = $this->InsertUser($userName, $passwordName,
                            $employeeId, $employeeEmail);
                    }
                } else {
                    $responseMessage = "Not Register";
                }

            } else {
                $responseMessage = "Exits email";
            }
        } else {
            $responseMessage = "Exits dui";
        }
        return $responseMessage;
    }

    function InsertUser($userName, $passwordName, $employeeId, $employeeEmail) {
        $passwordNameHash = password_hash($passwordName, PASSWORD_BCRYPT);
        date_default_timezone_set('UTC');
        $userDateLastLogin = date("Y-m-d H:i:s");
        $userDateCreated = date("Y-m-d H:i:s");
        $query = "INSERT INTO Users (userName, passwordName, userActive,
        userDateLastLogin, employeeId, userDateCreated, userNumberSessionsEntry)
        VALUES (:userName, :passwordName, :userActive, :userDateLastLogin,
        :employeeId, :userDateCreated, :userNumberSessionsEntry)";
        $queryPrepare = $this->conexion->prepare($query);
        $response = $queryPrepare->execute([
            "userName" => $userName,
            ":passwordName" => $passwordNameHash,
            ":userActive" => 1,
            ":userDateLastLogin" => $userDateLastLogin,
            ":employeeId" => (int)$employeeId,
            ":userDateCreated" =>$userDateCreated,
            ":userNumberSessionsEntry" => 0
        ]);
        if($response == true) {
            $this->SendEmailWithUserPassowrd($userName, $passwordName, $employeeEmail);
            return "User registered";
        } else {
            return "User not registered";
        }
    }

    function CreateUserName($employeeName, $employeeLastName) {
        $username = "";
        $name = $employeeName . $employeeLastName;
        $year = date('y');
        $arrayName = preg_split('/ /', $name);
        foreach($arrayName as $data) {
            $username = $username . $data[0];
        }
        $numero = strval(rand(0, 999));
        if (strlen($numero) == 2) {
            $numero = "0" . $numero;
        }
        $username = $username . $year . $numero;
        return $username;
    }

    function CreatePasswordUser($username) {
        $password = str_shuffle($username);
        return $password;
    }

    function SelectEmployees() {
        $query = "SELECT em.employeeId, em.employeeDui, em.employeeName, em.employeeLastName,
            em.employeeEmail, work.workPositionName from Employees as em INNER
            JOIN WorksPosition as work on em.workPositionId = work.workPositionId";
        $queryPrepare = $this->conexion->prepare($query);
        $queryPrepare->execute();
        $data = $queryPrepare->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    function DeleteEmployees($employeeId) {
        $query = "DELETE from Employees where employeeId = :employeeId";
        $queryPrepare = $this->conexion->prepare($query);
        $response = $queryPrepare->execute([
            ":employeeId" => $employeeId
        ]);

        if($response == true) {
            return "Deleted";
        } else {
            return "Not deleted";
        }
    }

    function SendEmailWithUserPassowrd($userName, $password, $email) {
        $phpmailer = new PHPMailer(true);

        try {
            $phpmailer->isSMTP();
            $phpmailer->Host = 'smtp.mailtrap.io';
            $phpmailer->SMTPAuth = true;
            $phpmailer->Port = 2525;
            $phpmailer->Username = 'e19fdf996c19a8';
            $phpmailer->Password = '2ba1f93ce12660';

            $phpmailer->setFrom('Gestor@gestor.com', 'Mailer');
            $phpmailer->addAddress($email, 'User');
            $phpmailer->Body = "Nombre de Usuario: " . $userName . "Password: " . $password;
            $phpmailer->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$phpmailer->ErrorInfo}";
        }

    }
}

?>
