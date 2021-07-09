<?php
require_once "../Model/Conexion.php";

class EncargadoModel {
    private $con = null;

    function __construct() {
        $this->con = Conexion::ConexionDataBase();
    }

    public function CheckDui($dui) {
        $query = "SELECT *FROM app1_encargado where dui = :dui";
        $queryPrepare = $this->con->prepare($query);
        $queryPrepare->execute([
            ':dui' => $dui
        ]);
        $data = $queryPrepare->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    function CheckChild($dui) {
        $query = "SELECT al.nombre_alumno, al.apellidos_alumno, al.nie, en.* 
            FROM app1_alumno al INNER JOIN app1_encargado as en on 
            al.encargado_id = en.dui and en.dui = :dui";
        $queryPrepare = $this->con->prepare($query);
        $queryPrepare->execute([
            ":dui" => $dui
        ]);
        $data = $queryPrepare->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function SearchEncargado($dui) {
        if(count($this->CheckDui($dui)) > 0) {
            if(count($this->CheckChild($dui)) > 0) {
                return $this->CheckChild($dui);
            } else {
                return $this->CheckDui($dui);
            }
        } else {
            return [];
        }
    }

    private function InsertEncargado($dui, $nombreEncargado, 
        $direccionEncargado, $parentesco){
        $message = "";
        $query = "INSERT INTO app1_encargado (dui, nombre_encargado, direcion, 
            parentescto) VALUES (:dui, :nombreEncargado, :direccionEncargado, 
            :parentesco)";
        $queryPrepare = $this->con->prepare($query);
        $response = $queryPrepare->execute([
            ':dui' => $dui,
            ':nombreEncargado' => $nombreEncargado,
            ':direccionEncargado' => $direccionEncargado,
            ':parentesco' => $parentesco
        ]);
        if ($response == true) {
            $message = "Registrado";
        } else {
            $message = "No registrado";
        }
        return $message;
    }

    public function RegisterEncargado($dui, $nombreEncargado, 
        $direccionEncargado, $parentesco) {
        $existDui = $this->CheckDui($dui);
        if(count($existDui) > 0) {
            $message = "Ya se encuentra registrado el dui";
        } else {
            $message = $this->InsertEncargado($dui, $nombreEncargado, 
                $direccionEncargado, $parentesco);
        }
        return $message;
    }
}
?>
