<?php
    require_once "../../Model/Conexion.php";

    class WorkPositionModel {
        private $conexion = null;
        
        function __construct()
        {
            $this->conexion = Conexion::ConexionDataBase();
        }

        function SelectWorkPosition() {
            $query = "SELECT *FROM WorksPosition";
            $queryPrepare = $this->conexion->prepare($query);
            $queryPrepare->execute();
            $data = $queryPrepare->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }

    }
?>