<?php
require_once '../Model/Conexion.php';

class UserModel {
    private $con;
    function __construct() {
        $this->con = Conexion::ConexionDataBase();
    }

    function LoginUser($username, $password) {
        $validate = null;
        $message = [];
        $user = $this->CheckUsername($username);
        foreach($user as $us) {
            $validate = password_verify($password, $us['password']);
        }
        if($validate == true) {
            $message = [
                "message" => "El usuario y el password coinciden",
                "response" => true
            ];
        } else {
            $message = [
                "message" => "El usuario y el password no coinciden",
                "response" => false
            ];
        }

        return $message;
    }


    private function CheckUsername($username) {
        $query = "SELECT username, password FROM auth_user where username = :username";
        $queryPrepare = $this->con->prepare($query);
        $queryPrepare->execute([':username' => $username]);
        $data = $queryPrepare->fetchAll();
        return $data;
    }

    private function CheckEmail($email) {
        $query = "SELECT email FROM auth_user WHERE email = :email";
        $queryPrepare = $this->con->prepare($query);
        $queryPrepare->execute([':email' => $email]);
        $data = $queryPrepare->fetchAll();
        return $data;
    }

    private function InsertUser($username, $password, $isSuperUser, $firstName, $lastName, $email){
        date_default_timezone_set('UTC');
        $dateJoined = date("Y-m-d H:i:s");
        $query = "INSERT INTO auth_user (username, password, is_superuser, first_name, last_name, email, is_active, date_joined, is_staff) VALUES (:username, :password, :isSuperUser, :firstName, :lastName, :email, :isActive, :dateJoined, :isStaff)";
        $queryPrepare = $this->con->prepare($query);
        $response = $queryPrepare->execute([
            ':username' => $username, 
            ':password' => $password, 
            ':isSuperUser' => $isSuperUser, 
            ':firstName' => $firstName, 
            ':lastName' => $lastName, 
            ':email' => $email, 
            'isActive' => 1, 
            ':dateJoined' => $dateJoined, 
            ':isStaff' => 1
        ]);
        if ($response == true) {
            return "ok";
        } else {
            return "failed";
        }
    }

    public function RegisterUser($username, $password, $isSuperUser, $firstName, $lastName, $email) {
        $message = "";
        $checkUser = count($this->CheckUsername($username));
        $checkEmail = count($this->CheckEmail($email));

        if($checkEmail > 0 && $checkUser > 0){
            $message = "El nombre de usuario y el email ya estan registrados";
        } else {
            if($checkEmail > 0) {
                $message = "El email ya esta registrado";
            } else{
                if($checkUser > 0) {
                    $message = "El nombre de usuario ya esta en uso";
                } else {
                    $message = $this->InsertUser($username, $password, 
                        $isSuperUser, $firstName, $lastName, $email);
                }
            }
        }
        return $message;
    }

}


?>
