<?php

require_once "./Conexion.php";

class EmployeeModel {
    private $conexion = null;

    function __construct () {
        $this->conexion = Conexion::ConexionDataBase();
    }

    function CheckExistDui ($employeeDui) {

    }

    function InsertEmpleoyee($employeedName, $employeeLastName, $employeeDui,
        $employeeAddress, $employeeDateBirthday, $workPositionId,
        $employeeEmail){
        date_default_timezone_set('UTC');
        $employeeDateCreated = date("Y-m-d H:i:s");
        
        $query = "INSERT INTO Employees (employeedName, employeeLastName,
            employeeDui, employeeAddress, employeeDateBirthday, 
            workPositionId, employeeDateCreated, employeeEmail) VALUES 
            (:employeedName, :employeeLastName, :employeeDui,
            :employeeAddress, employeeDateBirthday, :workPositionId, 
            :employeeDateCreated, :employeeEmail)";

        $queryPrepare = $this->conexion->prepare($query);
        $response = $queryPrepare->execute([
            ":employeedName" => $employeedName,
            ":employeeLastName" => $employeeLastName,
            ":employeeDui" => $employeeDui,
            ":employeeAddress" => $employeeAddress,
            ":employeeDateBirthday" => $employeeDateBirthday,
            ":workPositionId" => $workPositionId,
            ":employeeDateCreated" => $employeeDateCreated,
            ":employeeEmail" => $employeeEmail
        ]);
        
        if($response == true) {
            
        } else {
            return "No Registrado";
        }
    }


    function CreateUserName($employeeName, $employeeLastName) {
        $username = "";
        $name = $employeeName . $employeeLastName;

        $arrayName = preg_split('/ /', $name);
        foreach($arrayName as $data) {
            $username = $username . $data[0];
        }
        return $username;
    }
}

?>