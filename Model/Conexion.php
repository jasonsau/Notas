<?php

class Conexion {

    public static $conexion;

    public static function ConexionDataBase() {
        $usuario = "gestor";
        $password = "gestor1234";
        if (self::$conexion == null) {
            try {
                self::$conexion = new PDO('mysql:host=localhost;dbname=GestorNotas', $usuario, $password);
                return self::$conexion;
            }
            catch (PDOException $e) {
                print "!Error" . $e->getMessage(). "<br/>";
                echo "No se hizo la conexion";
                die();
                return null;
            }
        }
        else {
            return self::$conexion;
            echo "Ya se habia hecho la conexion";
        }
    }
}
?>
